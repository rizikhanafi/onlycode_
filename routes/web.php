<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\PusatController;

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
    return view('home');
});

Route::get('/login', function () {
    return view('loginroom');
});

Auth::routes();

Route::get('/dashboard', [PusatController::class, 'index'])->name('dashboard');
Route::get('/daftar', [DaftarController::class, 'daftar']);

//Pemasok Geng
Route::get('/pemasok', [SupplierController::class, 'supplier'])->name('pemasoks');
Route::get('/pemasok/tambah', [SupplierController::class, 'tambahsupplier']);
Route::post('/pemasok/tambah/insert', [SupplierController::class,'insert']);
Route::get('/pemasok/hapus/{id_supplier}', [SupplierController::class,'hapuss']);
Route::post('/pemasok/update/{id_supplier}', [SupplierController::class,'update']);
Route::get('/pemasok/ubah/{id_supplier}', [SupplierController::class,'ubah']);

//Penyimpanan Geng
Route::get('/barang', [BarangController::class, 'barang'])->name('barangs');
Route::get('/barang/tambah', [BarangController::class, 'tambahbarang']);
Route::post('/barang/tambahstok', [BarangController::class, 'tambahstok']);
Route::post('/barang/tambah/insert', [BarangController::class,'insert']);
Route::get('/barang/hapus/{id_barang}', [BarangController::class,'hapuss']);
Route::post('/barang/update/{id_barang}', [BarangController::class,'update']);
Route::get('/barang/ubah/{id_barang}', [BarangController::class,'ubah']);

//Pembeli Geng
Route::get('/pembeli', [PembeliController::class, 'pembeli'])->name('pembelis');
Route::get('/pembeli/tambah', [PembeliController::class, 'tambahpembeli']);
Route::post('/pembeli/tambah/insert', [PembeliController::class, 'insert']);
Route::get('/pembeli/hapus/{id_pembeli}', [PembeliController::class,'hapuss']);
Route::post('/pembeli/update/{id_pembeli}', [PembeliController::class,'update']);
Route::get('/pembeli/ubah/{id_pembeli}', [PembeliController::class,'ubah']);

//Pembayaran Geng
Route::get('/pembayaran', [PembayaranController::class, 'bayar'])->name('bayars');
Route::get('/pembayaran/tambah', [PembayaranController::class, 'tambahbayar']);
Route::post('/pembayaran/tambah/insert', [PembayaranController::class, 'insert']);
Route::get('/pembayaran/hapus/{id_bayar}', [PembayaranController::class,'hapuss']);

//Tentang
Route::get('/tentang', [TentangController::class, 'tentang'])->name('tengtangs');