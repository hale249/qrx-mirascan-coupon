<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\QRCodeController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('my-admin')->group(static function () {
    Route::middleware('guest:admin')->group(static function () {
        Route::get('login', [AdminAuthController::class, 'showFormLogin'])->name('admin.login');
        Route::post('login', [AdminAuthController::class, 'login']);
    });

    Route::middleware(['auth:admin'])->group(static function () {
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        Route::get('', [ReportController::class, 'index'])->name('admin.home');

        Route::resource('agency', AgencyController::class)->except(['show', 'destroy']);
        Route::get('qrcode', [QRCodeController::class, 'index'])->name('qrcode.index');
        Route::get('agency/{id}/delete', [AgencyController::class, 'destroy'])->name('agency.delete');
        Route::resource('staff', StaffController::class)->except(['show', 'destroy']);
        Route::get('staff/{id}/delete', [StaffController::class, 'destroy'])->name('staff.delete');

        Route::get('staff/{id}/show-form-password', [StaffController::class, 'showFormPassword'])->name('staff.show-form-password');
        Route::put('staff/{id}/change-password', [StaffController::class, 'changePassword'])->name('staff.change-password');

        Route::get('show-form-password', [AdminAuthController::class, 'showFormPassword'])->name('admin.show-form-password');
        Route::put('change-password', [AdminAuthController::class, 'changePassword'])->name('admin.change-password');
    });
});
