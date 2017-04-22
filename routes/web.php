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

Route::get('/admin/home', 'HomeController@index');

Route::get('/test', 'CategoryController@index');

Route::group(['prefix' => 'admin', 'middleware' => CheckStatus::class], function () {
    
    Route::resource('/categories', 'admin\CategoryController');
    Route::resource('/articles', 'admin\ArticleController');
    //API Route
    Route::get('/apicall/categories', 'admin\CategoryController@show');

    // Tag routes
    Route::get('/tags', ['as'=>'tag.add','uses' => 'admin\TagController@index']);
    Route::post('/tag', 'admin\TagController@add');
    Route::get('/tag/edit/{id}', ['as' => 'tag.edit','uses' => 'admin\TagController@edit']);
    Route::PATCH('/tag/update/{id}', ['as' => 'tag.update', 'uses' => 'admin\TagController@update']);
    Route::delete('/tag/{tag}', 'admin\TagController@destroy');
    
    // Subscription Routes
    Route::resource('/subscriptions', 'admin\SubscriptionController');
    Route::resource('/pages', 'admin\PageController');
    Route::resource('/settings', 'admin\SettingsController');
    Route::resource('/menus', 'admin\MenuController');
    
});




