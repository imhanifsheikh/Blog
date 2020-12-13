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

Route::get('/posts', 'PostController@index');
Route::get('/post/{slug}', 'PostController@show');
Route::get('/similarPost/{category_id}/{post_id}', 'PostController@similar');



Route::get('/getCategories/', 'CategoryController@index');
Route::get('/category/{slug}', 'CategoryController@show');



Route::get('/search/{request}', 'PostController@search');