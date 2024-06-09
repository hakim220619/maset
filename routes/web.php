<?php

use App\Http\Controllers\Aplikasi\AplikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginController;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\RegisterController;
use App\Http\Controllers\Bangunan\BangunanController;
use App\Http\Controllers\Broadcast\BroadcastController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Retail\ReatailController;
use App\Http\Controllers\Tanah_kosong\TanahkosongController;
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

Route::get('/forget-password', [LoginController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password-proses', [LoginController::class, 'forgetPasswordProses'])->name('forgetPasswordProses');
Route::get('/auth/reset-password-proses/{token}', [LoginController::class, 'resetPasswordProses'])->name('resetPasswordProses');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// authentication
// Route::get('/auth/login-basic', [LoginController::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-view', [RegisterController::class, 'index'])->name('auth-register-view');
Route::post('/auth/register', [RegisterController::class, 'addRegister'])->name('addRegister');
Route::post('/checkEmail', [GeneralController::class, 'checkEmail'])->name('checkEmail');
Route::post('/checkNik', [GeneralController::class, 'checkNik'])->name('checkNik');
Route::post('/checkKontak', [GeneralController::class, 'checkKontak'])->name('checkKontak');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/admin', [HomePage::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/user', [HomePage::class, 'index'])->name('admin.user');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/setting/aplikasi', [AplikasiController::class, 'aplikasi'])->name('aplikasi');

    Route::post('/setting/aplikasi/editProses', [AplikasiController::class, 'updateAplikasi'])->name('aplikasi.update');

    //Role Structure
    Route::get('/setting/roleStructure', [GeneralController::class, 'roleStructureView'])->name('role.roleStructureView');
    Route::get('/setting/roleStructureList', [GeneralController::class, 'roleStructureList'])->name('role.roleStructureList');
    Route::post('/setting/addRoleStructureProses', [GeneralController::class, 'addRoleStructureProses'])->name('role.addRoleStructureProses');
    Route::post('/setting/updateRoleStructureProses', [GeneralController::class, 'updateRoleStructureProses'])->name('role.updateRoleStructureProses');
    Route::get('/setting/deleteRoleStructureProses/{id}', [GeneralController::class, 'deleteRoleStructureProses'])->name('role.deleteRoleStructureProses');
    //Role Access
    Route::get('/setting/roleAccess', [GeneralController::class, 'roleAccessView'])->name('role.roleAccessView');
    Route::get('/setting/roleAccessList', [GeneralController::class, 'roleAccessList'])->name('role.roleAccessList');
    Route::post('/setting/addRoleAccessProses', [GeneralController::class, 'addRoleAccessProses'])->name('role.addRoleAccessProses');
    Route::post('/setting/updateRoleAceessProses', [GeneralController::class, 'updateRoleAceessProses'])->name('role.updateRoleAceessProses');
    Route::get('/setting/deleteRoleAccessProses/{id}', [GeneralController::class, 'deleteRoleAccessProses'])->name('role.deleteRoleAccessProses');

    //Role
    Route::get('/setting/role', [GeneralController::class, 'roleView'])->name('role.roleView');
    Route::get('/setting/roleList', [GeneralController::class, 'roleList'])->name('role.roleList');
    Route::post('/setting/addRoleProses', [GeneralController::class, 'addRoleProses'])->name('role.addRoleProses');
    Route::post('/setting/updateRoleProses', [GeneralController::class, 'updateRoleProses'])->name('role.updateRoleProses');
    Route::get('/setting/deleteRoleProses/{id}', [GeneralController::class, 'deleteRoleProses'])->name('role.deleteRoleProses');



    //Logs Activity
    Route::get('/setting/listUsersLogs', [GeneralController::class, 'listUsersLogs'])->name('setting.listUsersLogs');


    //Users
    //tanggal 5-21-2024
    Route::get('/users', [UsersController::class, 'users'])->name('users');
    Route::get('/users/list', [UsersController::class, 'userList'])->name('users.userList');
    Route::post('/users/addProses', [UsersController::class, 'addProses'])->name('users.addProses');
    Route::post('/users/editProses', [UsersController::class, 'editProses'])->name('users.editProses');
    Route::post('/users/updateProses', [UsersController::class, 'updateProses'])->name('users.updateProses');
    Route::get('/users/deleteProses/{id}', [UsersController::class, 'deleteProses'])->name('users.deleteProses');
    Route::get('/users/resetPassword/{id}', [UsersController::class, 'resetPassword'])->name('users.resetPassword');


    //Profile
    //tanggal 5-21-2024
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/security', [ProfileController::class, 'viewSecurity'])->name('profile.security');
    Route::get('/profile/suspended', [ProfileController::class, 'suspended'])->name('profile.suspended');
    Route::post('/profile/changePassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    //Bangunan
    Route::get('/object/bangunan', [BangunanController::class, 'bangunan'])->name('bangunan');
    Route::post('/object/add_bangunan', [BangunanController::class, 'add_bangunan'])->name('add_bangunan');
    //Tanah Kosong
    Route::get('/object/tanah_kosong', [TanahkosongController::class, 'tanah_kosong'])->name('tanah_kosong');
    Route::post('/object/add_tanah_kosong', [TanahkosongController::class, 'add_tanah_kosong'])->name('add_tanah_kosong');
    //Retail
    Route::get('/object/retail', [ReatailController::class,'retail'])->name('retail');
    Route::post('/object/add_retail', [ReatailController::class, 'add_retail'])->name('add_retail');


    //Broadcast
    Route::get('/broadcast', [BroadcastController::class, 'broadcast'])->name('broadcast');
    Route::get('/sendMessage', [BroadcastController::class, 'sendMessage'])->name('broadcast.sendMessage');
});
