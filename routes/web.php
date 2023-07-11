<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use \App\Http\Controllers\AdminAuthController;
use \App\Http\Controllers\StaffController;
use \App\Http\Controllers\AgencyController;
use \App\Http\Controllers\ReportController;

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


Route::get('', [StaticController::class, 'index'])->name('qrx.static');
Route::get('1', [StaticController::class, 'index'])->name('home');
Route::get('/v/s', [StaticController::class, 'qrcodeScan'])->name('qrx.scan');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['prefix'=>'my-admin'], function(){
    Route::get('', [ReportController::class, 'index'])->name('admin.home');

    Route::get('login', [AdminAuthController::class, 'showFormLogin'])->name('admin.show.form.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::resource('agency', AgencyController::class)->except('show');
    Route::resource('staff', StaffController::class)->except('show');
});
