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

Route::get('/','DashboardController@index');
route::resource('datapemasok','PemasokController');
route::post('datapemasok','PemasokController@store');
route::patch('datapemasok','PemasokController@update');
route::delete('datapemasok','PemasokController@destroy');
route::resource('databarang','BarangController');
route::resource('transaksi_pembelian','PembelianController');

route::get('penarikanbarang','PenarikanBarangController@index');
route::post('penarikanbarang','PenarikanBarangController@store');
route::patch('penarikanbarang','PenarikanBarangController@update');
route::delete('penarikanbarang','PenarikanBarangController@destroy');
Route::get('penarikanbarang/export/','PenarikanBarangController@export');
route::get('penarikanbarang/pdf/','ExportController@export_pdf');
route::get('penarikanbarang/pdf/','ExportController@index');
Route::get('penarikanbarang/updateStatus', 'PenarikanBarangController@updateStatus' ); 