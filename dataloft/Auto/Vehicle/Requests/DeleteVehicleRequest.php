<?php

namespace Dataloft\Auto\Vehicle\Requests;

use Dataloft\User\User\Dto\AuthorizeUser;
use Dataloft\User\User\Rules\IsOwner;
use Dataloft\User\User\UseCases\Authorize;
use Illuminate\Foundation\Http\FormRequest;

final class DeleteVehicleRequest extends FormRequest
{
    /**
     * @return bool
     * @psalm-api
     */
    public function authorize(): bool
    {
        if ($this->user_id) {
            Authorize::as(AuthorizeUser::from($this));

            return true;
        }

        return false;
    }

    /**
     * @return array[]
     * @psalm-api
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric', new IsOwner()],
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
