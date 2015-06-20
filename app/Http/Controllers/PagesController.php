<?php

namespace MonkBlog\Http\Controllers;

use Illuminate\Http\Response;
use MonkBlog\Models\Page;
use Input;
use Validator;

class PagesController extends BaseController {

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

		return view( 'pages.index', $viewData );
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

		return view( 'pages.create', $viewData );
	}

	public function publish( $id )
	{
		$page = Page::find( $id );

		if ( !$page->is_published ) {
			$page->is_published = true;
			$page->published_at = date( 'Y-m-d H:i:s' );
			$page->save();
		}

		return redirect()->route( 'admin.pages.index' );
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
			return redirect()->back()->withErrors( $validator )->withInput();
		}

		Page::create( $data );

		return redirect()->route( 'admin.pages.index' );
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

		$viewData = [
			'page' => $page,
			'pageTitle' => $page->title,
		];

		return view( 'pages.show', $viewData );
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

		return view( 'pages.edit', $viewData );
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
			return redirect()->back()->withErrors( $validator )->withInput();
		}

		$page->update( $data );

		return redirect()->route( 'admin.pages.index' );
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

		return redirect()->route( 'admin.pages.index' );
	}

	public function confirmDestroy( $id ) {
		$page = Page::find( $id );

		$viewData = [
			'page' => $page,
			'pageTitle' => 'Confirm Delete ' . $page->title,
		];

		return view( 'pages.destroy', $viewData );
	}

	public function getPageBySlug( $slug ) {

		$page = Page::where( 'slug', '=', $slug )->where( 'is_published', '=', true )->first();

		if ( !$page ) {
			abort( 404 );
		}

		$viewData = [
			'pageTitle' => $page->title,
			'page' => $page,
		];

		return view( 'pages.show', $viewData );
	}

}
