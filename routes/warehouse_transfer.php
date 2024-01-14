<?php

use Illuminate\Support\Facades\Route;

//TRANSFER POSTING INDEX
//DASHBOARD
Route::get('/wtf/index', 'TransferController@index')->name('wtf.index');
//TRANSFER POSTING
Route::get('/wtf/tp_index', 'TransferController@tp_index')->name('wtf.tp_index');

Route::get('/validasi_param1', 'TransferController@validasi_param1')->name('validasi_param1');
Route::get('/validasi_param2', 'TransferController@validasi_param2')->name('validasi_param2');

Route::get('/validasi_data', 'TransferController@validasi_data1')->name('validasi_data1');
Route::get('/validasi_data3', 'TransferController@validasi_data3')->name('validasi_data3');
Route::get('/get_paramblob_image1', 'TransferController@get_paramblob_image1')->name('get_paramblob_image1');
Route::get('/validasi_data2', 'TransferController@validasi_data2')->name('validasi_data2');
Route::get('/validasi_data4', 'TransferController@validasi_data4')->name('validasi_data4');
Route::get('/get_paramblob_image2', 'TransferController@get_paramblob_image2')->name('get_paramblob_image2');
Route::post('/AddScanIn', 'TransferController@AddScanIn')->name('AddScanIn');
Route::get('/CheckScanIn', 'TransferController@CheckScanIn')->name('CheckScanIn');

//TRANSFER POSTING RAW MATERIAL
Route::get('/wtf/tp_rm', 'TransferController@tp_rm')->name('wtf.tp_rm');
Route::get('/validasi_param_rcm_1', 'TransferController@validasi_param_rcm_1')->name('validasi_param_rcm_1');

Route::get('/validasi_data_rcm_1', 'TransferController@validasi_data_rcm_1')->name('validasi_data_rcm_1');
Route::get('/validasi_data_rcm_3', 'TransferController@validasi_data_rcm_3')->name('validasi_data_rcm_3');

Route::get('/validasi_param_rcm_2', 'TransferController@validasi_param_rcm_2')->name('validasi_param_rcm_2');

Route::get('/validasi_data_rcm_2', 'TransferController@validasi_data_rcm_2')->name('validasi_data_rcm_2');
Route::get('/CheckScanRMC', 'TransferController@CheckScanRMC')->name('CheckScanRMC');
Route::post('/AddScanRMC', 'TransferController@AddScanRMC')->name('AddScanRMC');
