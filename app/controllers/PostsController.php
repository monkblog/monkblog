<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy( 'published_at', 'desc' )->get();

		$viewData = [
			'posts' => $posts,
			'pageTitle' => 'All Posts',
		];

		return View::make( 'posts.index', $viewData );
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		$viewData = [
			'pageTitle' => 'Write New Post',
			'post' => new Post,
			'categories' => Category::lists( 'title', 'id' ),
		];

		return View::make( 'posts.create', $viewData );
	}

	public function publish( $id )
	{
		$post = Post::find( $id );

		if ( !$post->is_published ) {
			$post->is_published = true;
			$post->published_at = date( 'Y-m-d H:i:s' );
			$post->save();
		}

		return Redirect::route( 'admin.posts.index' );
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make( $data = Input::all(), Post::$rules );

		if ( $validator->fails() )
		{
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		Post::create( $data );

		return Redirect::route( 'admin.posts.index' );
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id )
	{
		$post = Post::find( $id );

		if ( !$post ) {
			App::abort( 404 );
		}

		return View::make( 'posts.show', compact( 'post' ) );
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id )
	{
		$post = Post::find( $id );

		$viewData = [
			'pageTitle' => 'Edit Post: ' . $post->title,
			'post' => $post,
			'categories' => Category::lists( 'title', 'id' ),
		];

		return View::make( 'posts.edit', $viewData );
	}

	/**
	 * Update the specified post in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		$post = Post::findOrFail( $id );

		$validator = Validator::make( $data = Input::all(), Post::$rules );

		if ( $validator->fails() )
		{
			return Redirect::back()->withErrors( $validator )->withInput();
		}

		$post->update( $data );

		return Redirect::route( 'admin.posts.index' );
	}

	/**
	 * Remove the specified post from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy( $id )
	{
		Post::destroy( $id );

		return Redirect::route( 'admin.posts.index' );
	}

	public function confirmDestroy( $id ) {
		$post = Post::find( $id );

		$viewData = [
			'post' => $post,
			'pageTitle' => 'Confirm Delete ' . $post->title,
		];

		return Response::view( 'posts.destroy', $viewData );
	}

	public function getPostBySlug( $slug ) {

		$post = Post::where( 'slug', '=', $slug )->where( 'is_published', '=', true )->remember( Config::get( 'site.cacheduration', 5 ) )->first();

		if ( !$post ) {
			App::abort( 404 );
		}

		$viewData = [
			'post' => $post,
			'pageTitle' => $post->title,
		];

		return Response::view( 'posts.show', $viewData );
	}

}
