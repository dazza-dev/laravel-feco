<?php

namespace DazzaDev\LaravelFeco\Validations;

class Totals
{
    /**
     * Totals rules.
     */
    public function rules(): array
    {
        return [
            'totals' => ['required', 'array'],
            'totals.line_extension_amount' => ['required', 'numeric'],
            'totals.tax_exclusive_amount' => ['required', 'numeric'],
            'totals.tax_inclusive_amount' => ['required', 'numeric'],
            'totals.prepaid_amount' => ['required', 'numeric'],
            'totals.payable_amount' => ['required', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'totals.line_extension_amount.required' => 'El subtotal es obligatorio.',
            'totals.line_extension_amount.numeric' => 'El subtotal debe ser un número.',
            'totals.tax_exclusive_amount.required' => 'El subtotal exento de impuestos es obligatorio.',
            'totals.tax_exclusive_amount.numeric' => 'El subtotal exento de impuestos debe ser un número.',
            'totals.tax_inclusive_amount.required' => 'El subtotal con impuestos es obligatorio.',
            'totals.tax_inclusive_amount.numeric' => 'El subtotal con impuestos debe ser un número.',
            'totals.prepaid_amount.required' => 'El monto pre-pagado es obligatorio.',
            'totals.prepaid_amount.numeric' => 'El monto pre-pagado debe ser un número.',
            'totals.payable_amount.required' => 'El monto total es obligatorio.',
            'totals.payable_amount.numeric' => 'El monto total debe ser un número.',
        ];
    }
}
