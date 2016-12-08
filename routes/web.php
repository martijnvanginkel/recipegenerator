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

Route::get('/home', 'GenerateController@generate')->name('generate');
Route::post('/home', 'GenerateController@generate')->name('recipe-generate');

Auth::routes();

//Route::get('/home', 'HomeController@index'); // VERWIJST OOK NAAR AUTHENTICATION IN HOMECONTROLLER. __CONSTRUCT
