<?php

use App\Http\Controllers\AdminController;
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
Route::post('/register/store',[AuthenticationController::class, 'RegisterStore'])->middleware('guest')->name('register.store');
Route::post('/authenticate',[AuthenticationController::class, 'authenticate'])->middleware('guest')->name('authenticate');
Route::get('/logout',[AuthenticationController::class,'logout'])->middleware('auth')->name('logout');
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// user admin
Route::controller(AdminController::class)->middleware(['auth', 'role:admin'])->group(function(){
    // menu guru
    Route::get('admin/list-guru','guruIndex')->name('admin.guru.index');
    Route::get('admin/create-guru','guruCreate')->name('admin.guru.create');
    Route::post('admin/store-guru','guruStore')->name('admin.guru.store');
    // menu guru end
    // menu siswa
    Route::get('admin/list-siswa','siswaIndex')->name('admin.siswa.index');
    // menu siswa end
    // menu mapel
    Route::get('admin/list-mapel','mapelIndex')->name('admin.mapel.index');
    Route::get('admin/create-mapel','mapelCreate')->name('admin.mapel.create');
    Route::post('admin/store-mapel','mapelStore')->name('admin.mapel.store');
    Route::get('admin/{id}/edit-mapel','mapelEdit')->name('admin.mapel.edit');
    Route::post('admin/{id}/update-mapel','mapelUpdate')->name('admin.mapel.update');
    Route::delete('admin/{mapel}/delete-mapel','mapelDestroy')->name('admin.mapel.destroy');
    // menu mapel end
    // menu jurusan
    Route::get('admin/list-jurusan','jurusanIndex')->name('admin.jurusan.index');
    Route::get('admin/create-jurusan','jurusanCreate')->name('admin.jurusan.create');
    Route::post('admin/store-jurusan','jurusanStore')->name('admin.jurusan.store');
    Route::get('admin/{id}/edit-jurusan','jurusanEdit')->name('admin.jurusan.edit');
    Route::post('admin/{id}/update-jurusan', 'jurusanUpdate')->name('admin.jurusan.update');
    Route::delete('admin/{jurusan}/delete-jurusan', 'jurusanDestroy')->name('admin.jurusan.destroy');
    // menu jurusan end
    // menu kelas
    Route::get('admin/list-kelas','kelasIndex')->name('admin.kelas.index');
    Route::get('admin/create-kelas','kelasCreate')->name('admin.kelas.create');
    Route::post('admin/store-kelas','kelasStore')->name('admin.kelas.store');
    Route::delete('admin/{kelas}/delete-kelas', 'kelasDestroy')->name('admin.kelas.destroy');
    
    // menu kelas end
});

Route::controller(GuruPiketController::class)->middleware(['auth','role:guru piket'])->group(function(){
    Route::get('guru-piket/home','home')->name('piket.home');
});