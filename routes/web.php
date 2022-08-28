<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'auth'],  function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'],  function(){
        Route::resource('roles', RolesController::class, ['name' => 'roles']);
        Route::resource('users', UsersController::class, ['name' => 'users']);

        // Login
        // Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        // Route::post('/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');

        // Logout
        // Route::post('/logout/submit', [LoginController::class, 'logout'])->name('admin.logout.submit');

        // Forget Password
        // Route::get('/password/reset', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        // Route::post('/password/reset/submit', [ForgetPasswordController::class, 'reset'])->name('password.update');
    });

});