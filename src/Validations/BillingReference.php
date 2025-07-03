<?php

namespace DazzaDev\LaravelFeco\Validations;

class BillingReference
{
    /**
     * Billing reference rules.
     */
    public function rules(): array
    {
        return [
            'correction_reason' => ['required'],
            'billing_reference' => ['required', 'array'],
            'billing_reference.document_type' => ['required'],
            'billing_reference.prefix' => ['required'],
            'billing_reference.number' => ['required'],
            'billing_reference.unique_identifier' => ['required'],
            'billing_reference.issue_date' => ['required', 'date'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            // Correction reason
            'correction_reason.required' => 'La razón de corrección es obligatoria.',
            'correction_reason.exists_in_listings' => 'La razón de corrección no es válida (revisar listado de razones de corrección).',

            // Billing reference
            'billing_reference.document_type.required' => 'El tipo de documento de referencia es obligatorio.',
            'billing_reference.document_type.exists_in_listings' => 'El tipo de documento de referencia no es válido (revisar listado de tipos de documentos).',
            'billing_reference.prefix.required' => 'El prefijo es obligatorio.',
            'billing_reference.number.required' => 'El número es obligatorio.',
            'billing_reference.unique_identifier.required' => 'El CUFE/CUDE es obligatorio.',
            'billing_reference.issue_date.required' => 'La fecha de emisión es obligatoria.',
        ];
    }
}
