<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailTransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TentangAplikasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'home']);
Route::resource('karyawan', KaryawanController::class);
Route::resource('category', CategoryController::class);
Route::resource('jenis', JenisController::class);
Route::resource('menu', MenuController::class);
Route::resource('stok', StokController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('meja', MejaController::class);
Route::resource('pemesanan', PemesananController::class);
Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
Route::resource('transaksi', TransaksiController::class);

Route::get('export/karyawan', [KaryawanController::class, 'exportData'])->name('sapir');
Route::get('generate/karyawan', [KaryawanController::class, 'generatepdf'])->name('merman');
Route::get('export/category', [CategoryController::class, 'exportData'])->name('A');
Route::get('generate/category', [CategoryController::class, 'generatepdf'])->name('B');
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('C');
Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('D');
Route::get('export/menu', [MenuController::class, 'exportData'])->name('koko');
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('kiki');
Route::get('export/stok', [StokController::class, 'exportData'])->name('mochi');
Route::get('generate/stok', [StokController::class, 'generatepdf'])->name('dango');
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('caleb');
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('xavier');
Route::get('export/meja', [MejaController::class, 'exportData'])->name('gojo');
Route::get('generate/meja', [MejaController::class, 'generatepdf'])->name('wiro');

Route::post('category/import',[CategoryController::class, 'importData'])->name('import-category');
Route::post('menu/import',[MenuController::class, 'importData'])->name('import-menu');
Route::post('jenis/import',[JenisController::class, 'importData'])->name('import-jenis');
Route::post('stok/import',[StokController::class, 'importData'])->name('import-stok');
Route::post('pelanggan/import',[PelangganController::class, 'importData'])->name('import-pelanggan');
Route::post('meja/import',[MejaController::class, 'importData'])->name('import-meja');
Route::post('karyawan/import',[KaryawanController::class, 'importData'])->name('import-karyawan');

// tentang aplikasi
Route::resource('tentang', TentangAplikasiController::class);

// Titipan Produk
Route::resource('produk', ProdukTitipanController::class);
Route::get('export/produk', [ProdukTitipanController::class, 'exportData'])->name('X');
Route::get('generate/produk', [ProdukTitipanController::class, 'generatepdf'])->name('xoxo');
Route::post('produk/import',[ProdukTitipanController::class, 'importData'])->name('import-produk');
Route::post('/produk/store', [ProdukTitipanController::class, 'store'])->name('produk.store');

//route login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// // route untuk yang sudah login
// Route::group(['middleware' => 'auth'], function(){
//     Route::resource('/karyawan', KaryawanController::class);
//     Route::resource('/category', CategoryController::class);
//     Route::resource('/produk', ProdukTitipanController::class);

// //route untuk admin
// Route::group(['middleware' => ['cekUserLogin:1']], function(){
//     Route::resource('/jenis', JenisController::class);
//     Route::resource('/menu', MenuController::class);
//     Route::resource('/stok', StokController::class);
//     Route::resource('/pelanggan', PelangganController::class);
//     Route::resource('/meja', MejaController::class);
// });

// //route untuk kasir
// Route::group(['middleware' => ['cekUserLogin:2']], function(){
//     Route::resource('/pemesanan', PemesananController::class);
// });

// });

