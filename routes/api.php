<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\UserController;
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

Route::prefix('/v1')->group(function() {

    // Auth
    Route::prefix('/auth')->controller(AuthController::class)->group(function() {
        Route::post('/login', 'login')->name('auth.login');
        Route::post('/register', 'register')->name('auth.register');
        Route::post('/logout', 'logout')->name('auth.logout')->middleware('auth:sanctum');
    });

    // Route::middleware('auth:sanctum')->group(function() {
        Route::apiResource('user', UserController::class);
        Route::apiResource('rent', RentController::class);
        Route::apiResource('costumer', CostumerController::class);
        Route::apiResource('return', ReturController::class);
        // Route::apiResource('return', ReturCostumer::class);
    // });
    // Route::post('/register', [CostumerController::class, 'register'])->name('costumer.register');
});
