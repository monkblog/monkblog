<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of pages
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::all();

		$viewData = [
			'pages' => $pages,
			'pageTitle' => 'All Pages',
		];

		return View::make( 'pages.index', $viewData );
	}

	/**
	 * Show the form for creating a new page
	 *
	 * @return Response
	 */
	public function create()
	{
		$viewData = [
			'page' => new Page,
			'pageTitle' => 'Write New Page',
		];

		return View::make( 'pages.create', $viewData );
	}

	public function publish( $id )
	{
		$page = Page::find( $id );

		if ( !$page->is_published ) {
			$page->is_published = true;
			$page->published_at = date( 'Y-m-d H:i:s' );
			$page->save();
		}

		return Redirect::route( 'admin.pages.index' );
	}

	/**
	 * Store a newly created page in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make( $data = Input::all(), Page::$rules );

		if ( $validator->fails() )
		{
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		Page::create( $data );

		return Redirect::route( 'admin.pages.index' );
	}

	/**
	 * Display the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id )
	{
		$page = Page::findOrFail( $id );

        $page->body = Markdown::render( $page->body );

		$viewData = [
			'page' => $page,
			'pageTitle' => $page->title,
		];

		return View::make( 'pages.show', $viewData );
	}

	/**
	 * Show the form for editing the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id )
	{
		$page = Page::find( $id );

		$viewData = [
			'page' => $page,
			'pageTitle' => 'Editing ' . $page->title,
		];

		return View::make( 'pages.edit', $viewData );
	}

	/**
	 * Update the specified page in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		$page = Page::findOrFail( $id );

		$validator = Validator::make( $data = Input::all(), Page::$rules );

		if ( $validator->fails() )
		{
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		$page->update( $data );

		return Redirect::route( 'admin.pages.index' );
	}

	/**
	 * Remove the specified page from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy( $id )
	{
		Page::destroy( $id );

		return Redirect::route( 'admin.pages.index' );
	}

	public function confirmDestroy( $id ) {
		$page = Page::find( $id );

		$viewData = [
			'page' => $page,
			'pageTitle' => 'Confirm Delete ' . $page->title,
		];

		return Response::view( 'pages.destroy', $viewData );
	}

	public function getPageBySlug( $slug ) {

		$page = Page::where( 'slug', '=', $slug )->where( 'is_published', '=', true )->remember( Config::get( 'site.cacheduration', 5 ) )->first();

		if ( !$page ) {
			App::abort( 404 );
		}

		$page->body = Markdown::render( $page->body );

		$viewData = [
			'pageTitle' => $page->title,
			'page' => $page,
		];

		return Response::view( 'pages.show', $viewData );
	}

}
