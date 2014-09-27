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
