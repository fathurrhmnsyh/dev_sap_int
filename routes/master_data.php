<?php

use Illuminate\Support\Facades\Route;

//STO INDEX
//DASHBOARD
Route::get('/mdt/index', 'MasterDataController@index')->name('mdt.index');
//REQUEST MASTER DATA
Route::get('/mdt/request', 'MasterDataController@req_mdt')->name('mdt.request');
Route::post('/mdt/get_request_index_datatables', 'MasterDataController@get_request_index_datatables')->name('mdt.get_request_index_datatables');
Route::get('/mdt/get_material_type', 'MasterDataController@get_material_type')->name('mdt.get_material_type');
Route::get('/mdt/get_division', 'MasterDataController@get_division')->name('mdt.get_division');
Route::get('/mdt/get_base_unit', 'MasterDataController@get_base_unit')->name('mdt.get_base_unit');
Route::get('/mdt/get_order_unit', 'MasterDataController@get_order_unit')->name('mdt.get_order_unit');
Route::get('/mdt/get_material_group', 'MasterDataController@get_material_group')->name('mdt.get_material_group');
Route::get('/mdt/get_purchasing_group', 'MasterDataController@get_purchasing_group')->name('mdt.get_purchasing_group');
//ITEM CODE BUILDER
Route::get('/mdt/mc_builder', 'MasterDataController@mc_builder')->name('mdt.mc_builder');
