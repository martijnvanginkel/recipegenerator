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
Route::resource('users', 'UserController', ['except' => ['show']]);

Route::get('/users/favorites/{id}', 'UserController@favorite')->name('favorites');
Route::get('/users/histories/{id}', 'UserController@history')->name('histories');

Route::get('/users.index', 'RecipeController@history')->name('history');


Route::get('/home', 'RecipeController@generate')->name('generate');
Route::get('/home', 'RecipeController@generate')->name('recipe-generate');
Route::post('/home', 'RecipeController@generate')->name('recipe-generate');
Route::post('/users.index', 'RecipeController@favorite')->name('recipe-favorite');


Route::delete('/users.index/{id}', 'UserController@destroyDiet')->name('destroy-diet');

Auth::routes();



//Route::get('/home', 'HomeController@index'); // VERWIJST OOK NAAR AUTHENTICATION IN HOMECONTROLLER. __CONSTRUCT /staat alleen homepage toe als ingelogt
