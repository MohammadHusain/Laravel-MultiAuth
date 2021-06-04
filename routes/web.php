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

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLogin'])->name('admin');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
});

Route::get('/superadmin/login', [App\Http\Controllers\Auth\LoginController::class, 'showSuperAdminLogin'])->name('superadmin');
Route::post('/superadmin/login', [App\Http\Controllers\Auth\LoginController::class, 'superAdminLogin'])->name('superadmin.login');

Route::group(['middleware' => 'auth:superadmin'], function () {
    Route::get('/superadmin', [App\Http\Controllers\HomeController::class, 'index'])->name('superadmin.home');
});
