<?php

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

//dashboard
Route::get('/','DashboardController@index');
//data pemasok
route::resource('datapemasok','PemasokController');
route::post('datapemasok','PemasokController@store');
route::patch('datapemasok','PemasokController@update');
route::delete('datapemasok','PemasokController@destroy');
//transaksi pembelian
route::resource('transaksi_pembelian','PembelianController');
// data barang
route::get('databarang','BarangController@index');
route::post('databarang','BarangController@store');
route::patch('databarang','BarangController@update');
route::delete('databarang','BarangController@destroy');
// data produk
route::get('dataproduk','ProdukController@index');
route::post('dataproduk','ProdukController@store');
route::patch('dataproduk','ProdukController@update');
route::delete('dataproduk','ProdukController@destroy');
//penarikan barang
route::get('penarikanbarang','PenarikanBarangController@index');
route::post('penarikanbarang','PenarikanBarangController@store');
route::patch('penarikanbarang','PenarikanBarangController@update');
route::delete('penarikanbarang','PenarikanBarangController@destroy');
Route::get('penarikanbarang/export/','PenarikanBarangController@export');
route::get('penarikanbarang/pdf/','ExportController@export_pdf');
route::get('pdf.penarikanbarang','ExportController@index');
Route::get('/penarikanbarang/updateStatus', 'PenarikanBarangController@updateStatus' ); 
// data pelanggan
route::get('datapelanggan','PelangganController@index');
route::post('datapelanggan','PelangganController@store');
route::patch('datapelanggan','PelangganController@update');
route::delete('datapelanggan','PelangganController@destroy');