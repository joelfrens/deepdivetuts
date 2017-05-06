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

Route::get('/', 'FrontController@index');

Auth::routes();

Route::get('/admin/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => CheckStatus::class], function () {
    
    Route::resource('/categories', 'admin\CategoryController');
    Route::resource('/articles', 'admin\ArticleController');
    Route::resource('/subscriptions', 'admin\SubscriptionController');
    Route::resource('/pages', 'admin\PageController');
    Route::resource('/settings', 'admin\SettingsController');
    Route::resource('/menus', 'admin\MenuController');
    Route::resource('/users', 'admin\UserController');
    
    // Tag routes
    Route::get('/tags', ['as'=>'tag.add','uses' => 'admin\TagController@index']);
    Route::post('/tag', 'admin\TagController@add');
    Route::get('/tag/edit/{id}', ['as' => 'tag.edit','uses' => 'admin\TagController@edit']);
    Route::PATCH('/tag/update/{id}', ['as' => 'tag.update', 'uses' => 'admin\TagController@update']);
    Route::delete('/tag/{tag}', 'admin\TagController@destroy');
    
});

Route::get('{slug}', 'FrontController@show');
Route::get('/page/{slug}', 'FrontController@getPage');

Route::get('/tag/{tag}', 'FrontController@getArticlesByTag');
Route::get('/category/{category}', 'FrontController@getArticlesByCategory');
Route::post('/search', 'FrontController@searchArticles');



