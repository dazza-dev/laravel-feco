<?php

namespace DazzaDev\LaravelFeco\Commands;

use DazzaDev\LaravelFeco\Models\FecoDocumentType;
use DazzaDev\LaravelFeco\Models\FecoListing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FecoInstallCommand extends Command
{
    protected $signature = 'feco:install';

    protected $description = 'Llena las tablas con la información del paquete Feco';

    public function handle()
    {
        $this->info('Iniciando instalación de Feco...');

        $jsonPath = base_path('vendor/dazza-dev/dian-xml-generator/src/Data');

        if (! File::exists($jsonPath)) {
            $this->error("No se encontró la carpeta de datos en: $jsonPath");

            return;
        }

        // Get all files in the JSON folder
        $files = File::files($jsonPath);

        // Iterate through all files in the JSON folder
        foreach ($files as $file) {
            $filename = $file->getFilename();
            $tableName = str_replace('.json', '', $filename);

            // Read and decode JSON
            $data = json_decode(File::get($file->getPathname()), true);

            if (! $data || ! is_array($data)) {
                $this->warn("El archivo {$filename} no tiene un formato JSON válido.");

                continue;
            }

            // Insert document types
            if ($filename === 'document-types.json') {
                $formattedData = array_map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'code' => $item['code'],
                        'hash_type' => $item['hash_type'] ?? null,
                        'code_type' => $item['code_type'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $data);

                FecoDocumentType::insertOrIgnore($formattedData);
                $this->info('Datos de document-types insertados correctamente.');
            } else {
                $formattedData = array_map(function ($item) use ($tableName) {
                    return [
                        'name' => $item['name'],
                        'code' => $item['code'],
                        'description' => $item['description'] ?? null,
                        'type' => $tableName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $data);

                FecoListing::insertOrIgnore($formattedData);
                $this->info("Datos de {$tableName} insertados correctamente.");
            }
        }

        $this->info('Proceso finalizado con éxito.');
    }
}
