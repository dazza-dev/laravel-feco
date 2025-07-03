<?php

namespace DazzaDev\LaravelFeco\Validations;

use DazzaDev\LaravelFeco\Rules\ExistsInListings;

class Customer
{
    /**
     * Customer rules.
     */
    public function rules(): array
    {
        return [
            'customer' => ['required', 'array'],
            'customer.identification_type' => ['required', new ExistsInListings('identification-types')],
            'customer.identification_number' => ['required'],
            'customer.name' => ['required'],
            'customer.email' => ['required'],
            'customer.address' => ['sometimes'],
            'customer.city' => ['required_if:customer.address,!=,null', new ExistsInListings('municipalities')],
            'customer.state' => ['required_if:customer.address,!=,null', new ExistsInListings('states')],
            'customer.country' => ['required_if:customer.address,!=,null', new ExistsInListings('countries')],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'customer.identification_type.required' => 'El tipo de identificación del receptor es obligatorio.',
            'customer.identification_type.exists_in_listings' => 'El tipo de identificación del receptor no es válido (revisar listado de tipos de identificación).',
            'customer.identification_number.required' => 'El número de identificación del receptor es obligatorio.',
            'customer.name.required' => 'El nombre del receptor es obligatorio.',
            'customer.email.required' => 'El correo electrónico del receptor es obligatorio.',
        ];
    }
}
