<?php

namespace App\App\User\Controllers;

use App\App\User\Requests\AuthenticateRequest;
use App\App\User\Requests\CreateAccountRequest;
use App\Domain\User\Actions\AuthenticateAction;
use App\Domain\User\Actions\CreateAccountAction;
use App\Infra\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Throwable;

class AuthController extends Controller
{
    public function __construct(protected AuthenticateAction $authenticateAction, protected CreateAccountAction $createAccountAction)
    {
    }

    public function authenticate(AuthenticateRequest $request): JsonResponse
    {
        $actionResult = $this->authenticateAction->execute($request->dto());

        return response()->json($actionResult);
    }

    /**
     * @throws Throwable
     */
    public function createAccount(CreateAccountRequest $request): JsonResponse
    {
        $actionResult = $this->createAccountAction->execute($request->dto());

        return response()->json($actionResult, 201);
    }
}
