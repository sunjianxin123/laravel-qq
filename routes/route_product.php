<?php
Route::get('product','Home\ProductController@index')->name('home.product.index');
Route::match(['get', 'post'],'product/update','Home\ProductController@update')->name('home.product.update');
Route::post('product/delete','Home\ProductController@delete')->name('home.product.delete');