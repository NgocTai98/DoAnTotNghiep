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
// use Illuminate\Routing\Route;

//frontend
Route::get('', 'frontend\HomeController@getIndex');
Route::get('customer/login', 'frontend\HomeController@getLogin');
Route::post('customer/login', 'frontend\HomeController@postLogin');
Route::get('customer/register', 'frontend\HomeController@getRegister');
Route::post('customer/register', 'frontend\HomeController@postRegister');
Route::get('contact', 'frontend\HomeController@getContact');
Route::get('about', 'frontend\HomeController@getAbout');
Route::post('sendmail', 'frontend\HomeController@sendMail');
Route::group(['prefix' => 'product'], function () {
    Route::get('', 'frontend\ProductController@getShop');
    Route::get('detail/{id}', 'frontend\ProductController@getDetail');
});
Route::group(['prefix' => 'cart'], function () {

    Route::get('add', 'frontend\CartController@getAddCart');
    Route::get('del-cart/{id}', 'frontend\CartController@getDelCart');
    Route::get('update-cart/{rowId}/{qty}', 'frontend\CartController@getUpdateCart');
    Route::get('', 'frontend\CartController@getCart');
    Route::get('checkout', 'frontend\CartController@getCheckout');
    Route::post('checkout', 'frontend\CartController@postCheckout');
    Route::get('complete/{id}', 'frontend\CartController@getComplete');
    Route::get('email', 'frontend\CartController@email');
});
Route::get('login', 'backend\LoginController@getLogin')->middleware('checkLogout');
Route::post('login', 'backend\LoginController@postLogin');
//backend
Route::group(['prefix' => 'admin', 'middleware'=>'checkLogin'], function () {
    Route::get('', 'backend\HomeController@getIndex');
    Route::get('logout', 'backend\LoginController@getLogout');

    Route::get('excel', 'backend\ExcelController@export');
    Route::get('adv', 'backend\AdvController@Adv');
    Route::post('adv', 'backend\AdvController@postAdv');

    

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'backend\ProductController@getListProduct');
        Route::get('add', 'backend\ProductController@getAddProduct');
        Route::post('add', 'backend\ProductController@postAddProduct');
        
        Route::group(['prefix' => 'edit'], function () {
            Route::get('/{id}', 'backend\ProductController@getEditProduct');
            Route::post('/{id}', 'backend\ProductController@postEditProduct');
            Route::get('/delete/{id}', 'backend\ProductController@delProduct');

            // Route::get('attr', 'backend\ProductController@getEditAttr');
            
        });
        Route::post('add-attr', 'backend\ProductController@postAddAttr');
        Route::get('detailAttr', 'backend\ProductController@getAttr');
        Route::get('edit-attr/{id}', 'backend\ProductController@getEditAttr');
        Route::post('edit-attr/{id}', 'backend\ProductController@postEditAttr');
        Route::get('del-attr/{id}', 'backend\ProductController@getDelAttr');

        Route::post('add-value', 'backend\ProductController@postAddValue');
        Route::get('edit-value/{id}', 'backend\ProductController@getEditValueAttr');
        Route::post('edit-value/{id}', 'backend\ProductController@postEditValueAttr');
        Route::get('del-value/{id}', 'backend\ProductController@getDelValueAttr');

        Route::get('editvariant/{id}', 'backend\ProductController@getEditVariant');
        Route::post('editvariant/{id}', 'backend\ProductController@postEditVariant');
        Route::get('addvariant/{id}', 'backend\ProductController@getAddVariant');
        Route::post('addvariant/{id}', 'backend\ProductController@postAddVariant');
        Route::get('delvariant/{id}', 'backend\ProductController@getDelVariant');

    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getListCategory');
        Route::post('', 'backend\CategoryController@postAddCategory');
        Route::get('edit/{idCate}', 'backend\CategoryController@getEditCategory');
        Route::post('edit/{idCate}', 'backend\CategoryController@postEditCategory');
        Route::get('del/{idCate}', 'backend\CategoryController@delCategory');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'backend\OrderController@getOrder');
        Route::get('detail/{id}', 'backend\OrderController@getDetailOrder');
        Route::get('delete/{id}', 'backend\OrderController@getDeleteOrder');
        Route::get('active/{id}', 'backend\OrderController@activeOrder');
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
        Route::get('edit/{idUser}', 'backend\UserController@getEditUser');
        Route::post('edit/{idUser}', 'backend\UserController@postEditUser');
        Route::get('del/{idUser}', 'backend\UserController@delUser');
    });
});