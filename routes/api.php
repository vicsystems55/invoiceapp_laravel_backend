<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
        'prefix' => '/v1',
    ],
    function () {

        Route::get('test-route', [ApiAuthController::class,'register']);

        Route::post('/register', [ApiAuthController::class, 'register']);

        Route::post('/login', [ApiAuthController::class, 'login']);

        Route::post('/verify-otp', [ApiAuthController::class, 'verify_otp']);

        Route::post('/resend-otp', [ApiAuthController::class, 'resend_otp']);

    });
