<?php
Route::get('cart','Home\CartController@index')->name('home.cart.index');
Route::match(['get', 'post'],'cart/update','Home\CartController@update')->name('home.cart.update');
Route::post('cart/delete','Home\CartController@delete')->name('home.cart.delete');