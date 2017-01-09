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

Route::resource('recipes', 'RecipeController');
Route::resource('diets', 'DietController', ['except' => ['create']]);
Route::resource('users', 'UserController', ['except' => ['show']]);

Route::get('/users/favorites/{id}', 'UserController@favorite')->name('favorite-recipes');
Route::get('/users/history/{id}', 'UserController@history')->name('history-recipes');

Route::get('/users.index', 'RecipeController@history')->name('history');

Route::get('/home', 'RecipeController@generate')->name('generate');
Route::get('/home', 'RecipeController@generate')->name('recipe-generate');
Route::post('/home', 'RecipeController@generate')->name('recipe-generate');

Route::post('/users.index', 'RecipeController@favorite')->name('recipe-favorite');

Route::delete('/users.index/{id}', 'UserController@destroyDiet')->name('destroy-diet');

Route::post('/recipes/{recipe}/comments', 'CommentsController@store');
Route::delete('/recipes/{recipe}', 'CommentsController@destroy')->name('destroy-comment');

Route::get('/users/{comments}', 'CommentsController@edit')->name('comments-edit');
Route::post('/users/{comments}', 'CommentsController@update')->name('comments-update');

Auth::routes();



//Route::get('/home', 'HomeController@index'); // VERWIJST OOK NAAR AUTHENTICATION IN HOMECONTROLLER. __CONSTRUCT /staat alleen homepage toe als ingelogt
