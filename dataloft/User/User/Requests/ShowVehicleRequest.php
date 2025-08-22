<?php

namespace Dataloft\User\User\Requests;

use Dataloft\User\User\Dto\AuthorizeUser;
use Dataloft\User\User\UseCases\Authorize;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $id
 * @property int $limit
 */
class ShowVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        if ($this->id) {
            Authorize::as(AuthorizeUser::from($this));

            return true;
        }

        return false;
    }

    public function rules(): array
    {
        return [
            'id' => ['present', 'numeric'],
            'limit' => ['present', 'numeric']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'limit' => $this->limit ?? 10,
        ]);
    }

    public function messages(): array
    {
        return [
            'limit.numeric' => 'поле :attribute должно быть :numeric',
        ];
    }
}
