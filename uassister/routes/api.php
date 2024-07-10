<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CoffeeController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\AdminController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);
Route::middleware('auth:sanctum')->post('change-password', [AuthController::class, 'changePassword']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
    // Route untuk pengguna biasa
    Route::post('orders', [OrderController::class, 'store']);
    Route::get('user/orders', [OrderController::class, 'userOrders']);
    Route::put('orders/{order}', [OrderController::class, 'update']);
    Route::delete('orders/{order}', [OrderController::class, 'destroy']);
    Route::get('coffees', [CoffeeController::class, 'index']);

    // Route untuk admin
    Route::middleware('admin')->group(function () {
        Route::post('coffees', [CoffeeController::class, 'store']);
        Route::put('coffees/{coffee}', [CoffeeController::class, 'update']);
        Route::delete('coffees/{coffee}', [CoffeeController::class, 'destroy']);
        Route::get('orders', [AdminController::class, 'viewOrders']);
       
    });
});
