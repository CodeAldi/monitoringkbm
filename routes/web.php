<?php

use App\Http\Controllers\AuthenticationController;
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

Route::get('/',[AuthenticationController::class, 'RenderLoginPage'])->name('login');
Route::get('/register',[AuthenticationController::class, 'RenderRegisterPage'])->name('register');

Route::controller(GuruPiketController::class)->group(function(){
    Route::get('guru-piket/home','home')->name('piket.home');
});