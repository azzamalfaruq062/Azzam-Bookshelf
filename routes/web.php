<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembacaController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class);
Route::get('deteluser/{id}', [UserController::class, 'destroy'])->name('deletuser');

Route::resource('kategori', KategoriController::class);
Route::get('detelkategori/{kategori}', [KategoriController::class, 'destroy'])->name('deletkategori');

Route::resource('buku', BukuController::class);
Route::get('deletbuku/{buku}', [BukuController::class, 'destroy'])->name('deletbuku');

Route::resource('pembaca', PembacaController::class);

Route::get('/', [BukuController::class, 'depan'])->name('/');

// sort berdasarkan kategori
Route::post('/sort', [BukuController::class, 'sort'])->name('sort');