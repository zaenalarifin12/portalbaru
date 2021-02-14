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

Route::group(["middleware" => ["auth"]], function(){
    Route::get('/',                 "DashboardController@index" );
    Route::get('/informasi-latest', "DashboardController@informasi" );    
    
    // pemesanan kebutuhan
    Route::get('/pemesanan-kebutuhan',                  "PemesananKebutuhanController@index");
    Route::post('/pemesanan-kebutuhan/{id}/cart',       "PemesananKebutuhanController@cart");

    Route::get('/pesanan-saya',                         "PesananSayaController@index");
    Route::get('/pesanan-saya/{id}',                    "PesananSayaController@edit");
    Route::put('/pesanan-struck/{id}',                  "PesananSayaController@update");
    Route::get('/pesanan-saya-sukses/{id}',                  "PesananSayaController@sukses");

    Route::post('/checkout',                            "PesananSayaController@checkout");

    Route::get('/semua-pesanan',                        "SemuaPesananController@index");
    Route::get('/semua-pesanan/{id}',                        "SemuaPesananController@show");
    Route::put('/semua-pesanan/{id}',                        "SemuaPesananController@update");
    

    Route::get('/daftar-penjualan',             "DaftarPenjualanController@index");
    Route::get('/daftar-penjualan/create',      "DaftarPenjualanController@create");
    Route::post('/daftar-penjualan',            "DaftarPenjualanController@store");
    Route::get('/daftar-penjualan/{id}/edit',   "DaftarPenjualanController@edit");
    Route::put('/daftar-penjualan/{id}',        "DaftarPenjualanController@update");
    Route::delete('/daftar-penjualan/{id}',     "DaftarPenjualanController@destroy");

    Route::get('/hasil-penjualan/{id}',                 "HasilPenjualanController@index");
    Route::post('/hasil-penjualan/{id}',                "HasilPenjualanController@store");

    Route::get('/semua-penjualan',                      "SemuaPenjualanController@index");
    Route::get('/semua-penjualan/{id}',                 "SemuaPenjualanController@show");
    // Route::put('/semua-pesanan/{id}',                "SemuaPesananController@update");

    Route::get('/riwayat-penjualan',                    "RiwayatPenjualanController@index");
    Route::get('/riwayat-penjualan/{id}',                    "RiwayatPenjualanController@show");

    Route::resource('/informasi',                       "InformasiController" );
    Route::resource('/product',                         "ProductController" );
    Route::resource('/greate',                          "GreatController" );
    Route::resource('/user',                            "UserController" );
    Route::resource('/data-petani',                     "DataPetaniController" );

    Route::get("/pengaturan",                           "PengaturanController@index");
    Route::get("/pengaturan/edit",                      "PengaturanController@edit");
    Route::put("/pengaturan",                           "PengaturanController@update");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
