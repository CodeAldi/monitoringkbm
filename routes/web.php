<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruPiketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[AuthenticationController::class, 'RenderLoginPage'])->middleware('guest')->name('login');
Route::get('/register',[AuthenticationController::class, 'RenderRegisterPage'])->middleware('guest')->name('register');
Route::post('/authenticate',[AuthenticationController::class, 'authenticate'])->middleware('guest')->name('authenticate');
Route::get('/logout',[AuthenticationController::class,'logout'])->middleware('auth')->name('logout');
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::controller(GuruPiketController::class)->middleware(['auth','role:guru piket'])->group(function(){
    Route::get('guru-piket/home','home')->name('piket.home');
});