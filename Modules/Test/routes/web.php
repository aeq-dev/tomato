<?php

use Illuminate\Support\Facades\Route;
use Modules\Test\App\Http\Controllers\TestController;

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

Route::group([], function () {
    Route::resource('test', TestController::class)->names('test');
});

Route::middleware(['auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/customers', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('admin/customers/api', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'api'])->name('customers.api');
    Route::get('admin/customers/create', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('admin/customers', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('admin/customers/{model}', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
    Route::get('admin/customers/{model}/edit', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('admin/customers/{model}', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('admin/customers/{model}', [\Modules\Test\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
});
