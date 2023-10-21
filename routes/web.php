<?php

use App\Http\Controllers\Admin\AdminController;
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
Route::get('/', [BootstrapController::class, 'index'] )->name('dashboard');

Route::get('/resume', [BootstrapController::class, 'resume'] )->name('resume');
Route::get('/resume/download', [BootstrapController::class, 'downloadResume'])->name('resume.download')->middleware('auth');
Route::get('/resume/download/page', [BootstrapController::class, 'showDownloadPage'])->name('resume.download.page')->middleware('auth'); 

Route::get('/project', [BootstrapController::class, 'project'] )->name('project');

Route::get('/about', [BootstrapController::class, 'about'] )->name('about');

Route::get('/contact', [BootstrapController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [BootstrapController::class, 'submitForm'])->name('contact.submit');
Route::get('/contact/submit/message', [BootstrapController::class, 'showMessage'])->name('contact.message')->middleware('check.message');
