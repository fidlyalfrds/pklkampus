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

// Route::get('/', 'MasukController@index')->name('masuk');
// Route::post('/masuk','MasukController@masuk')->name('masuk');

// Route::get('/', function () {
//     return view('login.index');
// });
Route::get('/','MasukController@index')->name('masuk');
Route::post('/masuk','MasukController@masuk')->name('masuk');

Route::group(['middleware' => 'CheckLoginMiddleware'], function () {

//Route pembelian
Route::resource('pembelian','PembelianController');
Route::get('/editpembelian/{id}','PembelianController@edit')->name('editpembelian');
Route::get('/hapuspembelian/{id}','PembelianController@destroy')->name('hapuspembelian');
Route::get('export','PembelianController@export');

//Route Reseller
Route::resource('reseller','ResellerController');
Route::get('/editreseller/{id}','ResellerController@edit')->name('editreseller');
Route::get('/hapusreseller/{id}','ResellerController@destroy')->name('hapusreseller');
Route::get('exportreseller','ResellerController@export');


//Route Barang
Route::resource('barang','BarangController');
Route::get('/editbarang/{id}','BarangController@edit')->name('editbarang');
Route::post('/barang/hapus/{id}','BarangController@destroy')->name('barang.hapus');
Route::get('exportbarang','BarangController@export');

//Route Barang masuk
Route::resource('barangmasuk','BarangMasukController');
Route::get('/editbarangmasuk/{id}','BarangMasukController@edit')->name('editbarangmasuk');
Route::get('/hapusbarangmasuk/{id}','BarangMasukController@destroy')->name('hapusbarangkeluar');
Route::get('exportmasuk','BarangMasukController@export');

//Route Barang Keluar
Route::resource('barangkeluar','BarangKeluarController');
Route::get('/editbarangkeluar/{id}','BarangKeluarController@edit')->name('editbarangkeluar');
Route::get('/hapusbarangkeluar/{id}','BarangKeluarController@destroy')->name('hapusbarangkeluar');
Route::get('exportexcel','BarangKeluarController@export');

//Route PreOrder
Route::resource('preorder','PreorderController');
Route::get('/editpreorder/{id}','PreorderController@edit')->name('editpreorder');
Route::get('/hapuspreorder/{id}','PreorderController@destroy')->name('hapuspreorder');
Route::get('export-excel','PreorderController@export');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'MasukController@logout')->name('logout');

Route::get('dashboard','DashboardController@index')->name('dashboard');

});

// Masuk






















// });


// RouteLoginGagal
// Auth::routes();
// Route::get('index.php/login','LoginController@showLoginForm')->name('login2');
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
