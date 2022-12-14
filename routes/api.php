<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('application/list', [ApplicationController::class, 'searchList'])->name('searchList');
Route::post('invoices/{id}', [QuotationController::class, 'store'])->name('invoice.store');

Route::put('task/status', [TaskController::class, 'statusChange']);
