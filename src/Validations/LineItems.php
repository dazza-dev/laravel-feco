<?php

namespace DazzaDev\LaravelFeco\Validations;

use DazzaDev\LaravelFeco\Rules\ExistsInListings;

class LineItems
{
    /**
     * Line items rules.
     */
    public function rules(): array
    {
        return [
            'line_items' => ['required', 'array'],
            'line_items.*.name' => ['required'],
            'line_items.*.code' => ['required'],
            'line_items.*.quantity' => ['required', 'numeric'],
            'line_items.*.unit_code' => ['required', new ExistsInListings('units')],
            'line_items.*.unit_price' => ['required', 'numeric'],
            'line_items.*.total_amount' => ['required', 'numeric'],
            'line_items.*.free_of_charge' => ['required', 'boolean'],
            'line_items.*.item_type' => ['required', new ExistsInListings('line-item-types')],

            // Taxes
            'line_items.*.taxes' => ['required', 'array'],
            'line_items.*.taxes.*.code' => ['required', new ExistsInListings('taxes')],
            'line_items.*.taxes.*.percent' => ['required', 'numeric', 'between:0,100'],
            'line_items.*.taxes.*.tax_amount' => ['required', 'numeric'],
            'line_items.*.taxes.*.taxable_amount' => ['required', 'numeric'],

            // Allowance charges
            'line_items.*.allowance_charges' => ['array'],
            'line_items.*.allowance_charges.*.is_charge' => ['required', 'boolean'],
            'line_items.*.allowance_charges.*.reason_code' => ['required', new ExistsInListings('allowance-charges')],
            'line_items.*.allowance_charges.*.percentage' => ['required', 'numeric', 'between:0,100'],
            'line_items.*.allowance_charges.*.amount' => ['required', 'numeric'],
            'line_items.*.allowance_charges.*.base_amount' => ['required', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'line_items.required' => 'Los ítems son obligatorios.',
            'line_items.*.name.required' => 'El nombre del ítem es obligatorio.',
            'line_items.*.code.required' => 'El código del ítem es obligatorio.',
            'line_items.*.quantity.required' => 'La cantidad del ítem es obligatoria.',
            'line_items.*.quantity.numeric' => 'La cantidad del ítem debe ser un número.',
            'line_items.*.unit_code.required' => 'El código de la unidad es obligatorio.',
            'line_items.*.unit_code.exists_in_listings' => 'El código de la unidad no es válido (revisar listado de unidades).',
            'line_items.*.unit_price.required' => 'El precio unitario es obligatorio.',
            'line_items.*.unit_price.numeric' => 'El precio unitario debe ser un número.',
            'line_items.*.total_amount.required' => 'El monto total del ítem es obligatorio.',
            'line_items.*.total_amount.numeric' => 'El monto total del ítem debe ser un número.',
            'line_items.*.free_of_charge.required' => 'Es obligatorio especificar si el ítem tiene cargos.',
            'line_items.*.free_of_charge.boolean' => 'Debe marcar un valor verdadero o falso para indicar si el ítem tiene cargos.',
            'line_items.*.item_type.required' => 'El tipo de ítem es obligatorio.',
            'line_items.*.item_type.exists_in_listings' => 'El tipo de ítem no es válido (revisar listado de tipos de ítems).',

            // Taxes
            'line_items.*.taxes.required' => 'Los impuestos del ítem son obligatorios.',
            'line_items.*.taxes.*.code.required' => 'El código del impuesto del ítem es obligatorio.',
            'line_items.*.taxes.*.code.exists_in_listings' => 'El código del impuesto del ítem no es válido (revisar listado de impuestos).',
            'line_items.*.taxes.*.percent.required' => 'El porcentaje del impuesto del ítem es obligatorio.',
            'line_items.*.taxes.*.percent.numeric' => 'El porcentaje del impuesto del ítem debe ser un número.',
            'line_items.*.taxes.*.tax_amount.required' => 'El monto del impuesto del ítem es obligatorio.',
            'line_items.*.taxes.*.tax_amount.numeric' => 'El monto del impuesto del ítem debe ser un número.',
            'line_items.*.taxes.*.taxable_amount.required' => 'La base del impuesto del ítem es obligatoria.',
            'line_items.*.taxes.*.taxable_amount.numeric' => 'La base del impuesto del ítem debe ser un número.',

            // Allowance charges
            'line_items.*.allowance_charges.array' => 'Los cargos o descuentos deben ser un array.',
            'line_items.*.allowance_charges.*.is_charge.required' => 'El tipo de cargo o descuento es obligatorio.',
            'line_items.*.allowance_charges.*.is_charge.boolean' => 'El tipo de cargo o descuento debe ser un booleano.',
            'line_items.*.allowance_charges.*.reason_code.required' => 'El código de la razón es obligatorio.',
            'line_items.*.allowance_charges.*.reason_code.exists_in_listings' => 'El código de la razón no es válido (revisar listado de razones).',
            'line_items.*.allowance_charges.*.percentage.required' => 'El porcentaje es obligatorio.',
            'line_items.*.allowance_charges.*.percentage.numeric' => 'El porcentaje debe ser un número.',
            'line_items.*.allowance_charges.*.percentage.between' => 'El porcentaje debe estar entre 0 y 100.',
            'line_items.*.allowance_charges.*.amount.required' => 'El monto es obligatorio.',
            'line_items.*.allowance_charges.*.amount.numeric' => 'El monto debe ser un número.',
            'line_items.*.allowance_charges.*.base_amount.required' => 'La base es obligatoria.',
            'line_items.*.allowance_charges.*.base_amount.numeric' => 'La base debe ser un número.',
        ];
    }
}
