<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware(GuestMiddleware::class)->group(function () {
        Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login-form');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::get('/applications', [ApplicationController::class, 'index'])->name('admin.application.index');
        Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('admin.application.show');
    });
});
