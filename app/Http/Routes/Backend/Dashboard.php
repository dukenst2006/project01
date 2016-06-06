<?php

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');


    Route::resource('customer', 'CustomerController');

    Route::get('customer/deactivated', 'CustomerController@deactivated')->name('admin.customer.deactivated');
    Route::get('customer/deleted', 'CustomerController@deleted')->name('admin.customer.deleted');
    Route::get('search', 'CustomerController@search')->name('admin.search');
    Route::get('settings', 'SettingsController@edit')->name('admin.settings');
    Route::patch('settings', 'SettingsController@update')->name('admin.settings.update');
    Route::post('converter', 'SettingsController@convert')->name('admin.converter');


    /**
     * Specific Customer
     */
    Route::group(['prefix' => 'customer/{id}', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('delete', 'CustomerController@delete')->name('admin.customer.delete-permanently');
        Route::get('profile', 'CustomerController@show')->name('admin.customer.profile');
        Route::get('restore', 'CustomerController@restore')->name('admin.customer.restore');
        Route::get('mark/{status}', 'CustomerController@mark')->name('admin.customer.mark')->where(['status' => '[0,1]']);
    });

    Route::delete('transaction/{id}/delete', 'TransactionController@destroy')->name('admin.transaction.delete');
    Route::post('transaction.store', 'TransactionController@store')->name('admin.transaction.store');
    Route::post('transaction.withdrawl', 'TransactionController@withdrawl')->name('admin.transaction.withdrawl');
    Route::post('transaction.transfert', 'TransactionController@transfert')->name('admin.transaction.transfert');
    Route::get('transaction/all', 'TransactionController@index')->name('admin.transaction.all');
    //Back Up
    Route::get('backup', function () {
        Artisan::call('backup:run', [
            '--only-db' => true,
        ]);
        //return redirect('admin/dashboard')->withFlashSuccess(trans('alerts.backend.backup.success'));
        });

