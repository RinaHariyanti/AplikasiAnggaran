<?php

use Illuminate\Support\Facades\Route;

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

Route::permanentRedirect('/', '/login');

//utils for migrate
Route::get('/migrate', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate:refresh --seed');
    return \Illuminate\Support\Facades\Artisan::output();
});
