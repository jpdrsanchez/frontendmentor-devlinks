<?php

namespace App\Domain\User\Actions;

use App\Domain\User\DTO\AuthenticateData;
use App\Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticateAction
{
    public function execute(AuthenticateData $data): array
    {
        $user = User::select([
            'id',
            'first_name',
            'last_name',
            'email',
            'password',
        ])->where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return [
            'token' => $user->createToken('device')->plainTextToken,
            'user' => $user,
        ];
    }
}
