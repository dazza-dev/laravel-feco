<?php

namespace DazzaDev\LaravelFeco\Validations;

use DazzaDev\LaravelFeco\Rules\ExistsInListings;

class Company
{
    /**
     * Company rules.
     */
    public function rules(): array
    {
        return [
            'company' => ['required', 'array'],
            'company.identification_type' => ['required', new ExistsInListings('identification-types')],
            'company.identification_number' => ['required'],
            'company.entity_type' => ['required', new ExistsInListings('entity-types')],
            'company.regime' => ['required', new ExistsInListings('regimes')],
            'company.liability' => ['required'],
            'company.name' => ['required'],
            'company.email' => ['required'],
            'company.merchant_registration' => ['required'],
            'company.address' => ['sometimes'],
            'company.city' => ['required_if:company.address,!=,null', new ExistsInListings('municipalities')],
            'company.state' => ['required_if:company.address,!=,null', new ExistsInListings('states')],
            'company.country' => ['required_if:company.address,!=,null', new ExistsInListings('countries')],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'company.identification_type.required' => 'El tipo de identificación del emisor es obligatorio.',
            'company.identification_type.exists_in_listings' => 'El tipo de identificación del emisor no es válido (revisar listado de tipos de identificación).',
            'company.identification_number.required' => 'El número de identificación del emisor es obligatorio.',
            'company.entity_type.required' => 'El tipo de entidad del emisor es obligatorio.',
            'company.regime.required' => 'El régimen tributario del emisor es obligatorio.',
            'company.regime.exists_in_listings' => 'El régimen tributario del emisor no es válido (revisar listado de regímenes tributarios).',
            'company.liability.required' => 'El tipo de responsabilidad del emisor es obligatorio.',
            'company.name.required' => 'El nombre del emisor es obligatorio.',
            'company.email.required' => 'El correo electrónico del emisor es obligatorio.',
            'company.merchant_registration.required' => 'El número de registro mercantil del emisor es obligatorio.',
        ];
    }
}
