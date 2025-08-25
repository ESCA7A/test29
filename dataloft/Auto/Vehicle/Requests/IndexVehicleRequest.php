<?php

namespace Dataloft\Auto\Vehicle\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $limit
 */
final class IndexVehicleRequest extends FormRequest
{
    /**
     * @return bool
     * @psalm-api
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array[]
     * @psalm-api
     */
    public function rules(): array
    {
        return [
            'limit' => ['present', 'numeric']
        ];
    }

    #[\Override]
    protected function prepareForValidation()
    {
        $this->merge([
            'limit' => $this->limit ?? 15,
        ]);
    }

    #[\Override]
    public function messages(): array
    {
        return [
            'limit.numeric' => 'поле :attribute должно быть :numeric',
        ];
    }
}
