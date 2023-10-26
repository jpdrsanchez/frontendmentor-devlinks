<?php

namespace App\App\User\Controllers;

use App\App\User\Requests\AuthenticateRequest;
use App\Domain\User\Actions\AuthenticateAction;
use App\Infra\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(protected AuthenticateAction $auth)
    {
    }

    public function authenticate(AuthenticateRequest $request): JsonResponse
    {
        $actionResult = $this->auth->execute($request->dto());

        return response()->json($actionResult);
    }
}
