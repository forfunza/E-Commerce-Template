<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::group(
array(
    'prefix' => 'backend',
    'before' => 'auth.sentry'
),
function()
{
    Route::resource('dashboards', 'DashboardsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('services', 'ServicesController');
    Route::resource('products', 'ProductsController');
 
});


Route::group(
array(
    'prefix' => 'backend',
),
function()
{
    Route::get('/', 'AuthController@index');
    Route::get('/create', 'AuthController@create');
    Route::post('/auth', 'AuthController@authenticate');
    Route::get('/logout', 'AuthController@logout');
});



Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@login');
Route::get('/aboutus', 'HomeController@aboutus');
Route::get('/knowledge', 'HomeController@knowledge');
Route::get('/knowledge/{id}', 'HomeController@knowledge_detail');
Route::get('/celebrity', 'HomeController@celebrity');
Route::get('/video-review', 'HomeController@review');
Route::get('/video-review/{id}', 'HomeController@review_detail');
Route::get('/consult-doctor', 'HomeController@consult');
Route::get('/consult-doctor/{id}', 'HomeController@consult_detail');
Route::get('/service', 'HomeController@service');
Route::get('/product', 'HomeController@product');
Route::get('/product/{id}', 'HomeController@product_detail');
Route::get('/promotion', 'HomeController@promotion');
Route::get('/before-after', 'HomeController@before');
Route::get('/co-bather', 'HomeController@bather');
Route::get('/news', 'HomeController@news');
Route::get('/contact-us', 'HomeController@contact');
Route::get('/career', 'HomeController@career');
