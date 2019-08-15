<?php
Route::get('activity','Home\ActivityController@index')->name('home.activity.index');
Route::match(['get', 'post'],'activity/update','Home\ActivityController@update')->name('home.activity.update');
Route::post('activity/delete','Home\ActivityController@delete')->name('home.activity.delete');