<?php

use App\App\Assets\Controllers\UploadController;
use App\App\User\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::name('auth.')->group(function () {
            Route::controller(AuthController::class)->group(function () {
                Route::post('/login', 'authenticate')->name('login');
                Route::post('/signup', 'createAccount')->name('signup');
            });
        });

        Route::post('/upload', UploadController::class)->name('upload');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
