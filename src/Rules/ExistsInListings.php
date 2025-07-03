<?php

namespace DazzaDev\LaravelFeco\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ExistsInListings implements ValidationRule
{
    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Validate if the value exists in the listings table.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! DB::table('feco_listings')->where('type', $this->type)->where('code', $value)->exists()) {
            $fail(__('laravel-feco::validation.exists_in_listings', [
                'attribute' => $attribute,
                'type' => $this->type,
            ]))->translate();
        }
    }
}
