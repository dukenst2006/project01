<?php

Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
//Route::resource('customer', 'CustomerController');
//Route::get('customer.deactivated', 'CustomerController@deactivated')->name('admin.customer.deactivated');;
//Route::get('customer/deleted', 'CustomerController@deleted')->name('admin.customer.deleted');
////Route::post('customer.store', 'CustomerController@store');
//Route::get('customer.delete', 'CustomerController@delete')->name('admin.customer.delete-permanently');
//Route::get('customer.restore', 'CustomerController@restore')->name('admin.customer.restore');
//Route::get('customer.mark/{status}', 'CustomerController@mark')->name('admin.customer.mark')->where(['status' => '[0,1]']);

    Route::resource('customer', 'CustomerController');
    //Route::resource('search', 'QueryController');
    /**
     * Customer management
     */
    Route::get('customer/deactivated', 'CustomerController@deactivated')->name('admin.customer.deactivated');
    Route::get('customer/deleted', 'CustomerController@deleted')->name('admin.customer.deleted');
    Route::get('search', 'CustomerController@search')->name('admin.search');

    /**
     * Specific Customer
     */
    Route::group(['prefix' => 'customer/{id}', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('delete', 'CustomerController@delete')->name('admin.customer.delete-permanently');
        Route::get('profile', 'CustomerController@show')->name('admin.customer.profile');
        Route::get('restore', 'CustomerController@restore')->name('admin.customer.restore');
        Route::get('mark/{status}', 'CustomerController@mark')->name('admin.customer.mark')->where(['status' => '[0,1]']);
    });
Route::get('transaction/deposit', 'TransactionController@deposit');
Route::get('transaction/withdrawl', 'TransactionController@withdrawl');
Route::get('transaction/{id}/delete', 'TransactionController@delete');
Route::get('transaction/all', 'TransactionController@index')->name('admin.transaction.all');
