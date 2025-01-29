<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [ContactController::class, 'admin']);
    Route::get('/admin/find', [AdminController::class, 'find'])->name('admin.find');
    Route::post('/admin/search', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::post('/admin/categories', [CategoryController::class, 'store']);
    Route::get('/export/csv', [ExportController::class, 'csvExport'])->name('export.csv');
    // Route::post('/logout', function () {
    //     Auth::logout();
    //     return redirect('/login')->name('logout');
    // });
});

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/find', [AdminController::class, 'find']);
// Route::post('/find', [AdminController::class, 'search']);