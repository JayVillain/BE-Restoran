<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\TableController as AdminTableController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes (Admin Dashboard)
|--------------------------------------------------------------------------
| Semua route di sini diakses via browser (web admin).
| Middleware "auth" + "is_admin" memastikan hanya admin yang bisa masuk.
*/

Route::get('/', function () {
    return view('welcome');
});

// Grup untuk Admin
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {

    // Manajemen Menu
    Route::get('/menus', [AdminMenuController::class, 'index'])->name('admin.menus.index');
    Route::get('/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
    Route::post('/menus', [AdminMenuController::class, 'store'])->name('admin.menus.store');
    Route::get('/menus/{id}/edit', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
    Route::put('/menus/{id}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
    Route::delete('/menus/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');

    // Manajemen Meja
    Route::get('/tables', [AdminTableController::class, 'index'])->name('admin.tables.index');
    Route::post('/tables', [AdminTableController::class, 'store'])->name('admin.tables.store');
    Route::put('/tables/{id}', [AdminTableController::class, 'update'])->name('admin.tables.update');
    Route::delete('/tables/{id}', [AdminTableController::class, 'destroy'])->name('admin.tables.destroy');

    // Manajemen Pesanan
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

});
