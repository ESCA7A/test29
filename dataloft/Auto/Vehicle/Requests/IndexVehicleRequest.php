<?php

namespace Dataloft\Auto\Vehicle\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $limit
 */
final class IndexVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'limit' => ['present', 'numeric']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'limit' => $this->limit ?? 15,
        ]);
    }

    public function messages(): array
    {
        return [
            'limit.numeric' => 'поле :attribute должно быть :numeric',
        ];
    }
}
