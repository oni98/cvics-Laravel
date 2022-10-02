<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PromotionalPackageController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/link-storage', function () {
//     Artisan::call('storage:link');
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Auth Routes
Route::post('register/submit', [AgentController::class, 'store'])->name('register.agent');
Route::post('/login', [UsersController::class, 'login'])->name('login.agent');

// Referred Auth Routes
Route::get('apply/{id}/referredby={name}', [ApplicationController::class, 'referredApplication'])->name('referred.application');

Route::group(['middleware' => ['verified', 'auth']],  function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Application Routes for Agent
    Route::get('/applications', [AgentController::class, 'applicationList'])->name('agent.application.list');
    Route::get('/application/{id}/show', [ApplicationController::class, 'showApplication'])->name('application.show');

    // Promotional Package Routes
    Route::get('/promotional-packages', [PromotionalPackageController::class, 'index'])->name('package.list');

    // ***Admin Routes***
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'],  function () {
        // Role Management Routes
        Route::resource('roles', RolesController::class, ['name' => 'roles']);
        Route::resource('users', UsersController::class, ['name' => 'users']);
        Route::resource('agents', AgentController::class, ['name' => 'agents']);

        // Agent Routes
        Route::get('/agent/list', [AgentController::class, 'index'])->name('agents');
        Route::get('/agent/{id}/edit', [AgentController::class, 'edit'])->name('agent.edit');
        Route::put('/agent/{id}/update', [AgentController::class, 'update'])->name('agent.update');
        Route::get('/agent/pending', [AgentController::class, 'pendingAgent'])->name('pendingAgents');
        Route::get('/agent/approve/{id}', [AgentController::class, 'approveAgent'])->name('agentApprove');

        // Application Routes
        Route::get('/application/list', [ApplicationController::class, 'applicationList'])->name('application.list');
        Route::get('/application/{id}/edit', [ApplicationController::class, 'editApplication'])->name('application.edit');
        Route::put('/application/{id}/update', [ApplicationController::class, 'update'])->name('application.update');
        Route::delete('/application/delete/{id}', [ApplicationController::class, 'destroy'])->name('application.destroy');

        // Status Routes
        Route::get('/status/list', [StatusController::class, 'index'])->name('status.list');
        Route::post('/status/store', [StatusController::class, 'store'])->name('status.store');
        Route::get('/status/{id}/edit', [StatusController::class, 'edit'])->name('status.edit');
        Route::put('/status/{id}/update', [StatusController::class, 'update'])->name('status.update');
        Route::delete('/status/{id}/delete', [StatusController::class, 'destroy'])->name('status.destroy');

        // Promotional Package Routes
        Route::post('/promotional-packages/store', [PromotionalPackageController::class, 'store'])->name('package.store');
        Route::delete('/promotional-packages/{id}/delete', [PromotionalPackageController::class, 'destroy'])->name('package.destroy');

        //Generate PDF Routes
        Route::post('/generate-pdf/apfid={id}', [ApplicationController::class, 'generatePdf'])->name('generatePdf');

        //Quotation Routes
        Route::get('/quotation/{id}', [QuotationController::class, 'index'])->name('quotation.create');
        Route::delete('/quotation/delete/{id}', [QuotationController::class, 'destroy'])->name('quotation.destroy');
    });
});

// Application
Route::get('/apply', [ApplicationController::class, 'index'])->name('application');
Route::post('/apply/submit', [ApplicationController::class, 'store'])->name('application.store');

// Check Status
Route::get('/check-status', [ApplicationController::class, 'checkStatus'])->name('checkStatus');
