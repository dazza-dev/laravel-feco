<?php

namespace DazzaDev\LaravelFeco\Traits;

use DazzaDev\LaravelFeco\Models\FecoCertificate;
use DazzaDev\LaravelFeco\Models\FecoDocument;
use DazzaDev\LaravelFeco\Models\FecoNumberingRange;
use DazzaDev\LaravelFeco\Models\FecoSoftware;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasDianFeco
{
    /**
     * Get the softwares associated with the model.
     */
    public function softwares(): MorphMany
    {
        return $this->morphMany(FecoSoftware::class, 'softwareable');
    }

    /**
     * Get the certificates associated with the model.
     */
    public function certificates(): MorphMany
    {
        return $this->morphMany(FecoCertificate::class, 'certificable');
    }

    /**
     * Get the numbering ranges associated with the model.
     */
    public function numberingRanges(): MorphMany
    {
        return $this->morphMany(FecoNumberingRange::class, 'rangeable');
    }

    /**
     * Get the documents associated with the model.
     */
    public function documents(): MorphMany
    {
        return $this->morphMany(FecoDocument::class, 'documentable');
    }

    /**
     * Get the numbering ranges used for testing.
     */
    public function testingNumberingRanges(string $documentType): array
    {
        switch ($documentType) {
            case 'invoice':
                return $this->testingInvoiceNumberingRanges();
            case 'support-document':
                return $this->testingSupportDocumentNumberingRanges();
            case 'equivalent-document':
                return $this->testingEquivalentDocumentNumberingRanges();
            default:
                return [];
        }
    }

    /**
     * Get the invoice numbering ranges used for testing.
     */
    public function testingInvoiceNumberingRanges(): array
    {
        return [
            'prefix' => 'SETP',
            'authorized_code' => '18760000001',
            'start_date' => '2019-01-19',
            'end_date' => '2030-01-19',
            'start_number' => '990000000',
            'end_number' => '995000000',
        ];
    }

    /**
     * Get the support document numbering ranges used for testing.
     */
    public function testingSupportDocumentNumberingRanges(): array
    {
        return [
            'prefix' => 'SEDS',
            'authorized_code' => '18760000002',
            'start_date' => '2025-01-01',
            'end_date' => '2025-12-31',
            'start_number' => '984000000',
            'end_number' => '985000000',
        ];
    }

    /**
     * Get the equivalent document numbering ranges used for testing.
     */
    public function testingEquivalentDocumentNumberingRanges(): array
    {
        return [
            'prefix' => 'EPOS',
            'authorized_code' => '18760000001',
            'start_date' => '2019-01-19',
            'end_date' => '2030-01-19',
            'start_number' => '1',
            'end_number' => '1000000',
        ];
    }

    /**
     * Get the technical key used for testing.
     */
    public function testingTechnicalKey(): string
    {
        return 'fc8eac422eba16e22ffd8c6f94b3f40a6e38162c';
    }
}
