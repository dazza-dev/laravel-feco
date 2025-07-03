<?php

namespace DazzaDev\LaravelFeco\Validations;

use DazzaDev\LaravelFeco\Rules\ExistsInListings;

class Taxes
{
    /**
     * Taxes rules.
     */
    public function rules(): array
    {
        return [
            'taxes' => ['required', 'array'],
            'taxes.*.code' => ['required', 'max:2', new ExistsInListings('taxes')],
            'taxes.*.percent' => ['required', 'numeric', 'between:0,100'],
            'taxes.*.tax_amount' => ['required', 'numeric'],
            'taxes.*.taxable_amount' => ['required', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'taxes.required' => 'Los impuestos son obligatorios.',
            'taxes.*.code.required' => 'El código del impuesto es obligatorio.',
            'taxes.*.code.exists_in_listings' => 'El código del impuesto no es válido (revisar listado de impuestos).',
            'taxes.*.percent.required' => 'El porcentaje del impuesto es obligatorio.',
            'taxes.*.percent.numeric' => 'El porcentaje del impuesto debe ser un número.',
            'taxes.*.tax_amount.required' => 'El monto del impuesto es obligatorio.',
            'taxes.*.tax_amount.numeric' => 'El monto del impuesto debe ser un número.',
            'taxes.*.taxable_amount.required' => 'La base del impuesto es obligatoria.',
            'taxes.*.taxable_amount.numeric' => 'La base del impuesto debe ser un número.',
        ];
    }
}
