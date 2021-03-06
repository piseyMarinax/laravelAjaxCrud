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

//Route::get('/','postController@index');
// Route::get('/post','postController@index');
// Route::POST('addPost','postController@addPost');

Route::group(['middleware' => ['web']],function(){
   Route::get('post','postController@index');
   Route::POST('addPost','postController@addPost');
});
