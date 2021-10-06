<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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
    return view('test/test1');
});

// ======================================================================================== //
// auth - Auth Routes
// ======================================================================================== //

// Route::get(
//     '/login',
//     [AuthController::class, 'getLogin']
// )->name('auth.login');

// Route::get(
//     '/register',
//     [AuthController::class, 'getRegister']
// )->name('auth.goregister'); //TODO figured this out

Auth::routes();

// ======================================================================================== //
// Logged In Routes
// ======================================================================================== //


Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
