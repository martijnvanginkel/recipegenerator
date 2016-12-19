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

Route::get('/', 'PagesController@getIndex');
Route::get('/profile', 'PagesController@getProfile');

Route::resource('recipes', 'RecipeController');
Route::resource('diets', 'DietController', ['except' => ['create']]);
Route::resource('users', 'UserController');
Route::resource('favorites', 'FavoriteController');

Route::get('/home', 'RecipeController@generate')->name('generate');
Route::get('/home', 'RecipeController@generate')->name('recipe-generate');
Route::post('/home', 'RecipeController@generate')->name('recipe-generate');
Route::post('/home', 'RecipeController@favorite')->name('recipe-favorite');
//Route::post('/users', 'GenerateController@store')->name('generate-store');

Auth::routes();



//Route::get('/home', 'HomeController@index'); // VERWIJST OOK NAAR AUTHENTICATION IN HOMECONTROLLER. __CONSTRUCT /staat alleen homepage toe als ingelogt
