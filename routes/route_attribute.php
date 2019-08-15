<?php
Route::get('attribute','Home\AttributeController@index')->name('home.attribute.index');
Route::match(['get', 'post'],'attribute/update','Home\AttributeController@update')->name('home.attribute.update');
Route::post('attribute/delete','Home\AttributeController@delete')->name('home.attribute.delete');