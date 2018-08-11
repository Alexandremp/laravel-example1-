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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload', function () {
    return view('upload');
});
Route::post('/store',"UploadImage@store");

        Route::match(['get','post'],'/admin','AdminController@login');
        Route::get('/admin/dashboard','AdminController@dashboard');
        Auth::routes();
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/logout','AdminController@logout');
        Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');


        Route::group(['middleware'=>['auth']],function(){
            //Routes for organizing the users
           Route::get('/admin/dashboard','AdminController@dashboard');
           Route::get('/admin/settings','AdminController@settings');
           Route::get('/admin/check-pwd','AdminController@chkPassword');
           Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

           // Routes for organizing the categories (Admin)
           Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
           Route::get('/admin/view-categories','CategoryController@viewCategories');
           Route::match(['get','post'], '/admin/edit-category/{id}','CategoryController@editCategory');
           Route::match(['get','post'], '/admin/delete-category/{id}','CategoryController@deleteCategory');

            //Routes for organizing products (Admin)
            Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
            Route::get('/admin/view-product','ProductsController@viewProducts');
            Route::match(['get','post'], '/admin/edit-product/{id}','ProductsController@editProduct');
            Route::match(['get','post'], '/admin/delete-product/{id}','ProductsController@deleteProduct');
        });
