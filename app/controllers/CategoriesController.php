<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();

		$viewData = [
			'categories' => $categories,
			'pageTitle' => 'Categories',
		];

		return View::make( 'categories.index', $viewData );
	}

	/**
	 * Show the form for creating a new category
	 *
	 * @return Response
	 */
	public function create()
	{
		$viewData = [
			'pageTitle' => 'Create New Category',
			'category' => new Category,
		];

		return View::make( 'categories.create', $viewData );
	}

	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make( $data = Input::all(), Category::$rules );

		if ( $validator->fails() )
		{
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		Category::create( $data );

		return Redirect::route( 'admin.categories.index' );
	}

	/**
	 * Display the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id )
	{
		$category = Category::find( $id );

		if ( !$category ) {
			App::abort( 404 );
		}

		$viewData = [
			'category' => $category,
			'pageTitle' => 'Category: ' . $category->title,
		];

		return View::make( 'categories.show', $viewData );
	}

	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id )
	{
		$category = Category::find( $id );

		if ( !$category ) {
			App::abort( 404 );
		}

		$viewData = [
			'category' => $category,
			'pageTitle' => 'Editing Category "' . $category->title . '"',
		];

		return View::make( 'categories.edit', $viewData );
	}

	/**
	 * Update the specified category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		$category = Category::find( $id );

		if ( !$category ) {
			App::abort( 404 );
		}

		$validator = Validator::make( $data = Input::all(), Category::$rules );

		if ( $validator->fails() )
		{
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		$category->update( $data );

		return Redirect::route( 'admin.categories.index' );
	}

	public function confirmDestroy( $id ) {
		$category = Category::find( $id );

		$viewData = [
			'category' => $category,
			'pageTitle' => 'Confirm Delete ' . $category->title,
		];

		return Response::view( 'categories.destroy', $viewData );
	}

	/**
	 * Remove the specified category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy( $id )
	{
		Category::destroy( $id );

		return Redirect::route( 'admin.categories.index' );
	}

}
