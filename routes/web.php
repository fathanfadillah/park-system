<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParkController;
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

Route::get('login', function () {
    return view('auth.login');
})->name('login.index');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('admin/home', function () {
            return view('admin.index');
        })->name('admin.home');
    });
   
    Route::middleware(['user'])->group(function () {
        Route::get('user/home', function () {
            return view('user.index');
        })->name('user.home');
        Route::get('park', [ParkController::class, 'index'])->name('park.index');
        Route::post('park/enter', [ParkController::class, 'enterPark'])->name('park.enter');
    });
});


