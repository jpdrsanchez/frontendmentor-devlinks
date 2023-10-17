<?php

namespace App\Domain\User\DTO;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Same;
use Spatie\LaravelData\Data;

class AuthenticateData extends Data
{
    public function __construct(
        #[Email]
        public string $email,
        #[Rule('string'), Min(8)]
        public string $password,
        #[Same('password'), MapInputName('confirm_password')]
        public string $confirmPassword
    ) {
    }
}
