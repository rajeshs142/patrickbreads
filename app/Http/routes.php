<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('category/{name}', 'CategoryPageController@showSlug')->where('name', '[A-Za-z0-9-]+');
Route::get('category/{id}', 'CategoryPageController@show');

Route::get('item/{name}', 'ProductPageController@showSlug')->where('name', '[A-Za-z0-9-]+');
Route::get('item/{id}', 'ProductPageController@show');

//admin panel
Route::get('/su', 'AdminController@index');

// Admin page - Category
Route::resource('/admin/category', 'CategoryController');

// Admin page - Stories
Route::resource('/admin/product', 'ProductController');

// Admin page - Users
Route::resource('/admin/users', 'UsersController');

// Admin page - Nav
Route::resource('/admin/nav', 'NavController');

// Admin page - Banner
Route::resource('/admin/banner', 'BannerController');

// search results page route
Route::get('/search', 'SearchController@index');

// contact
Route::get('/contact', 'ContactController@index');
Route::post('/contact/store', 'FooterController@store');
Route::post('/contact/sendmessage', 'ContactController@store');