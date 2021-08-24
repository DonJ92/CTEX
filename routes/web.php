<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/exchange', [App\Http\Controllers\ExchangeController::class, 'index'])->name('exchange');

Route::get('/dealer', [App\Http\Controllers\DealerController::class, 'index'])->name('dealer');

Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment');

Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');

Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');

Route::get('/faq', [App\Http\Controllers\FAQController::class, 'index'])->name('faq');

Route::get('/contactus', [App\Http\Controllers\ContactUsController::class, 'index'])->name('contactus');

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');

Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');
