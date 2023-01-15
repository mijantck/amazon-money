<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [\App\Http\Controllers\Admin\LoginController::class, 'viewLogin'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');

    Route::group(['middleware' => ['auth:sanctum', 'admin']], function () {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    });

});
