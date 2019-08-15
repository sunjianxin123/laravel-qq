<?php
Route::get('activity_template','Home\ActivityTemplateController@index')->name('home.activity_template.index');
Route::match(['get', 'post'],'activity_template/update','Home\ActivityTemplateController@update')->name('home.activity_template.update');
Route::post('activity_template/delete','Home\ActivityTemplateController@delete')->name('home.activity_template.delete');