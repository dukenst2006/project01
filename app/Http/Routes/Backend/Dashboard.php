<?php

Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::resource('customer', 'CustomerController');