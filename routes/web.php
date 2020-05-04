<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//category
Route::get('dashboard', 'DashboardController@index');
Route::post('post-category-form', 'CategoryController@store');
Route::get('create-category', 'CategoryController@create');
Route::get('all-categories', 'CategoryController@index');
Route::get('edit-category/{id}', 'CategoryController@edit');
Route::post('update-category/{id}', 'CategoryController@update');
Route::get('delete-category/{id}', 'CategoryController@destroy');

//subcategory
Route::post('post-subcategory-form', 'SubcategoryController@store');
Route::get('create-subcategory', 'SubcategoryController@create');
Route::get('all-sub', 'SubcategoryController@index');
Route::get('edit-subcategory/{id}', 'SubcategoryController@edit');
Route::post('update-subcategory/{id}', 'SubcategoryController@update');
Route::get('delete-subcategory/{id}', 'SubcategoryController@destroy');

//post
Route::post('post-post-form', 'PostController@store');
Route::get('craeate-post-form', 'PostController@create');
Route::get('all-post', 'PostController@index');
Route::get('edit-post/{id}', 'PostController@edit');
Route::post('post-post-edit-form/{id}', 'PostController@update');
Route::get('delete-post/{id}', 'PostController@destroy');