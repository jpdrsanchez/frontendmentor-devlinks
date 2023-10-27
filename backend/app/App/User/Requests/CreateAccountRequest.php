<?php

namespace App\App\User\Requests;

use App\Domain\User\DTO\CreateAccountData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc', 'unique:users,email'],
            'password' => ['required', 'string', Password::min(8)->numbers()->letters()->mixedCase()],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function dto(): CreateAccountData
    {
        return CreateAccountData::from($this->validated());
    }
}
