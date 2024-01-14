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



Route::get('home', function () {
    return view('pages.index');
});
//auth
Route::get('/auth', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

// admin role
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {





    Route::get('/', 'DashboardController@index');

    //new layout

    Route::get('/asik', function () {
        return view('layouts/template');
    });

    //User

    Route::get('/employee', 'EmployeeController@index');
    Route::get('/employee/getdept/{id}', 'EmployeeController@getdept');
    Route::get('/employee/getsection/{id}', 'EmployeeController@getsection');
    Route::post('/employee/store', 'EmployeeController@store');
    Route::get('/employee/delete/{id}', 'EmployeeController@delete');

    //user login
    Route::get('/userlog', 'AuthController@data');
    Route::post('/userlog/create', 'AuthController@create');
    Route::get('/userlog/getname', 'AuthController@getname');
    Route::get('/userlog/delete/{id}', 'AuthController@delete');

    //TRANSAKSI BARANG MASUK
    Route::get('/transaksi_barang_masuk', 'StokController@index')->name('transaksi_barang_masuk');
    Route::post('/transaksi_barang_masuk/get_datatables', 'StokController@getdatatables')->name('transaksi_barang_masuk.getdatatables');
    Route::get('/transaksi_barang_masuk/auto_trans_masuk', 'StokController@auto_num_masuk')->name('transaksi_barang_masuk.auto_trans_masuk');
    Route::get('/transaksi_barang_masuk/get_data_barang', 'StokController@get_data_barang')->name('transaksi_barang_masuk.get_data_barang');
    Route::post('/transaksi_barang_masuk/store_data_barang', 'StokController@store_data_barang')->name('transaksi_barang_masuk.store_data_barang');




    @include('stock_opname.php');
    @include('master_data.php');
    @include('warehouse_transfer.php');
});

//user role
Route::group(['middleware' => ['auth', 'ceklevel:user,admin']], function () {

    Route::get('/user_dash', 'DashboardController@user_index');

    Route::get('/transaksi_barang_keluar', 'StokController@user_index')->name('transaksi_barang_keluar');
    Route::get('/transaksi_barang_keluar/auto_number_perm', 'StokController@auto_number_perm')->name('transaksi_barang_keluar.auto_number_perm');
    Route::get('/transaksi_barang_keluar/get_data_barang', 'StokController@get_data_barang')->name('transaksi_barang_keluar.get_data_barang1');
    Route::post('/transaksi_barang_keluar/store_data_barang', 'StokController@store_data_barang_keluar')->name('transaksi_barang_keluar.store_data_barang');
    Route::post('/transaksi_barang_keluar/get_datatables', 'StokController@getdatatables_perm')->name('transaksi_barang_keluar.getdatatables');
    Route::get('/transaksi_barang_keluar/{id}/show_view_detail', 'StokController@show_view_detail_keluar')->name('transaksi_barang_keluar.show_view_detail');
    Route::post('/transaksi_barang_keluar/posted_perm/{id}', 'StokController@posted_perm')->name('transaksi_barang_keluar.posted_perm');
    Route::get('/transaksi_ambil_barang', 'StokController@ambil_barang_dash')->name('transaksi_ambil_barang');
    Route::get('/transaksi_ambil_barang/searchEmp', 'StokController@search_emp')->name('transaksi_ambil_barang/searchEmp');
    Route::post('/transaksi_ambil_barang/store_data', 'StokController@ambil_barang_store')->name('transaksi_ambil_barang/store_data');
    Route::post('/transaksi_ambil_barang/get_datatables', 'StokController@ambil_barang_getdatatables')->name('transaksi_ambil_barang.get_datatables');
    Route::get('/transaksi_ambil_barang/auto_trans_keluar', 'StokController@auto_num_keluar')->name('transaksi_ambil_barang.auto_trans_keluar');
});
