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

Route::middleware('auth')->group(function () {
    Route::resource('pembaca', PembacaController::class);

    Route::resource('buku', BukuController::class);
    Route::get('deletbuku/{buku}', [BukuController::class, 'destroy'])->name('deletbuku');

});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('user', UserController::class);
    Route::get('deteluser/{id}', [UserController::class, 'destroy'])->name('deletuser');

    Route::resource('kategori', KategoriController::class);
    Route::get('detelkategori/{kategori}', [KategoriController::class, 'destroy'])->name('deletkategori');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Untuk mengakses halaman depan
Route::get('/', [BukuController::class, 'depan'])->name('/');

// route untuk sort berdasarkan kategori & terbaca
Route::post('/sort', [BukuController::class, 'sort'])->name('sort');