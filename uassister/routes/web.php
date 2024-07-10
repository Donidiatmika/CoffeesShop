<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\PasswordController;
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
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', function () {
    auth()->logout(); // Melakukan logout pengguna
    return redirect('/login'); // Mengarahkan kembali ke halaman login setelah logout
})->name('logout');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
route::get('/', [LoginController::class,'welcome1'])->name('welcome1');

Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::get('/register', [WebAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);
Route::get('/home', [WebAuthController::class, 'home'])->name('home')->middleware('auth');
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [PasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [PasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');
