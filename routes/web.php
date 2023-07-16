<?php

use App\Http\Controllers\Company\DashboardCompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileOfAdminController;
use App\Http\Controllers\ProfileOfCompanyController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ユーザー画面
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// 管理画面
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.welcome');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/admin.php';
});

// 企業画面
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/', function () {
        return view('company.welcome');
    });
    Route::get('/dashboard', [DashboardCompanyController::class, 'index'])
        ->middleware(['auth:company', 'verified'])->name('dashboard');;

    Route::middleware('auth:company')->group(function () {
        Route::get('/profile', [ProfileOfCompanyController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfCompanyController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfCompanyController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/company.php';
});
