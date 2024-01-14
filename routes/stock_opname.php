<?php

use Illuminate\Support\Facades\Route;

//STO INDEX
    //DASHBOARD
    Route::get('/sto/index', 'StoController@index')->name('sto.index');
    //MASTER ITEM
    Route::get('/sto/master_item', 'StoController@master_item')->name('sto.master_item');
    Route::post('/sto/get_datatables', 'StoController@get_datatables')->name('sto.get_datatables');
    //COUNT STOCK
    Route::get('/sto/count_index', 'StoController@count_index')->name('sto.count_index');
    Route::post('/sto/get_stock_datatables', 'StoController@get_stock_datatables')->name('sto.get_stock_datatables');
    //ADMIN SETTINGS
        //SLOC CUST
        Route::get('/sto/cust_sloc', 'StoController@cust_sloc')->name('sto.cust_sloc');
        Route::post('/sto/get_cust_sloc_datatables', 'StoController@get_cust_sloc_datatables')->name('sto.get_cust_sloc_datatables');
        //ASSIGN USER
        Route::get('/sto/assign_user_sto', 'StoController@assign_user_sto')->name('sto.assign_user_sto');
        Route::post('/sto/get_user_sloc_datatables', 'StoController@get_user_sloc_datatables')->name('sto.get_user_sloc_datatables');
