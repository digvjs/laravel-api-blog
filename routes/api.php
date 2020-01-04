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

/** List categories **/
Route::get('categories', 'CategoriesController@index');

/** List all Blogs **/
Route::get('blogs', 'BlogsController@index');

/** Get blog details by ID **/
Route::get('blogs/{id}', 'BlogsController@show');

/** List Blogs by category **/
Route::get('blogs/category/{id}', 'BlogsController@getByCategoryId');