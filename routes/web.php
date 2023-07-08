<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalculatePriceController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\CoefficientController;
use App\Http\Controllers\Admin\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'frontend.door_detail');
Route::view('/login','auth.login');
Route::post('login', [LoginController::class, 'login']);
Route::post('calculate_price', [CalculatePriceController::class, 'calculate'])->name('calculate_price');

Route::group(['middleware' => 'admin'], function () {

    Route::view('/dashboard','admin.dashboard')->name('dashboard');
    Route::get('logout', [LogoutController::class, 'logout']);

    Route::resource('attributes', AttributeController::class);
    Route::get('/attributes/destroy/{id}', [AttributeController::class, 'destroy'])->name('attributes.destroy');
    Route::resource('attribute_values', AttributeValueController::class);
    Route::get('/attribute_values/destroy/{id}', [AttributeValueController::class, 'destroy'])->name('attribute_values.destroy');
    Route::resource('coefficients', CoefficientController::class);
    Route::get('/coefficients/destroy/{id}', [CoefficientController::class, 'destroy'])->name('coefficients.destroy');
    Route::get('/coefficients/destroy/{id}', [CoefficientController::class, 'destroy'])->name('coefficients.destroy');
    Route::resource('orders', OrderController::class);

});


