<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TablesController;
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
    // Main Route
    Route::get('', [AdminController::class, 'index'])->name('dashboard');

    // Log activity
    Route::get('/log/download', [ActivityLogController::class, 'downloadLog'])->name('download-log');

    // Reset Option
    Route::post('/reset', [TablesController::class, 'resetTables'])->name('reset.tables');

    // Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/role/update', [AdminController::class, 'updateRole'])->name('updateRole');
    Route::delete('/profile/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete');

    // Project logic
    Route::resource('projects', ProjectController::class);

    // Resume
    Route::get('/resume', [AdminController::class, 'resume'])->name('resume');
    
    // Reports
    Route::get('/reports', [ReportController::class, 'reports'])->name('reports');
    Route::delete('/reports/message/{id}', [ReportController::class, 'delete'])->name('reports.delete');
});