<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\mejaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\kategoriController;

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

Route::get('/', [AuthController::class, 'index'])->name('/');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::controller(produkController::class)->prefix('produk')->group(function () {
        Route::get('', 'index')->name('produk'); 
        Route::get('tambah', 'tambah')->name('formproduk');
        Route::post('tambah', 'simpan')->name('produk.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('produk.edit');
        Route::patch('edit/{id}', 'update')->name('produk.edit.update');
        Route::get('hapus/{id}', 'hapus')->name('produk.hapus');
    });
    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('', 'index')->name('user'); 
        Route::get('tambah', 'tambah')->name('formuser');
        Route::post('tambah', 'simpan')->name('user.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('user.edit');
        Route::patch('edit/{id}', 'update')->name('user.edit.update');
        Route::get('hapus/{id}', 'hapus')->name('user.hapus');
    });
    Route::get('/penjualan', function(){
        return view('admin.pembelian.index');
    })->name('penjualan');
});

Route::group(['middleware' => 'role:petugas'], function () {
    
});