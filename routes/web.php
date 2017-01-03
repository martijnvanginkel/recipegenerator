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

<<<<<<< HEAD
Route::get('/users/favorites/{id}', 'UserController@favorite')->name('favorites');
Route::get('/users/histories/{id}', 'UserController@history')->name('histories');

Route::get('/users.index', 'RecipeController@history')->name('history');


=======
>>>>>>> 1ab294dbf11d25d091ae23d4f0609c30ac177782
Route::get('/home', 'RecipeController@generate')->name('generate');
Route::get('/home', 'RecipeController@generate')->name('recipe-generate');
Route::post('/home', 'RecipeController@generate')->name('recipe-generate');

<<<<<<< HEAD

=======
Route::post('/users.index', 'RecipeController@favorite')->name('recipe-favorite');
>>>>>>> 1ab294dbf11d25d091ae23d4f0609c30ac177782
Route::delete('/users.index/{id}', 'UserController@destroyDiet')->name('destroy-diet');

Route::get('/users/favorites/{id}', 'UserController@show')->name('favorites');
Route::get('/users/history', 'UserController@history')->name('history');

Route::post('/recipes/{recipe}/comments', 'CommentsController@store');

Auth::routes();



//Route::get('/home', 'HomeController@index'); // VERWIJST OOK NAAR AUTHENTICATION IN HOMECONTROLLER. __CONSTRUCT /staat alleen homepage toe als ingelogt
