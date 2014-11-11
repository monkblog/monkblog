<?php

// Shared variables

View::share( 'siteTitle', Config::get( 'site.title', '' ) );
View::share( 'monkVersion', Config::get( 'site.version', '' ) );

// Auth routes

Route::get( '/login', [ 'as' => 'login', 'uses' => 'AuthController@getLogin' ] );
Route::post( '/login', [ 'as' => 'login.post', 'uses' => 'AuthController@postLogin' ] );
Route::get( '/logout', [ 'as' => 'logout', 'uses' => 'AuthController@getLogout' ] );

// Admin routes

Route::group( [ 'prefix' => 'admin', 'before' => 'auth' ], function () {
	Route::get( '/', [ 'as' => 'admin.home', 'uses' => 'HomeController@getAdminHome' ] );
	Route::resource( 'categories', 'CategoriesController' );
	Route::resource( 'pages', 'PagesController' );
	Route::resource( 'posts', 'PostsController' );
	Route::resource( 'tags', 'TagsController' );
	Route::resource( 'users', 'UsersController' );
} );

// Specific routes

Route::get( '/', [ 'as' => 'home', 'uses' => 'HomeController@getHome' ] );
Route::get( 'post/{slug}', [ 'uses' => 'PostsController@getPostBySlug' ] );
Route::get( '/{slug}', [ 'uses' => 'PagesController@getPageBySlug' ] );
