<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| External API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register External API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| Author by Rangga Darmajati
|
*/

Route::group([ 'prefix' => '/v1/eks', 'namespace' => 'api\v1\int' ],function(){
	Route::post('register', 'AuthController@register');
	Route::get('activation/{activation_code}', 'AuthController@activate');
	Route::post('login', 'AuthController@store');
	Route::post('reset_password', 'AuthController@forgetPassword');

});
