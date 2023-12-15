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

//produk

Route::get('/produk', [ProdukController::class, 'produkview'])->middleware('auth')->name('daftarproduk');
Route::get('/produk/tambahproduk', [ProdukController::class, 'tambahprodukview'])->middleware('auth')->name('tambahproduk');
Route::post('/produk/tambahproduk', [ProdukController::class, 'tambahproduk'])->middleware('auth')->name('tambahpro');
Route::get('/produk/editproduk/{p}', [ProdukController::class, 'editprodukview'])->middleware('auth')->name('editproduk');
Route::put('/produk/updateproduk/{produkedit}', [ProdukController::class, 'updateproduk'])->middleware('auth')->name('updatepro');
Route::delete('/produk/hapusproduk/{p}', [ProdukController::class, 'hapusproduk'])->middleware('auth')->name('hapusproduk');

//order

//brand

Route::get('/brand', [BrandController::class, 'brandview'])->middleware('auth')->name('daftarbrand');
Route::get('/brand/tambahbrand', [BrandController::class, 'tambahbrandview'])->middleware('auth')->name('tambahbrand');
Route::post('/brand/tambahbrand', [BrandController::class, 'tambahbrand'])->middleware('auth')->name('tambahbrd');
Route::get('/brand/editbrand/{b}', [BrandController::class, 'editbrandview'])->middleware('auth')->name('editbrand');
Route::put('/brand/updatebrand/{brandedit}', [BrandController::class, 'updatebrand'])->middleware('auth')->name('updatebrd');
Route::delete('/brand/hapusbrand/{b}', [BrandController::class, 'hapusbrand'])->middleware('auth')->name('hapusbrand');

//category

// Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->middleware('auth')->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


