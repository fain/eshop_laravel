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
Route::post('auth/login_handler', 'Front@login_handler');
Route::get('auth/logout', 'Front@logout');
Route::get('auth/register', 'Front@register');
Route::post('auth/register_handler', 'Front@register_handler');

// Registration routes...
Route::post('/register', 'Front@register');

Route::get('/','Front@index');

// Products/Shop
Route::get('/products/{id}','Front@products');
// 
// cart
Route::post('/cart', 'Front@cart');
//
Route::get('/products/details/{id}','Front@product_details');
Route::get('/products/categories','Front@product_categories');
Route::get('/products/brands','Front@product_brands');


//Add to wishlists
Route::post('/wishlist','ApiController@wishlist');


Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::get('/logout','Front@logout');

Route::get('/checkout', [
    'middleware' => 'auth',
    'uses' => 'Front@checkout'
]);

Route::get('/search/{query}','Front@search');


Route::get('/backend/login','Back@login');
Route::get('/backend/logout','Back@logout');
Route::post('backend/login_handler', 'Back@login_handler');
Route::get('/backend/register','Back@register');
Route::get('/backend/home','Back@home');

Route::post('/backend/register_seller','Back@register_seller');

/*******************************ajax dropdown start*********************************/
Route::get('/api/category-dropdown/{id}', 'ApiController@categoryDropDownData');
Route::get('/api/brand-dropdown/{id}', 'ApiController@brandDropDownData');
Route::get('/api/prod-opt-grp-table/{id}', 'ApiController@prodOptGrpTable');

Route::get('/api/shipping_details/{id}', 'ApiController@shipping_details');
Route::get('/api/return_details/{id}', 'ApiController@return_details');

Route::get('/api/prod_opt_type/{id}', 'ApiController@prod_opt_type');

//ajax submit
Route::post('/api/new_shipping', 'ApiController@new_shipping');
Route::post('/api/new_return', 'ApiController@new_return');
//ajax delete
Route::get('/api/delete_merch_ship/{id}', 'ApiController@delete_merch_ship');
Route::get('/api/delete_merch_rtn/{id}', 'ApiController@delete_merch_rtn');
/*******************************ajax dropdown end*********************************/

/*******************************categories start*********************************/
Route::get('/backend/categories','Back@categories');
Route::get('/backend/categories/{category}','Back@categories_more');
Route::post('/backend/categories/update/{category}','Back@categories_update');
Route::get('/backend/new_categories','Back@new_cat');
Route::post('/backend/new_categories_handler','Back@new_cat_handler');
Route::get('/backend/delete_cat/{id}', 'Back@delete_cat');
/*******************************categories end*********************************/

/*******************************brand start*********************************/
Route::get('/backend/brand','Back@brand');
Route::get('/backend/new_brand','Back@new_brand');
Route::post('/backend/new_brand_handler','Back@new_brand_handler');
Route::get('/backend/edit_brand/{brand}','Back@edit_brand');
Route::post('/backend/edit_brand_handler','Back@edit_brand_handler');
Route::get('/backend/delete_brand/{id}', 'Back@delete_brand');
/*******************************brand end*********************************/

/*******************************prod listing start*********************************/
Route::get('/backend/product_listing','Back@product_listing');
Route::get('/backend/new_product','Back@new_product');
Route::post('/backend/product_listing_handler','Back@product_listing_handler');
Route::get('/backend/edit_product/{product}','Back@edit_product');
Route::get('/backend/delete_product/{id}', 'Back@delete_product');
Route::post('/backend/product_listing_handler_update','Back@product_listing_handler_update');
/*******************************prod listing end*********************************/

/*******************************prod opt mgmt start*********************************/
Route::get('/backend/prod_opt_mgmt','Back@prod_opt_mgmt');
Route::post('/backend/new_prod_opt','Back@new_prod_opt');
Route::post('/backend/edit_prod_opt','Back@edit_prod_opt');
Route::get('/backend/delete_prod_opt/{id}', 'Back@delete_prod_opt');

Route::post('/backend/new_prod_opt_grp','Back@new_prod_opt_grp');
Route::get('/backend/prod_opt_mgmt/{id}','Back@prod_opt_mgmt_edit');
Route::post('/backend/prod_opt_mgmt_update_handler','Back@prod_opt_mgmt_update_handler');
Route::get('/backend/delete_prod_grp/{id}', 'Back@delete_prod_grp');

Route::post('/backend/prod_opt_handler','Back@prod_opt_handler');
Route::get('/backend/delete_opt_from_grp/{g_id}/{id}', 'Back@delete_opt_from_grp');
/*******************************prod opt mgmt end*********************************/

Route::get('/backend/product_bulk_list','Back@product_bulk_list');
Route::post('/backend/product_bulk_list_upload','Back@product_bulk_list_upload');


// Auth::routes();

// Route::get('/home', 'HomeController@index');


//testing shop
