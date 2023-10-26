<?php

namespace App\Domain\User\DTO;

use Spatie\LaravelData\Data;

class AuthenticateData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
