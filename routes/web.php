<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarroController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'loginForm')->name('login');
    Route::post('login', 'login')->name('auth.login');
    Route::get('logout', 'logout')->name('auth.logout');
});

Route::controller(CarroController::class)->middleware('auth')->group(function () {
    Route::get('carro', 'index')->name('carro.index');
    Route::post('carro', 'store')->name('carro.store');
    Route::get('carro/create', 'create')->name('carro.create');
    Route::delete('carro/{carro}', 'destroy')->name('carro.destroy');
});
