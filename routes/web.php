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
Route::get('/test', 'TestController@test');

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/catalog', 'PagesController@catalog');
Route::any('/contacts', 'PagesController@contacts');
Route::get('/subscription-service', 'PagesController@subscriptionService');
Route::get('/services', 'PagesController@services');

Route::get('/request/form/item-price', function () {
    return view('form-item-price');
});

Route::any('/corporate', 'PagesController@corporate');
Route::any('/clients', 'PagesController@clients');
Route::any('/clients/{id}', 'PagesController@clients');

Route::get('/vacancies', 'PagesController@vacancies');
Route::get('/vacancy/{id}', 'PagesController@vacancy');


//Route::get('/category', 'CategoryController@category');
//Route::post('/category/add', 'CategoryController@categoryAdd');

Route::get('cabinet', 'PagesController@cabinet');
Route::get('cabinet/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('cabinet/login', 'Auth\LoginController@login');
Route::get('cabinet/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('cabinet/logout', 'Auth\LoginController@logout');
Route::get('cabinet/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('cabinet/register', 'Auth\RegisterController@register');

