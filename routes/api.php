<?php

use App\Models\BillableItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\ApiAuthController;
use App\Http\Controllers\API\v1\InvoiceController;
use App\Http\Controllers\API\v1\InvoiceItemController;
use App\Http\Controllers\API\v1\BillableItemController;
use App\Http\Controllers\API\v1\BusinessProfileController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
        'prefix' => '/v1',
    ],
    function () {

        // Route::get('test-route', [ApiAuthController::class,'register']);

        Route::post('/register', [ApiAuthController::class, 'register']);

        Route::post('/login', [ApiAuthController::class, 'login']);

        Route::post('/verify-otp', [ApiAuthController::class, 'verify_otp']);

        Route::post('/resend-otp', [ApiAuthController::class, 'resend_otp']);

        Route::post('/create/business-profile', [BusinessProfileController::class, 'createProfile'])->middleware('auth:sanctum');

        Route::post('/create-billable-item', [BillableItemController::class, 'createBillableItem'])->middleware('auth:sanctum');

        Route::post('/initialize-invoice', [InvoiceController::class, 'initializeInvoice'])->middleware('auth:sanctum');

        Route::post('/append-to-inoice', [InvoiceItemController::class, 'appendToInvoice'])->middleware('auth:sanctum');

        Route::get('/invoice/export/pdf', [InvoiceController::class, 'exportPDF']);




    });
