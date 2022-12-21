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
use Modules\Invoice\app\Http\Controllers\InvoiceController;
use Nwidart\Modules\Process\Updater;

Route::resource('invoice', InvoiceController::class)->only('index','store','update','destroy');
