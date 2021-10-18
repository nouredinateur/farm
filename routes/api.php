<?php

use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\ReferenceController;
use App\Http\Controllers\Api\SensorController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('devices', DeviceController::class);
Route::apiResource('sensors', SensorController::class);

 Route::get('reference', [ReferenceController::class, 'getReferences']);
