<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('qqlogin','TestController@qqlogin');//登录
Route::get('send','TestController@send');//登录
Route::get('testEvent','TestController@testEvent');//laravel 事件与监听者
Route::get('linkObserver','TestController@linkObserver');//测试观察者
Route::get('queue','TestController@queue');//测试队列
Route::get('back','TestController@back');//
Route::get('test','TestController@test');//
Route::any('getData','TestController@getData')->name('getData');//
Route::get('testCurlGet','TestController@testCurlGet');//
Route::get('testCurlPost','TestController@testCurlPost');//

Route::get('pay','PayController@pay');//支付宝付款
Route::get('returnUrl','PayController@returnUrl');//支付宝同步通知
Route::get('refund','PayController@refund');//支付宝退款
Route::get('refundQuery','PayController@refundQuery');//支付宝退款查询


Route::any('curl/info','CurlController@info');//
Route::get('m','MController@index');
Route::get('m/S','MController@S');
Route::get('m/D','MController@D');
Route::get('m/getM','MController@getM');

Route::resource('r','RController');
Route::any('r','RController@index')->name('r_index');

//测试
Route::get('test1','TestController@test1');//登录
Route::get('test2','TestController@test2');//登录
Route::get('test3','TestController@test3');//登录

// elasticsearch 全文检索
Route::get('esInit','EsController@index');//es



//vue路由
require 'vue.php';

Route::get('good','Home\GoodController@index')->name('home.good.index');
Route::match(['get', 'post'],'good/update','Home\GoodController@update')->name('home.good.update');
Route::post('good/delete','Home\GoodController@delete')->name('home.good.delete');

Route::get('attribute','Home\AttributeController@index')->name('home.attribute.index');
Route::match(['get', 'post'],'attribute/update','Home\AttributeController@update')->name('home.attribute.update');
Route::post('attribute/delete','Home\AttributeController@delete')->name('home.attribute.delete');

Route::get('cart','Home\CartController@index')->name('home.cart.index');
Route::match(['get', 'post'],'cart/update','Home\CartController@update')->name('home.cart.update');
Route::post('cart/delete','Home\CartController@delete')->name('home.cart.delete');

Route::get('activity_template','Home\ActivityTemplateController@index')->name('home.activity_template.index');
Route::match(['get', 'post'],'activity_template/update','Home\ActivityTemplateController@update')->name('home.activity_template.update');
Route::post('activity_template/delete','Home\ActivityTemplateController@delete')->name('home.activity_template.delete');
//
Route::get('activity','Home\ActivityController@index')->name('home.activity.index');
Route::match(['get', 'post'],'activity/update','Home\ActivityController@update')->name('home.activity.update');
Route::post('activity/delete','Home\ActivityController@delete')->name('home.activity.delete');


Route::get('product','Home\ProductController@index')->name('home.product.index');
Route::match(['get', 'post'],'product/update','Home\ProductController@update')->name('home.product.update');
Route::post('product/delete','Home\ProductController@delete')->name('home.product.delete');
// SPA 应用

Route::any('/', function () {
    return view('layout.master');
});



