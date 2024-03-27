<?php

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

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('test', fn (Request $request) => $request->user())->name('test');
});

Route::middleware(['auth:sanctum'])->name('api.')->group(function () {
    Route::get('/customers', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{model}', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
    Route::post('/customers/{model}', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{model}', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
});
