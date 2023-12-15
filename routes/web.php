<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Auth::routes();

Route::get('/produk', [ProdukController::class, 'produkview'])->middleware('auth')->name('daftarproduk');
Route::get('/produk/tambahproduk', [ProdukController::class, 'tambahprodukview'])->middleware('auth')->name('tambahproduk');
Route::post('/produk/tambahproduk', [ProdukController::class, 'tambahproduk'])->middleware('auth')->name('tambahpro');
Route::get('/produk/editproduk/{p}', [ProdukController::class, 'editprodukview'])->middleware('auth')->name('editproduk');
Route::put('/produk/updateproduk/{produkedit}', [ProdukController::class, 'updateproduk'])->middleware('auth')->name('updatepro');
Route::delete('/produk/hapusproduk/{p}', [ProdukController::class, 'hapusproduk'])->middleware('auth')->name('hapusproduk');

// Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->middleware('auth')->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


