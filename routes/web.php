<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'Main@index');

// Authentication routes...
Route::get('auth/login', 'Front@login');
Route::post('auth/login', 'Front@authenticate');
Route::get('auth/logout', 'Front@logout');

// Registration routes...
Route::post('/register', 'Front@register');

Route::get('/','Front@index');
Route::get('/products','Front@products');
Route::get('/products/details/{id}','Front@product_details');
Route::get('/products/categories','Front@product_categories');
Route::get('/products/brands','Front@product_brands');
Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::get('/logout','Front@logout');
Route::get('/cart','Front@cart');

Route::get('/checkout', [
    'middleware' => 'auth',
    'uses' => 'Front@checkout'
]);

Route::get('/search/{query}','Front@search');

Route::post('/cart', 'Front@cart');

Route::get('/backend/login','Back@login');
Route::get('/backend/logout','Back@logout');
Route::post('backend/login_handler', 'Back@login_handler');
Route::get('/backend/register','Back@register');
Route::get('/backend/home','Back@home');

Route::post('/backend/register_seller','Back@register_seller');

Route::get('/backend/categories','Back@categories');
Route::get('/backend/categories/{category}','Back@categories_more');
Route::post('/backend/categories/update/{category}','Back@categories_update');

Route::get('/backend/product_listing','Back@product_listing');

//for dropdown
Route::get('api/category-dropdown/{id}', 'ApiController@categoryDropDownData');

// Auth::routes();

// Route::get('/home', 'HomeController@index');
