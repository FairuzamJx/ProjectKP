<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('/')->middleware('is_admin:superadmin,admin,user');
    //master barang
    Route::get('/master/index', [MasterController::class, 'index'])->name('/master/index')->middleware('is_admin:Superadmin,admin,user');
    Route::get('/master/tambah_barang', [MasterController::class, 'tambah_barang'])->middleware('is_admin:Superadmin,admin,user');
    Route::POST('/master/save_tbarang', [MasterController::class, 'save_tbarang'])->middleware('is_admin:Superadmin,admin,user');
    Route::get('/master/e_barang/{id}', [MasterController::class, 'e_barang'])->middleware('is_admin:Superadmin,admin,user');
    Route::POST('/master/save_ebarang/{id}', [MasterController::class, 'save_ebarang']);
    Route::get('/master/d_barang/{id}', [MasterController::class, 'd_barang']);
    //master jenis barang
    Route::get('/master/jbarang', [MasterController::class, 'jbarang'])->middleware('is_admin:Superadmin,admin,user');
    Route::post('/master/t_jbarang', [MasterController::class, 't_jbarang'])->middleware('is_admin:Superadmin,admin');
    Route::post('/master/e_jbarang/{id_produk}', [MasterController::class, 'e_jbarang'])->middleware('is_admin:Superadmin,admin');
    Route::get('/master/d_jbarang/{id_produk}', [MasterController::class, 'd_jbarang'])->middleware('is_admin:Superadmin,admin');
    // master satuan
    Route::get('/master/satuan', [MasterController::class, 'satuan']);
    Route::post('/master/t_satuan', [MasterController::class, 't_satuan']);
    Route::post('/master/e_satuan/{id_suplier}', [MasterController::class, 'e_satuan']);
    Route::get('/master/d_satuan/{id_suplier}', [MasterController::class, 'd_satuan']);

    // Transaksi barang masuk
    Route::get('/transaksi/b_masuk', [TransaksiController::class, 'b_masuk'])->middleware('is_admin:Superadmin,admin');
    Route::get('/transaksi/t_masuk', [TransaksiController::class, 't_masuk'])->middleware('is_admin:Superadmin,admin');
    Route::POST('/transaksi/save_bmasuk', [TransaksiController::class, 'save_bmasuk'])->middleware('is_admin:Superadmin,admin');
    Route::get('/transaksi/edit_barangmasuk/{id_masuk}', [TransaksiController::class, 'edit_barangmasuk'])->middleware('is_admin:Superadmin,admin');
    // Route::post('/transaksi/save_editbarangmasuk/{id_masuk}', [TransaksiController::class, 'save_editbarangmasuk']);
    // Route::get('/transaksi/delete_barangmasuk/{id_masuk}', [TransaksiController::class, 'delete_barangmasuk']);
    // Transaksi barang keluar
    Route::get('/transaksi/b_keluar', [TransaksiController::class, 'b_keluar'])->middleware('is_admin:Superadmin,admin');
    Route::get('/transaksi/tb_keluar', [TransaksiController::class, 'tb_keluar'])->middleware('is_admin:Superadmin,admin');
    Route::POST('/transaksi/save_tbkeluar', [TransaksiController::class, 'save_tbkeluar'])->middleware('is_admin:Superadmin,admin');

    //Laporan
    Route::get('/laporan/v_laporan', [LaporanController::class, 'v_laporan'])->name('/laporan/v_laporan');
    Route::post('/laporan/print', [LaporanController::class, 'print']);
    Route::get('/laporan/v_laporankeluar', [LaporanController::class, 'v_laporankeluar']);
    Route::post('/laporan/print_bkeluar', [LaporanController::class, 'print_bkeluar']);

    Route::get('/user/v_changepas', [LoginController::class, 'v_changepas']);
    Route::POST('/user/changePassword', [LoginController::class, 'changePassword']);
    Route::get('/user/delete/{id}', [LoginController::class, 'delete'])->middleware('is_admin');
    Route::get('/user/edit_user/{id}', [LoginController::class, 'edit_user'])->middleware('is_admin');
    Route::post('/user/save_edituser/{id}', [LoginController::class, 'save_edituser'])->middleware('is_admin');
    Route::get('/user/v_user', [LoginController::class, 'v_user'])->middleware('is_admin:superadmin');
    Route::get('/user/v_register', [LoginController::class, 'v_register'])->middleware('is_admin:superadmin');
    Route::get('/user/register', [LoginController::class, 'register'])->middleware('is_admin:superadmin');
});

//user
Route::post('/user/authenticate', [LoginController::class, 'authenticate']);
Route::POST('/user/logout', [LoginController::class, 'logout']);


// Rute untuk menandai satu notifikasi sebagai dibaca
Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');

// Rute untuk menghapus semua notifikasi
Route::get('/notifications/delete-all', [NotificationController::class, 'deleteAll'])->name('notifications.deleteAll');