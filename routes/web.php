<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ApplicationController;
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

Auth::routes(['verify' => true]);

// Auth Routes
Route::post('register/submit', [UsersController::class, 'store'])->name('register.agent');
Route::post('/login', [UsersController::class, 'login'])->name('login.agent');

Route::group(['middleware' => ['verified', 'auth']],  function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'],  function(){
        // Role Management Routes
        Route::resource('roles', RolesController::class, ['name' => 'roles']);
        Route::resource('users', UsersController::class, ['name' => 'users']);

        // Agent Routes
        Route::get('/agent/list', [AgentController::class, 'index'])->name('agents');
        Route::get('/agent/pending', [AgentController::class, 'pendingAgent'])->name('pendingAgents');
        Route::get('/agent/approve/{id}', [AgentController::class, 'approveAgent'])->name('agentApprove');
    });

});

// Application
Route::get('/apply', [ApplicationController::class, 'index'])->name('application');
Route::get('/apply/submit', [ApplicationController::class, 'store'])->name('application.store');