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

// ======================================================================================== //
// Index Routes
// defining the index page
// ======================================================================================== //

/**
 *  Defining the index route
 */
Route::get(
    '/',
    [DashboardController::class, 'index']
)->name('dashboard');

Route::get('/test', function () {
    return view('dashboard.admin');
});

// ======================================================================================== //
// Auth Routes
// generated from laravel/ui package
// php artisan route:list to see if the routes is really there
// ======================================================================================== //

Auth::routes();

// ======================================================================================== //
// Logged In Routes
// only user with session can use this routes (with their auth)
// ======================================================================================== //

// Route::get(
//     '/dashboard',
//     [DashboardController::class, 'index']
// )->name('dashboard');
