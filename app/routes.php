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
    Route::resource('abouts', 'AboutsController');
    Route::resource('knowledges', 'KnowledgesController');
    Route::resource('celebrities', 'CelebritiesController');
    Route::resource('reviews', 'ReviewsController');
    Route::resource('consults', 'ConsultsController');
    Route::resource('promotions', 'PromotionsController');
    Route::resource('befores', 'BeforesController');
    Route::resource('bathers', 'BathersController');
    Route::resource('news', 'NewsController');
    Route::resource('contacts', 'ContactsController');
    Route::resource('branches', 'BranchesController');
    Route::resource('websites', 'WebsitesController');
    Route::resource('slideshows', 'SlideshowsController');
    Route::resource('careers', 'CareersController');
    Route::resource('orders', 'OrdersController');
    Route::resource('customer_reviews', 'CustomerReviewsController');
    Route::resource('service_discounts', 'ServiceDiscountsController');
    Route::resource('promotion_orders', 'PromotionOrdersController');
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
Route::get('/logout', 'HomeController@logout');
Route::get('/line', 'HomeController@line');
Route::get('/register', 'HomeController@register');
Route::get('/group/{group}', 'HomeController@group');
Route::post('/register', 'HomeController@handle_register');
Route::post('/auth', 'HomeController@authenticate');
Route::get('/aboutus', 'HomeController@aboutus');
Route::get('/knowledge', 'HomeController@knowledge');
Route::get('/knowledge/{id}', 'HomeController@knowledge_detail');
Route::get('/celebrity', 'HomeController@celebrity');
Route::get('/video-review', 'HomeController@review');
Route::get('/video-review/{id}', 'HomeController@review_detail');
Route::get('/consult-doctor', 'HomeController@consult');
Route::get('/consult-doctor/{id}', 'HomeController@consult_detail');
Route::get('/service', 'HomeController@service');
Route::get('/service-detail/{id}', 'HomeController@service_detail');
Route::post('/service-discount', 'HomeController@service_discount');
Route::get('/service-categories/{id}', 'HomeController@service_categories');
Route::get('/product', 'HomeController@product');
Route::get('/product/{id}', 'HomeController@product_detail');
Route::get('/promotion', 'HomeController@promotion');
Route::get('/promotion/order/{id}', 'HomeController@promotion_order');
Route::post('/promotion/checkout', 'HomeController@promotion_checkout');
Route::get('/before-after', 'HomeController@before');
Route::get('/co-bather', 'HomeController@bather');
Route::get('/co-bather/{id}', 'HomeController@bather_detail');
Route::get('/news', 'HomeController@news');
Route::get('/contact-us', 'HomeController@contact');
Route::get('/branch/{id}', 'HomeController@branch');
Route::get('/career', 'HomeController@career');
Route::get('/cart', 'HomeController@cart');
Route::post('/add', 'HomeController@cart_add');
Route::get('/remove/{id}', 'HomeController@cart_remove');
Route::get('/checkout-1', 'HomeController@checkout_1');
Route::post('/checkout-2', 'HomeController@checkout_2');
Route::get('/checkout-3', 'HomeController@checkout_3');


