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
//upload file



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



// Route::get('/admin', 'AdminController@loginAdmin');
// Route::POST('/admin', 'AdminController@postLoginAdmin');


// Route::get('/homeAdmin', [
//     'as' => 'homeAdmin',
//     'uses' => 'AdminController@loginSuccess'
// ]);
Route::get('/admin', [
    'as' => 'admin.show',
    'uses' => 'AdminController@showHomeAdmin',

])->middleware('role');


Route::get('/login', [
    'as' => 'login.admin',
    'uses' => 'AdminController@loginAdmin',

]);

Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'AdminController@logout',

]);




Route::POST('/login', [
    'as' => 'login.postAdmin',
    'uses' => 'AdminController@postLoginAdmin',

]);


//---------------------

Route::get('/register', [
    'as' => 'register',
    'uses' => 'AdminController@register'
]);


//----------------------------

Route::POST('/register', [
    'as' => 'register.postRegister',
    'uses' => 'AdminController@postRegister'
]);





Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
        ]);

        Route::POST('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);

        Route::POST('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
        ]);
    });
    //quanlysanpham
    Route::group(['prefix' => 'product'], function () {

        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
        ]);
        Route::POST('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit'
        ]);
        Route::POST('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
        ]);
    });
});
// frontend
// Route::get('/', 'HomeController@index');
Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('/home/user', [
    'as' => 'home.user',
    'uses' => 'HomeController@showUser',
]);



Route::get('/category/{name}/{id}', [
    'as' => 'category.product',
    'uses' => 'HomeController@showProductCategory'
]);

Route::get('/product/{name}/{id}', [
    'as' => 'product.detail',
    'uses' => 'HomeController@showProductDetail'
]);


Route::get('/product/add-to-cart/{id}', [
    'as' => 'product.addToCart',
    'uses' => 'HomeController@addToCart'
]);

Route::get('/product/showCart', [
    'as' => 'product.showCart',
    'uses' => 'HomeController@showCart'
]);
