<?php

use App\Http\Controllers\Admin\ActivityLogController;
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
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/resume', [AdminController::class, 'resume'])->name('resume');
    Route::get('/project', [AdminController::class, 'project'])->name('project');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');

    Route::post('/update-role', [AdminController::class, 'updateRole'])->name('updateRole');
    Route::delete('/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete');
    
    // Unduh log aktivitas
    Route::get('/download-log', [ActivityLogController::class, 'downloadLog'])->name('download-log');
});