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
Auth::routes();
//dashboard
// route::group(['middleware'=>'auth'], function(){
Route::get('/','DashboardController@index');
//data pemasok
route::resource('datapemasok','PemasokController');
route::post('datapemasok','PemasokController@store');
route::patch('datapemasok','PemasokController@update');
route::delete('datapemasok','PemasokController@destroy');
//transaksi pembelian
route::get('transaksi_pembelian','PembelianController@index');
route::post('transaksi_pembelian','PembelianController@store');
route::patch('transaksi_pembelian','PembelianController@update');
route::delete('transaksi_pembelian','PembelianController@destroy');
// data barang
route::get('databarang','BarangController@index');
route::post('databarang','BarangController@store');
route::patch('databarang','BarangController@update');
route::delete('databarang','BarangController@destroy');
// data produk
route::get('dataproduk','ProdukController@index');
route::post('dataproduk','ProdukController@store');
route::put('dataproduk','ProdukController@update');
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
Route::get('/get-nama-barang', 'PenarikanBarangController@getNamaBarang')->name('getNamaBarang');
//pengajuan barang
route::get('pengajuan_barang','PengajuanBarangController@index');
route::post('pengajuan_barang','PengajuanBarangController@store');
route::put('pengajuan_barang','PengajuanBarangController@update');
route::delete('pengajuan_barang','PengajuanBarangController@destroy');
Route::get('pengajuan/export/xls','PengajuanBarangController@exportToExcel');
route::get('pengajuan_barang/cetak_pdf','PengajuanBarangController@exportToPdf');
route::get('pdf.pengajuan_barang','ExportController@index');
Route::get('changeStatus', 'PengajuanBarangController@changeStatus'); 
// data pelanggan
route::get('datapelanggan','PelangganController@index');
route::post('datapelanggan','PelangganController@store');
route::patch('datapelanggan','PelangganController@update');
route::delete('datapelanggan','PelangganController@destroy');
// });
//home grafik
route::get('data_penjualan/{lastcount}','DashboardController@data_penjualan');

