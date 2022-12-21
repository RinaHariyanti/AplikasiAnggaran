<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Pengeluaran\app\Http\Controllers\PengeluaranController;
use Modules\Pengeluaran\app\Http\Controllers\PengeluaranDetailController;

Route::resource('pengeluaran', PengeluaranController::class)->only('index', 'create', 'store', 'update', 'destroy');
Route::prefix('pengeluaran')->name('pengeluaran.')->group(function () {
    Route::resource('detail', PengeluaranDetailController::class)->only('store', 'update', 'destroy');
});
