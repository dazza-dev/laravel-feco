<?php

namespace DazzaDev\LaravelFeco\Validations;

use DazzaDev\LaravelFeco\Rules\ExistsInListings;

class Common
{
    /**
     * Common rules.
     */
    public function rules(): array
    {
        return [
            'operation_type' => ['required', new ExistsInListings('operation-types')],
            'prefix' => ['required', 'string', 'max:4'],
            'number' => ['required', 'numeric'],
            'date' => ['required', 'date_format:Y-m-d\TH:i:sP'],
            'due_date' => ['nullable', 'date_format:Y-m-d'],
            'currency' => ['required', 'string', 'size:3', new ExistsInListings('currencies')],
            'payment_mean' => ['required', new ExistsInListings('payment-means')],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'operation_type.required' => 'El tipo de operación es obligatorio.',
            'operation_type.validation.exists_in_listings' => 'El tipo de operación no es un código válido (revisar listado de operaciones).',

            // Prefix
            'prefix.required' => 'El prefijo es obligatorio.',
            'prefix.string' => 'El prefijo debe ser una cadena de texto.',
            'prefix.max' => 'El prefijo debe tener máximo 4 caracteres.',

            // Number
            'number.required' => 'El número del documento es obligatorio.',
            'number.numeric' => 'El número del documento debe ser un número.',

            // Date
            'date.required' => 'La fecha es obligatoria.',
            'date.date_format' => 'La fecha debe tener el formato exigido por la DIAN.',
            'due_date.date_format' => 'La fecha de vencimiento debe tener el formato exigido por la DIAN.',

            // Currency
            'currency.required' => 'La moneda es obligatoria.',
            'currency.string' => 'La moneda debe ser una cadena de texto.',
            'currency.size' => 'La moneda debe tener 3 caracteres.',
            'currency.exists_in_listings' => 'La moneda no es un código válido (revisar listado de monedas).',

            // Payment mean
            'payment_mean.required' => 'Es obligatorio especificar si la factura es débito o crédito.',
            'payment_mean.numeric' => 'El código de la forma de pago debe ser un número.',
            'payment_mean.exists_in_listings' => 'El código de la forma de pago no es válido (revisar listado de formas de pago).',
        ];
    }
}
