<?php

namespace Dataloft\Auto\Vehicle\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteVehicleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'поле :attribute обязательно',
        ];
    }
}
