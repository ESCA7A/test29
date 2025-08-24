<?php

namespace Dataloft\Auto\Vehicle\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class CreateVehicleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'car_model_id' => ['required', 'numeric'],
            'release_year' => ['nullable', 'date', Rule::date()->format('Y-m-d')],
            'car_mileage_km' => 'nullable|numeric',
            'color' => 'nullable|hex_color',
        ];
    }

    public function messages(): array
    {
        return [
            'car_model_id.required' => 'поле :attribute обязательно',
        ];
    }
}
