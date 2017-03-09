<?php

use App\Http\Middleware\CheckStatus;

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


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/test', 'CategoryController@index');

Route::group(['prefix' => 'admin', 'middleware' => CheckStatus::class], function () {
    Route::get('/pages', 'admin\PageController@index');
    Route::resource('/categories', 'admin\CategoryController');

    //API Route
    Route::get('/apicall/categories', 'admin\CategoryController@show');

    // Tag routes
    Route::get('/tags', ['as'=>'tag.add','uses' => 'admin\TagController@index']);
    Route::post('/tag', 'admin\TagController@add');
    Route::get('/tag/edit/{id}', ['as' => 'tag.edit','uses' => 'admin\TagController@edit']);
    Route::PATCH('/tag/update/{id}', ['as' => 'tag.update', 'uses' => 'admin\TagController@update']);
    Route::delete('/tag/{tag}', 'admin\TagController@destroy');

    // Articles Routes
	Route::get('/articles', 'admin\ArticleController@index');
    Route::post('/article', ['as'=>'article.add','uses' => 'admin\ArticleController@add']);
    Route::get('/article/edit/{id}', 'admin\ArticleController@edit');
    Route::get('/article/edit/{id}',['as' => 'article.edit','uses' => 'admin\ArticleController@edit']);
    Route::PATCH('/article/update/{id}', ['as' => 'article.update', 'uses' => 'admin\ArticleController@update']);
    Route::delete('/article/{article}', 'admin\ArticleController@destroy');
});




