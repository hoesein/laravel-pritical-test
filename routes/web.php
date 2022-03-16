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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/customer', [App\Http\Controllers\HomeController::class, 'customer'])->name('customer');
Route::post('/customLogin', [App\Http\Controllers\Auth\LoginController::class, 'customLogin'])->name('custom_login');
Route::post('/dynamci_form_save', [App\Http\Controllers\DynamicFormController::class, 'df_submit'])->name('df_submit');
// Route::post('/dynamic_form_update', [App\Http\Controllers\DynamicFormController::class, 'df_update'])->name('df_update');