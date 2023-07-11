<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\StaffHomeController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['middleware'=>['auth']],function(){
    Route::get('', [StaffHomeController::class, 'index'])->name('home');
    Route::post('check-code', [StaffHomeController::class, 'checkCoupon'])->name('check-coupon');

    Route::get('show-form-password', [StaffHomeController::class, 'showFormPassword'])->name('client.show-form-password');
    Route::put('change-password', [StaffHomeController::class, 'changePassword'])->name('client.change-password');
});
