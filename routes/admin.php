<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
// Organization
use App\Http\Controllers\Admin\Organization\OfferController;
use App\Http\Controllers\Admin\Organization\IndustryController;
use App\Http\Controllers\Admin\Organization\UserController;
use App\Http\Controllers\Admin\Organization\FeatureController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

// 追加機能
Route::middleware('auth:admin')->group(function () {
    // 求人
    Route::get('offer', [OfferController::class, 'index'])
                ->name('offer');

    // 業界
    Route::get('industry', [IndustryController::class, 'index'])
                ->name('industry');

    Route::get('industry/create', [IndustryController::class, 'create'])
                ->name('industry.create');

    Route::post('industry', [IndustryController::class, 'store']);

    Route::get('industry/{id}', [IndustryController::class, 'show'])
                ->name('industry.show');

    Route::get('industry/{id}/edit', [IndustryController::class, 'edit'])
                ->name('industry.edit');

    Route::put('industry/{id}/edit', [IndustryController::class, 'update']);

    Route::delete('industry/{id}', [IndustryController::class, 'destroy'])
                ->name('industry.destroy');

    // ユーザー管理
    Route::get('user', [UserController::class, 'index'])
                ->name('user');

    Route::get('user/{id}', [UserController::class, 'show'])
                ->name('user.show');

    Route::delete('user/{id}', [UserController::class, 'destroy'])
                ->name('user.destroy');

    // 特徴
    Route::get('feature', [FeatureController::class, 'index'])
                ->name('feature');
});
