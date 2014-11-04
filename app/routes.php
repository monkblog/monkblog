<?php

// Specific routes

Route::get( '/', [ 'as' => 'home', 'uses' => 'HomeController@getHome' ] );
Route::get( 'post/{slug}', [ 'uses' => 'PostsContrller@getPostBySlug' ] );
Route::get( '/{slug}', [ 'uses' => 'PagesContrller@getPageBySlug' ] );

// Admin routes

Route::group( [ 'prefix' => 'admin' ], function () {
	Route::resource( 'categories', 'CategoriesController' );
	Route::resource( 'posts', 'PostsController' );
	Route::resource( 'tags', 'TagsController' );
	Route::resource( 'themes', 'ThemesController' );
	Route::resource( 'users', 'UsersController' );
} );
