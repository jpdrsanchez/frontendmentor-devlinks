<?php

namespace App\Domain\User\DTO;

use Spatie\LaravelData\Data;

class CreateAccountData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
