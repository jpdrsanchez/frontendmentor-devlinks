<?php

namespace App\Infra\Http\Controllers;

use App\Domain\User\Actions\AuthenticateAction;
use App\Domain\User\DTO\AuthenticateData;

class AuthController extends Controller {
    public function __construct( protected AuthenticateAction $auth ) {
    }

    public function authenticate( AuthenticateData $request ) {
        return $this->auth->execute( $request );
    }
}
