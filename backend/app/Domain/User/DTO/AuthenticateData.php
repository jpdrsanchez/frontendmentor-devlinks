<?php

namespace App\Domain\User\DTO;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Same;
use Spatie\LaravelData\Data;

class AuthenticationData extends Data {
    public function __construct(
        #[Email]
        public string $email,
        #[Rule( 'string' )]
        public string $password,
        #[Same( 'password' )]
        public string $confirmPassword
    ) {
    }
}
