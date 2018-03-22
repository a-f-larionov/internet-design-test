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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', 'IndexController@index');

Route::get('/array-access/', 'ArrayAccessController@index');

Route::get('/date-format-validation/', 'DateFormatValidatationController@index');

Route::get('/specialists/', 'SpecialistsController@index');

Route::get('/news/show/{created}', 'NewsController@show')->where('created', '[0-9]+');

Route::get('/large-file/', 'LargeFileController@index');

Route::get('/large-file/generate', 'LargeFileController@generateFile');

Route::get('/events/', 'EventsController@index');

Route::get('/tree-comments/', 'TreeCommentsController@index');

Route::get('/tree-comments/send-comment', 'TreeCommentsController@sendComment');