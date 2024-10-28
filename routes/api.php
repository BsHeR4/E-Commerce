<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
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




Route::prefix('user')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('user/logout', [AuthController::class, 'logout']);
    Route::post('order/create', [OrderController::class, 'store']);
    Route::put('order/edit', [OrderController::class, 'update']);
    Route::get('orders', [OrderController::class, 'index']);
});

Route::get('products', [ProductController::class, 'index']);



// Route::post('user/register', [AuthController::class, 'register']);
// Route::post('user/login', [AuthController::class, 'login']);
// Route::post('user/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Route::post('orders', [OrderController::class, 'store'])->middleware('auth:sanctum');
// Route::get('orders', [OrderController::class, 'index'])->middleware('auth:sanctum');

// Route::get('products', [ProductController::class, 'index']);
