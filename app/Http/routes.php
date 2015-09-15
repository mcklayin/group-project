<?php

/****************   Model binding into route **************************/
Route::model('article', 'App\Article');
Route::model('group', 'App\Group');
Route::model('static', 'App\StaticBlocks');
Route::model('file', 'App\Files');
Route::model('articlecategory', 'App\ArticleCategory');
Route::model('language', 'App\Language');
Route::model('user', 'App\User');
Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[0-9a-z-_]+');

/***************    Site routes  **********************************/
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('articles', 'ArticlesController@index');
Route::get('article/{slug}', 'ArticlesController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    # Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');

    # Language
    Route::get('language/data', 'Admin\LanguageController@data');
    Route::get('language/{language}/show', 'Admin\LanguageController@show');
    Route::get('language/{language}/edit', 'Admin\LanguageController@edit');
    Route::get('language/{language}/delete', 'Admin\LanguageController@delete');
    Route::resource('language', 'Admin\LanguageController');

    # Article category
    Route::get('articlecategory/data', 'Admin\ArticleCategoriesController@data');
    Route::get('articlecategory/{articlecategory}/show', 'Admin\ArticleCategoriesController@show');
    Route::get('articlecategory/{articlecategory}/edit', 'Admin\ArticleCategoriesController@edit');
    Route::get('articlecategory/{articlecategory}/delete', 'Admin\ArticleCategoriesController@delete');
    Route::get('articlecategory/reorder', 'Admin\ArticleCategoriesController@getReorder');
    Route::resource('articlecategory', 'Admin\ArticleCategoriesController');

    # Articles
    Route::get('article/data', 'Admin\ArticleController@data');
    Route::get('article/{article}/show', 'Admin\ArticleController@show');
    Route::get('article/{article}/edit', 'Admin\ArticleController@edit');
    Route::get('article/{article}/delete', 'Admin\ArticleController@delete');
    Route::get('article/reorder', 'Admin\ArticleController@getReorder');
    Route::resource('article', 'Admin\ArticleController');

    #File
    Route::get('file/data', 'Admin\FileController@data');
    Route::get('file/{file}/show', 'Admin\FileController@show');
    Route::get('file/{file}/edit', 'Admin\FileController@edit');
    Route::get('file/{file}/delete', 'Admin\FileController@delete');
    Route::get('file', 'Admin\FileController@index');


    #Group
    Route::get('group/data', 'Admin\GroupController@data');
    Route::get('group/{group}/show', 'Admin\GroupController@show');
    Route::get('group/{group}/edit', 'Admin\GroupController@edit');
    Route::get('group/{group}/delete', 'Admin\GroupController@delete');
    Route::resource('group', 'Admin\GroupController');

    #Static Blocks
    Route::get('static/data', 'Admin\StaticBlocksController@data');
    Route::get('static/{static}/show', 'Admin\StaticBlocksController@show');
    Route::get('static/{static}/edit', 'Admin\StaticBlocksController@edit');
    Route::get('static/{static}/delete', 'Admin\StaticBlocksController@delete');
    Route::resource('static', 'Admin\StaticBlocksController');


    # Users
    Route::get('user/data', 'Admin\UserController@data');
    Route::get('user/{user}/show', 'Admin\UserController@show');
    Route::get('user/{user}/edit', 'Admin\UserController@edit');
    Route::get('user/{user}/delete', 'Admin\UserController@delete');
    Route::get('user/{user}/deleteFromGroup/{id}', 'Admin\UserController@deleteFromGroup');
    Route::resource('user', 'Admin\UserController');
});
