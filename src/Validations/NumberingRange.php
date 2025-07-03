<?php

namespace DazzaDev\LaravelFeco\Validations;

class NumberingRange
{
    /**
     * Numbering range rules.
     */
    public function rules(): array
    {
        return [
            'numbering_range' => ['required', 'array'],
            'numbering_range.prefix' => ['required', 'max:4'],
            'numbering_range.authorized_code' => ['required'],
            'numbering_range.start_date' => ['required', 'date'],
            'numbering_range.end_date' => ['required', 'date'],
            'numbering_range.start_number' => ['required'],
            'numbering_range.end_number' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'numbering_range.required' => 'El rango de numeración es obligatorio.',
            'numbering_range.prefix.required' => 'El prefijo es obligatorio.',
            'numbering_range.prefix.max' => 'El prefijo debe tener máximo 4 caracteres.',
            'numbering_range.authorized_code.required' => 'El código autorizado es obligatorio.',
            'numbering_range.start_date.required' => 'La fecha de inicio es obligatoria.',
            'numbering_range.end_date.required' => 'La fecha de fin es obligatoria.',
            'numbering_range.start_number.required' => 'El número de inicio es obligatorio.',
            'numbering_range.end_number.required' => 'El número de fin es obligatorio.',
        ];
    }
}
