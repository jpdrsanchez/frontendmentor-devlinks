<?php

namespace App\Http\Controllers;

use App\Domain\User\Actions\AuthenticateAction;
use App\Domain\User\DTO\AuthenticateData;
use App\Domain\User\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function __construct( protected AuthenticateAction $auth ) {
    }

    public function authenticate( AuthenticateData $request ) {
        return $this->auth->execute( $request );
    }
}
