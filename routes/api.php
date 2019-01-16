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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function(){

	// MEMBER API
	Route::group(['prefix' => 'member'], function(){
		Route::get('','ApiMemberController@index');
	});

	Route::group(['prefix' => 'transaction'], function(){
		Route::get('{id}','TransactionController@getMemberData');
	});

	Route::group(['prefix' => 'buku'], function(){
		Route::get('','BookController@index');
	});
});
