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

Route::get('/', 'AuthController@loginView')->name('login');

Route::get('/login', 'AuthController@loginView')->name('auth.login');
Route::post('/login', 'AuthController@loginSubmit')->name('auth.login.submit');

Route::get('/register', 'AuthController@registerView')->name('auth.register');
Route::post('/register', 'AuthController@registerSubmit')->name('auth.register.submit');

Route::get('/docs', 'HomeController@apiDocs')->name('docs');


Route::middleware('auth')->group(function () 
{
	Route::get('/home', 'HomeController@index')->name('home');

	Route::resources([
		'/user' => 'UserController',
		'/task' => 'TaskController',
	]);
	
});
Route::post('/logout', 'AuthController@logout')->name('auth.logout');