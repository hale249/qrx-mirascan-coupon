<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\StaticController;
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


Route::get('', [StaticController::class, 'index'])->name('qrx.static');
Route::get('1', [StaticController::class, 'index'])->name('home');
Route::get('/v/s', [StaticController::class, 'qrcodeScan'])->name('qrx.scan');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
