<?php

namespace DazzaDev\LaravelFeco;

use DazzaDev\DianFeco\Client;
use DazzaDev\LaravelFeco\Commands\FecoInstallCommand;
use Illuminate\Support\ServiceProvider;

class LaravelFecoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('laravel-feco', function ($app) {
            $client = new Client(config('laravel-feco.test'));

            // Set software
            $client->setSoftware([
                'identifier' => config('laravel-feco.software.identifier'),
                'test_set_id' => config('laravel-feco.software.test_set_id'),
                'pin' => config('laravel-feco.software.pin'),
            ]);

            // Set certificate
            if (config('laravel-feco.certificate.path')) {
                $client->setCertificate([
                    'path' => config('laravel-feco.certificate.path'),
                    'password' => config('laravel-feco.certificate.password'),
                ]);
            }

            // Set path
            if (config('laravel-feco.path')) {
                $client->setFilePath(config('laravel-feco.path'));
            }

            // Set technical key
            if (config('laravel-feco.technical_key')) {
                $client->setTechnicalKey(config('laravel-feco.technical_key'));
            }

            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-feco.php' => config_path('laravel-feco.php'),
        ], 'laravel-feco-config');

        // Migrations
        $this->publishes([
            $this->getMigrationFilePath('create_feco_configs_table.php') => database_path('migrations/'.$this->getMigrationFileName('create_feco_configs_table.php')),
            $this->getMigrationFilePath('create_feco_documents_table.php') => database_path('migrations/'.$this->getMigrationFileName('create_feco_documents_table.php')),
        ], 'laravel-feco-migrations');

        // Lang
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-feco');

        // Commands
        $this->commands([
            FecoInstallCommand::class,
        ]);
    }

    /**
     * Get the migration file path.
     */
    protected function getMigrationFilePath(string $migrationFileName): string
    {
        return __DIR__.'/../database/migrations/'.$migrationFileName;
    }

    /**
     * Get the migration file name with current timestamp.
     */
    protected function getMigrationFileName(string $migrationFileName): ?string
    {
        return date('Y_m_d_His').'_'.$migrationFileName;
    }
}
