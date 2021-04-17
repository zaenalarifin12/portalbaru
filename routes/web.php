<?php

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

Route::group(["middleware" => ["auth:web,admin"]], function(){
    Route::get('/',                 "DashboardController@index" );
    Route::get('/informasi-latest', "DashboardController@informasi" );    
    
    // pemesanan kebutuhan
    Route::get('/pemesanan-kebutuhan',                  "PemesananKebutuhanController@index");
    Route::post('/pemesanan-kebutuhan/{id}/cart',       "PemesananKebutuhanController@cart");

    Route::get('/pesanan-saya',                         "PesananSayaController@index");
    Route::delete('/pesanan-saya/{id}',                    "PesananSayaController@destroy");
    Route::get('/pesanan-saya/{id}',                    "PesananSayaController@edit");
    Route::put('/pesanan-struck/{id}',                  "PesananSayaController@update");
    Route::get('/pesanan-saya-sukses/{id}',             "PesananSayaController@sukses");

    Route::post('/checkout',                            "PesananSayaController@checkout");

    Route::get('/semua-pesanan',                        "SemuaPesananController@index");
    Route::get('/semua-pesanan/{id}',                   "SemuaPesananController@show");
    Route::put('/semua-pesanan/{id}',                   "SemuaPesananController@update");
    Route::put('/semua-pesanan/{id}/dikirim',           "SemuaPesananController@dikirim");
    Route::put('/semua-pesanan/{id}/salah',           "SemuaPesananController@salah");
    

    Route::get('/daftar-penjualan',                     "DaftarPenjualanController@index");
    Route::get('/daftar-penjualan/create',              "DaftarPenjualanController@create");
    Route::get('/daftar-penjualan/cetak',              "DaftarPenjualanController@cetak");
    Route::post('/daftar-penjualan',                    "DaftarPenjualanController@store");
    Route::get('/daftar-penjualan/{id}/edit',           "DaftarPenjualanController@edit");
    Route::put('/daftar-penjualan/{id}',                "DaftarPenjualanController@update");
    Route::delete('/daftar-penjualan/{id}',             "DaftarPenjualanController@destroy");

    Route::get('/hasil-penjualan/{id}',                 "HasilPenjualanController@index");
    Route::post('/hasil-penjualan/{id}',                "HasilPenjualanController@store");

    Route::get('/semua-penjualan',                      "SemuaPenjualanController@index");
    Route::get('/semua-penjualan/{id}',                 "SemuaPenjualanController@show");
    // Route::put('/semua-pesanan/{id}',                "SemuaPesananController@update");

    Route::get('/semua-penjualan/{id}/konfirmasi',      "SemuaPenjualanController@showKonfirmasi");
    Route::put('/semua-penjualan/{id}/konfirmasi/text',         "SemuaPenjualanController@updateKonfirmasiText");
    Route::put('/semua-penjualan/{id}/konfirmasi/gambar',      "SemuaPenjualanController@updateKonfirmasiGambar");

    Route::get('/riwayat-penjualan',                    "RiwayatPenjualanController@index");
    Route::get('/riwayat-penjualan/cetak',              "RiwayatPenjualanController@cetak");
    Route::get('/riwayat-penjualan/{id}',               "RiwayatPenjualanController@show");

    Route::resource('/informasi',                       "InformasiController" );
    Route::resource('/product',                         "ProductController" );
    Route::resource('/greate',                          "GreatController" );
    Route::resource('/user',                            "UserController" );
    Route::get('/data-petani',                          "DataPetaniController@index" );
    Route::get('/data-petani/cetak',                    "DataPetaniController@cetak" );

    Route::get("/laporan",                              "LaporanController@index");
    Route::get("/laporan/pemasukan",                    "LaporanController@pemasukan");
    Route::get("/laporan/pemasukan/cetak",              "LaporanController@cetak_pemasukan");
    Route::get("/laporan/pengeluaran",                  "LaporanController@pengeluaran");
    Route::get("/laporan/pengeluaran/cetak",            "LaporanController@cetak_pengeluaran");

    Route::get("/pengaturan",                           "PengaturanController@index");
    Route::get("/pengaturan/edit",                      "PengaturanController@edit");
    Route::put("/pengaturan",                           "PengaturanController@update");
    
    Route::get("/ganti-password",                      "GantiPasswordController@edit");
    Route::put("/ganti-password",                       "GantiPasswordController@update");


    Route::get("/pengaturan/admin",                           "PengaturanAdminController@index");
    Route::get("/pengaturan/admin/edit",                      "PengaturanAdminController@edit");
    Route::put("/pengaturan/admin",                           "PengaturanAdminController@update");
});

Auth::routes();

Route::get('/login-admin', 'Auth\LoginController@loginAdmin');
Route::post('/login-admin', 'Auth\LoginController@storeLoginAdmin');

Route::get('/home', function(){
    return redirect("/");
})->name('home');
