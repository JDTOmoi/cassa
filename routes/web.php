<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TransactionController;

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

//Route::get('/', function () {
//   return view('welcome');
//})->name('welcome');
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Auth::routes();

//produk

Route::get('/produk', [ProdukController::class, 'produkview'])->middleware('auth')->name('daftarproduk');
Route::get('/produk/tambahproduk', [ProdukController::class, 'tambahprodukview'])->middleware('auth')->name('tambahproduk');
Route::post('/produk/tambahproduk', [ProdukController::class, 'tambahproduk'])->middleware('auth')->name('tambahpro');
Route::get('/produk/editproduk/{p}', [ProdukController::class, 'editprodukview'])->middleware('auth')->name('editproduk');
Route::put('/produk/updateproduk/{produkedit}', [ProdukController::class, 'updateproduk'])->middleware('auth')->name('updatepro');
Route::delete('/produk/hapusproduk/{p}', [ProdukController::class, 'hapusproduk'])->middleware('auth')->name('hapusproduk');

//category

Route::get('/category', [CategoryController::class, 'categoryview'])->middleware('auth')->name('daftarcategory');
Route::get('/category/tambahcategory', [CategoryController::class, 'tambahcategoryview'])->middleware('auth')->name('tambahcategory');
Route::post('/category/tambahcategory', [CategoryController::class, 'tambahcategory'])->middleware('auth')->name('tambahctg');
Route::get('/category/editcategory/{c}', [CategoryController::class, 'editcategoryview'])->middleware('auth')->name('editcategory');
Route::put('/category/updatecategory/{categoryedit}', [CategoryController::class, 'updatecategory'])->middleware('auth')->name('updatectg');
Route::delete('/category/hapuscategory/{c}', [CategoryController::class, 'hapuscategory'])->middleware('auth')->name('hapuscategory');

//brand

Route::get('/brand', [BrandController::class, 'brandview'])->middleware('auth')->name('daftarbrand');
Route::get('/brand/tambahbrand', [BrandController::class, 'tambahbrandview'])->middleware('auth')->name('tambahbrand');
Route::post('/brand/tambahbrand', [BrandController::class, 'tambahbrand'])->middleware('auth')->name('tambahbrd');
Route::get('/brand/editbrand/{b}', [BrandController::class, 'editbrandview'])->middleware('auth')->name('editbrand');
Route::put('/brand/updatebrand/{brandedit}', [BrandController::class, 'updatebrand'])->middleware('auth')->name('updatebrd');
Route::delete('/brand/hapusbrand/{b}', [BrandController::class, 'hapusbrand'])->middleware('auth')->name('hapusbrand');

//order

Route::get('/order', [OrderController::class, 'orderview'])->middleware('auth')->name('daftarorder');
Route::get('/order/tambahorder', [OrderController::class, 'tambahorderview'])->middleware('auth')->name('tambahorder');
Route::post('/order/tambahorder', [OrderController::class, 'tambahorder'])->middleware('auth')->name('tambahord');
Route::get('/order/editorder/{o}', [OrderController::class, 'editorderview'])->middleware('auth')->name('editorder');
Route::put('/order/updateorder/{orderedit}', [OrderController::class, 'updateorder'])->middleware('auth')->name('updateord');
Route::delete('/order/hapusorder/{o}', [OrderController::class, 'hapusorder'])->middleware('auth')->name('hapusorder');

//news
Route::get('/news',[NewsletterController::class,'index'])->middleware('auth')->name('berita');
Route::get('/news/{title}/{news2}',[NewsletterController::class,'show'])->middleware('auth')->name('showberita');
Route::get('/news/tambahberita',[NewsletterController::class,'create'])->middleware('auth')->name('tambahberita');
Route::post('/news/tambahberita',[NewsletterController::class,'store'])->middleware('auth')->name('addberita');
Route::get('/news/editberita/{news2}',[NewsletterController::class,'edit'])->middleware('auth')->name('editberita');
Route::put('/news/editberita/{news2}',[NewsletterController::class,'update'])->middleware('auth')->name('updateberita');
Route::delete('/news/hapusberita/{news2}',[NewsletterController::class,'destroy'])->middleware('auth')->name('hapusberita');

//transaction
Route::get('/transaction', [TransactionController::class, 'transactionview'])->middleware('auth')->name('kirimtransaksi');
Route::get('/transaction/tambahtransaction', [TransactionController::class, 'tambahtransactionview'])->middleware('auth')->name('tambahtransaction');
Route::post('/transaction/tambahtransaction', [TransactionController::class, 'tambahtransaction'])->middleware('auth')->name('tambahtss');
Route::get('/transaction/edittransaction/{t}', [TransactionController::class, 'edittransactionview'])->middleware('auth')->name('edittransaction');
Route::put('/transaction/updatetransaction/{transactionedit}', [TransactionController::class, 'updatetransaction'])->middleware('auth')->name('updatetss');
Route::delete('/transaction/hapustransaction/{t}', [TransactionController::class, 'hapustransaction'])->middleware('auth')->name('hapustransaction');

Route::get('/contact', function () {
   return view('contact', ['activeContact' => 'active']);
})->name('contact');

// Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->middleware('auth')->name('welcome');




