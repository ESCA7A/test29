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
        if ($this->userId) {
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

    #[\Override]
    protected function prepareForValidation(): void
    {
        $this->merge([
            'limit' => $this->limit ?? 10,
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
