<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;
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
        Route::post('logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');
        Route::get('', [ReportController::class, 'index'])->name('admin.home');

//        Route::get('login', [AdminAuthController::class, 'showFormLogin'])->name('admin.show.form.login');
//        Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login');
//        Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        Route::resource('agency', AgencyController::class)->except(['show', 'destroy']);
        Route::get('agency/{id}/delete', [AgencyController::class, 'destroy'])->name('agency.delete');
        Route::resource('staff', StaffController::class)->except(['show', 'destroy']);
        Route::get('staff/{id}/delete', [StaffController::class, 'destroy'])->name('staff.delete');
    });
});
