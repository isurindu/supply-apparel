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

Route::get('/', function () {
    return view('home');
});

Route::auth();
Route::get('logout', 'Auth\AuthController@getLogout');
Route::post('user/login','UserController@login');
Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');

Route::get('/home', 'HomeController@index');


//Homepage filters
Route::group(['prefix' => 'women','middleware' => 'web'], function () {
    Route::post('best-sellers','HomeController@best_sellers_women');
    Route::post('new-arrivals','HomeController@new_arrivals_women');
    Route::post('must-haves','HomeController@must_haves_women');
});


Route::resource('category','CategoryController');

//Seller
Route::get('create-boutique','ShopController@landing_page');

Route::get('become-seller','BecomeSellerController@index');
Route::post('become-seller','BecomeSellerController@store');

Route::get('my-shop/type','CreateShopController@shop_type');
Route::post('my-shop/type','CreateShopController@shop_type_store');

Route::get('my-shop/profile','CreateShopController@profile');
Route::post('my-shop/profile','CreateShopController@profile_store');

Route::get('my-shop/contact-details','CreateShopController@contact');
Route::post('my-shop/contact-details','CreateShopController@contact_store');

Route::get('membership/plans','MembershipPlansController@index');
Route::post('membership/plans/{plan}','MembershipPlansController@store');


// add product
Route::resource('seller/product','CreateProductController');

Route::group(['prefix' => 'seller','middleware' => 'web'], function () {
   
});

Route::post('favorites/{product}','FavoriteController@toggle');

