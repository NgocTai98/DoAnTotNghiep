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
use Illuminate\Routing\RouteGroup;

//frontend
Route::get('', 'frontend\HomeController@getIndex');
Route::get('contact', 'frontend\HomeController@getContact');
Route::get('about', 'frontend\HomeController@getAbout');
Route::group(['prefix' => 'product'], function () {
    Route::get('', 'frontend\ProductController@getShop');
    Route::get('detail', 'frontend\ProductController@getDetail');
});
Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'frontend\CartController@getCart');
    Route::get('checkout', 'frontend\CartController@getCheckout');
    Route::get('complete', 'frontend\CartController@getComplete');
});
Route::get('login', 'backend\LoginController@getLogin')->middleware('checkLogout');
Route::post('login', 'backend\LoginController@postLogin');
//backend
Route::group(['prefix' => 'admin', 'middleware'=>'checkLogin'], function () {
    Route::get('', 'backend\HomeController@getIndex');
    Route::get('logout', 'backend\LoginController@getLogout');
    

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'backend\ProductController@getListProduct');
        Route::get('add', 'backend\ProductController@getAddProduct');
        Route::post('add', 'backend\ProductController@postAddProduct');
        
        Route::group(['prefix' => 'edit'], function () {
            Route::get('', 'backend\ProductController@getEditProduct');
            Route::post('', 'backend\ProductController@postEditProduct');

            Route::get('attr', 'backend\ProductController@getEditAttr');
            Route::get('value', 'backend\ProductController@getEditValueAttr');

            Route::get('editvariant', 'backend\ProductController@getEditVariant');
            Route::get('addvariant', 'backend\ProductController@getAddVariant');
        });

    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getListCategory');
        Route::get('add', 'backend\CategoryController@getAddCategory');
        Route::get('edit', 'backend\CategoryController@getEditCategory');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'backend\OrderController@getOrder');
        Route::get('detail', 'backend\OrderController@getDetailOrder');
        Route::get('processed', 'backend\OrderController@getOrderProcessed');
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('', 'backend\CommentController@getComment');
        Route::get('edit', 'backend\CommentController@getEditComment');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'backend\UserController@getListUser');
        Route::get('add', 'backend\UserController@getAddUser');
        Route::post('add', 'backend\UserController@postAddUser');
        Route::get('edit', 'backend\UserController@getEditUser');
        Route::post('edit', 'backend\UserController@postEditUser');
    });
});