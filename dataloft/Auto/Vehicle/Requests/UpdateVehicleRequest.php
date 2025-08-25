<?php

namespace Dataloft\Auto\Vehicle\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateVehicleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric'],
            'release_year' => ['nullable', 'date', Rule::date()->format('Y-m-d')],
            'car_mileage_km' => ['nullable', 'numeric'],
            'color' => ['nullable', 'hex_color'],
        ];
    }

    #[\Override]
    public function messages(): array
    {
        return [
            'id.required' => 'поле :attribute обязательно',
        ];
    }
}
