<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* 
Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});
*/

// Auth 
Route::post('/auth/login', 'Api\AuthController@login');
Route::get('/auth/credential', 'Api\AuthController@credential');
Route::post('/auth/register', 'Api\AuthController@register');

Route::middleware('auth.api.tokenized')->group(function () 
{
	Route::apiResources([
		'/user' => 'Api\UserController',
		'/task' => 'Api\TaskController',
	]);

	// Auth
	Route::post('/auth/logout', 'Api\AuthController@logout');
});
