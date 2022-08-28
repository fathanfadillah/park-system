<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthenticateRole;
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
        Route::get('admin', function () {
            return 'admin page';
        })->name('admin.home');
    });
   
    Route::get('user', function () {
        return 'user page';
    })->name('user.home');
});


