<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TableController;

/*
|--------------------------------------------------------------------------
| API Routes (Customer)
|--------------------------------------------------------------------------
| Semua route di sini diakses via aplikasi mobile (Ionic).
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route yang butuh login customer
Route::middleware('auth:sanctum')->group(function () {

    // Menu
    Route::get('/menus', [MenuController::class, 'index']);

    // Meja (untuk customer pilih meja saat order)
    Route::get('/tables', [TableController::class, 'index']);

    // Pesanan
    Route::post('/orders', [OrderController::class, 'store']); // bikin pesanan
    Route::get('/orders', [OrderController::class, 'myOrders']); // riwayat pesanan customer

});
