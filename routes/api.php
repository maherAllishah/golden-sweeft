<?php

use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\NearestLocationController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('update-location', [LocationController::class, 'updateLocation']);
Route::post('find-nearest-vendors', [NearestLocationController::class, 'findNearestVendors']);
