<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
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

/**
 *  ban - route to redirect to if user status is Banned
 */
Route::get('/ban', function () {
    return view('errors.ban');
})->name('ban');

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

Route::group(['middleware' => ['auth', 'status']], function () {
    /**
     *  dashboard - index route
     */
    Route::get(
        '/',
        [DashboardController::class, 'index']
    )->name('dashboard');


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
        '/users-view/{action}/{id}',
        [UsersController::class, 'view']
    )->name('users.view')->middleware('permissions:users.manage');

    Route::post(
        '/users-avatar',
        [UsersController::class, 'avatar']
    )->name('users.avatar')->middleware('permissions:users.manage');

    Route::post(
        '/users-edit',
        [UsersController::class, 'edit']
    )->name('users.edit')->middleware('permissions:users.manage');

    Route::post(
        '/users-ban',
        [UsersController::class, 'ban']
    )->name('users.ban')->middleware('permissions:users.manage');

    Route::post(
        '/users-delete',
        [UsersController::class, 'delete']
    )->name('users.delete')->middleware('permissions:users.manage');

    // single user
    Route::get(
        '/users-activity/{id}',
        [UsersController::class, 'activity']
    )->name('users.user_activity')->middleware('permissions:users.activity');

    // all user
    Route::get(
        '/users-activity',
        [UsersController::class, 'activityAll']
    )->name('users.users_activity')->middleware('permissions:users.activity');

    /**
     *  roles - manage roles
     */
    Route::get(
        '/roles',
        [RoleController::class, 'index']
    )->name('roles')->middleware('permissions:roles.manage');

    Route::post(
        '/roles-add',
        [RoleController::class, 'add']
    )->name('roles.add')->middleware('permissions:roles.manage');

    Route::post(
        '/roles-edit',
        [RoleController::class, 'edit']
    )->name('roles.edit')->middleware('permissions:roles.manage');

    Route::post(
        '/roles-delete',
        [RoleController::class, 'delete']
    )->name('roles.delete')->middleware('permissions:roles.manage');
});
