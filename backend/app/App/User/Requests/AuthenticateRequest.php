<?php

namespace App\App\User\Requests;

use App\Domain\User\DTO\AuthenticateData;
use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc'],
            'password' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function dto(): AuthenticateData
    {
        return AuthenticateData::from($this->validated());
    }
}
