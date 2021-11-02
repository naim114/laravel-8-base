<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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
// Authorised (Logged In) Routes
// only authorised user can access these route
// ======================================================================================== //

Route::group(['middleware' => ['auth']], function () {
    /**
     *  profile - manage personal profile
     */
    Route::get(
        '/profile',
        [ProfileController::class, 'index']
    )->name('profile')->middleware('auth');

    Route::post(
        '/avatar',
        [ProfileController::class, 'storeAvatar']
    )->name('profile.avatar')->middleware('auth');

    Route::post(
        '/update-profile',
        [ProfileController::class, 'updateProfile']
    )->name('profile.update_profile')->middleware('auth');

    Route::post(
        '/update-auth',
        [ProfileController::class, 'updateAuth']
    )->name('profile.update_auth')->middleware('auth');

    /**
     *  activity - personal activity log
     */
    Route::get(
        '/activity',
        [ActivityLogController::class, 'index']
    )->name('activity')->middleware('auth');

    /**
     *  users - manage users
     */
    Route::get(
        '/users',
        [UsersController::class, 'index']
    )->name('users')->middleware('permissions:users.manage');

    Route::get(
        '/users-activity/{id}',
        [UsersController::class, 'activityLog']
    )->name('users.user_activity')->middleware('permissions:users.manage');

    Route::get(
        '/users-view/{action}/{id}',
        [UsersController::class, 'view']
    )->name('users.view')->middleware('permissions:users.manage');

    Route::post(
        '/users-edit',
        [UsersController::class, 'edit']
    )->name('users.edit')->middleware('permissions:users.manage');
});
