<?php

use App\Http\Controllers\Aplikasi\AplikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Users\UsersController;

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

// Main Page Route
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login_action', [LoginController::class, 'login_action'])->name('login.action');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// authentication
// Route::get('/auth/login-basic', [LoginController::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/admin', [HomePage::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/setting/aplikasi', [AplikasiController::class, 'aplikasi'])->name('aplikasi');

    Route::post('/setting/aplikasi/editProses', [AplikasiController::class, 'updateAplikasi'])->name('aplikasi.update');

    //Profile
    //tanggal 5-21-2024
    Route::get('/users', [UsersController::class, 'users'])->name('users');
    Route::get('/users/list', [UsersController::class, 'userList'])->name('users.userList');


    //Profile
    //tanggal 5-21-2024
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
});
