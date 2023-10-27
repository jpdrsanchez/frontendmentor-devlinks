<?php

namespace App\Domain\User\Actions;

use App\Domain\User\DTO\AuthenticateData;
use App\Domain\User\DTO\CreateAccountData;
use App\Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Throwable;

class CreateAccountAction
{
    public function __construct(protected AuthenticateAction $authenticateAction)
    {
    }

    /**
     * @throws Throwable
     */
    public function execute(CreateAccountData $data): array
    {
        $user = new User;

        $user->email = $data->email;
        $user->password = Hash::make($data->password);

        $user->saveOrFail();

        return $this->authenticateAction->execute(AuthenticateData::from([
            'email' => $data->email,
            'password' => $data->password,
        ]));
    }
}
