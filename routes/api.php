<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/category','Api\CategoryController@index');
Route::get('/subcategory','Api\SubcategoryController@index');
Route::get('/post','Api\PostController@index');
Route::get('/subbyid/{categoryId}','Api\PostController@getPostBySubcategoryId');
Route::get('/postbyid/{subcategoryId}','Api\PostController@getPostBySubcategoryId');

// Route::post('/createcategory','Api\CategoryController@store');
// Route::post('/createsubcat','Api\SubcategoryController@store');
// Route::post('/createpost','Api\PostController@store');