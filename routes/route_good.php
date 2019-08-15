<?php
Route::get('good','Home\GoodController@index')->name('home.good.index');
Route::match(['get', 'post'],'good/update','Home\GoodController@update')->name('home.good.update');
Route::post('good/delete','Home\GoodController@delete')->name('home.good.delete');