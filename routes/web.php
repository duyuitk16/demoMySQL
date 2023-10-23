<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'PostController@show');


Route::get('/post/show', 'PostController@show');
Route::get('/post/show/detail/{slug}', 'PostController@detail');


Route::get('/admin/post/show', 'AdminPostController@show');
Route::get('/admin/post/show/{id}', 'AdminPostController@eachShow');
Route::post('/admin/post/create', 'AdminPostController@create');
Route::post('/admin/post/update/{id}', 'AdminPostController@update');
Route::get('/admin/post/delete/{id}', 'AdminPostController@delete');
