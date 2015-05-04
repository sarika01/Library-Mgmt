<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('book', 'BookController@index');
Route::get('Add', 'BookController@create');
Route::get('show/{id}', 'BookController@show');
Route::get('edit/{id}', 'BookController@edit');
Route::get('history', 'BookController@showTransactions');
Route::get('due', 'BookController@borrowedBooks');

Route::post('save', 'BookController@store');
Route::post('search', 'BookController@getSearch');
Route::post('issue/{id}', 'BookController@issue');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
