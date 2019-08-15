<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/25
 * Time: 9:13
 */

Route::group(['prefix' => 'admin'],function(){
    Route::any('/','VueController@index')->name('admin_index');
    Route::any('show','VueController@show');
    Route::any('upload','VueController@upload')->name('admin_upload');
    Route::any('login','LoginController@index')->name('admin_login');
    Route::any('logout','LoginController@logout')->name('admin_logout');

    //用户管理
    Route::get('user','UserController@index')->name('admin_user_index');
    Route::any('user/add','UserController@add')->name('admin_user_add');
    Route::post('user/del','UserController@del')->name('admin_user_del');
    Route::get('user/check','UserController@check')->name('admin_user_check');
    //权限管理
    Route::get('action','ActionController@index')->name('admin_action_index');
    Route::any('action/add','ActionController@add')->name('admin_action_add');
    Route::any('action/change','ActionController@change')->name('admin_action_change');
    //角色管理
    Route::get('role','RoleController@index')->name('admin_role_index');
    Route::any('role/add','RoleController@add')->name('admin_role_add');
    Route::post('role/del','RoleController@del')->name('admin_role_del');
    //商品管理

});