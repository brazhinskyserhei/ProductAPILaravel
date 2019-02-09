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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');

Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}', 'CategoryController@show');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::resource('categories', 'CategoryController',[
        'only' => ['store', 'update', 'destroy']
    ]);
    Route::resource('products', 'ProductController',[
        'only' => ['index','store', 'update', 'destroy']
    ]);
});
