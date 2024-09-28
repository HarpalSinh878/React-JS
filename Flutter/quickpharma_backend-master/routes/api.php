<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\WebApiController;
use App\Http\Controllers\MapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::post('login', [ApiController::class, 'login']);
Route::post('forgot/password', [ApiController::class, 'forgot_password']);
Route::post('reset/password', [ApiController::class, 'reset_password']);
Route::post('verify_otp', [ApiController::class, 'verify_otp']);
Route::post('get_system_settings', [ApiController::class, 'get_system_settings']);
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('getOrder', [ApiController::class, 'get_order']);
    Route::post('updateOrder', [ApiController::class, 'update_order']);
    Route::post('update_user', [ApiController::class, 'update_user']);
    Route::post('get_user', [ApiController::class, 'get_user']);
    Route::post('change_password', [ApiController::class, 'change_password']);
    Route::post('remove_order_document', [ApiController::class, 'remove_order_document']);
    Route::post('delete_user', [ApiController::class, 'delete_user']);
    Route::post('dashboard_statistics', [ApiController::class, 'dashboard_statistics']);
    Route::post('get_my_route', [ApiController::class, 'get_my_route']);
    Route::post('update_my_route', [ApiController::class, 'update_my_route']);
    Route::post('driver_statistics', [ApiController::class, 'driver_statistics']);
});
Route::prefix('web')->group(function () {
    Route::get('getOptimizeRoute', [WebApiController::class, 'getOptimizeRoute']);
    Route::post('getOrderDetail', [WebApiController::class, 'getOrderDetail']);
    Route::get('getRouteOrders', [WebApiController::class, 'getRouteOrders']);
});
