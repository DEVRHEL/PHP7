<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix'=>'admin','middleware'=>'auth'], function (){
    Route::group(['prefix'=>'cate'], function (){
        Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
        Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
        Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
        Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
    });
    Route::group(['prefix'=>'product'], function() {
        Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'ProductController@getAdd']);
        Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'ProductController@postAdd']);
        Route::get('list', ['as' => 'admin.product.getList', 'uses' => 'ProductController@getList']);
        Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
        Route::get('delimg/{id}', ['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
    });
    Route::group(['prefix'=>'user'], function() {
        Route::get('add', ['as' => 'admin.user.getAdd', 'uses' => 'UserController@getAdd']);
        Route::post('add', ['as' => 'admin.user.postAdd', 'uses' => 'UserController@postAdd']);
        Route::get('list', ['as' => 'admin.user.getList', 'uses' => 'UserController@getList']);
        Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
    });
});
Route::group(['prefix'=>'auth'], function (){
    Route::get('login',['as'=>'auth.getLogin','uses'=>'AuthController@getLogin']);
    Route::post('login',['as'=>'auth.postLogin','uses'=>'AuthController@postLogin']);
    Route::get('logout',['as'=>'auth.getLogout','uses'=>'AuthController@getLogout']);
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('type/{id}/{alias}',['as'=>'typecates', 'uses'=>'HomeController@getType']);
Route::get('detailproduct/{id}/{alias}',['as'=>'detail', 'uses'=>'HomeController@getDetail']);
Route::get('contact',['as'=>'getContact','uses'=>'HomeController@getContact']);
Route::post('contact',['as'=>'postContact','uses'=>'HomeController@postContact']);

