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

Route::get('/users.index', 'CommentsController@index');

//Route::resource('recipes', 'RecipeController');
Route::resource('users', 'UserController', ['except' => ['show']]);

Route::get('/users/favorites/{id}', 'UserController@favorite')->name('favorite-recipes');
Route::get('/users/history/{id}', 'UserController@history')->name('history-recipes');

Route::get('/users.index', 'RecipeController@history')->name('history');

Route::get('/home', 'RecipeController@generate')->name('generate');
Route::get('/home', 'RecipeController@generate')->name('recipe-generate');
Route::post('/home', 'RecipeController@generate')->name('recipe-generate');

Route::post('/users.index', 'RecipeController@favorite')->name('recipe-favorite');

Route::delete('/users.index/{id}', 'UserController@destroyFoodrestriction')->name('destroy-foodrestriction');
Route::delete('/users.index/comment/{id}', 'CommentsController@destroy')->name('destroy-comment');

Route::post('/recipes/{recipe}/comments', 'CommentsController@store');

Auth::routes();

Route::group(['middleware' => ['admin']], function () {
    Route::resource('recipes', 'RecipeController');
    Route::resource('foodrestrictions', 'FoodrestrictionController');
    Route::resource('diets', 'DietController', ['except' => ['create']]);
});


//Route::get('/home', 'HomeController@index'); // VERWIJST OOK NAAR AUTHENTICATION IN HOMECONTROLLER. __CONSTRUCT /staat alleen homepage toe als ingelogt
