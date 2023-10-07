<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BootstrapController;
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

// route normal
// Route::get('/', function () {
//     return view('welcome');
// });

// route web
Route::get('/register', [RegisterController::class, 'showRegistrationForm'] )->name('register');
Route::post('/register', [RegisterController::class, 'register'] )->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'] )->name('login');
Route::post('/login', [LoginController::class, 'login'] )->name('login.submit');

Route::post('/logout', [LogoutController::class, 'logout'] )->name('logout');
