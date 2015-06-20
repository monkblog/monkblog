<?php

namespace MonkBlog\Http\Controllers;

use Illuminate\Http\Response;
use MonkBlog\Models\Post;
use MonkBlog\Models\Category;
use Input;
use Validator;

class PostsController extends BaseController {

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

		return view( 'posts.index', $viewData );
	}

	/**
	* Display an archive listing of posts
	*
	* @return Response
	*/
	public function archive( $offset = 0, $limit = 3 )
	{
		if ( $offset < 0 ) {
			$offset = 0;
		}

		$posts = Post::where( 'is_published', '=', true )->orderBy( 'published_at', 'desc' )->skip( $offset )->take( $limit )->get();

		$postCount = Post::where( 'is_published', '=', true )->count();

		$more = false;
		$less = false;

		if ( $offset + $limit < $postCount ) {
			$more = true;
		}

		if ( $offset > 0 ) {
			$less = true;
		}

		$nextOffset = $offset + $limit;
		$prevOffset = ( $offset - $limit < 0 ) ? 0 : $offset - $limit;

		$viewData = [
			'posts' => $posts,
			'pageTitle' => 'Archive',
			'offset' => $offset,
			'nextOffset' => $nextOffset,
			'prevOffset' => $prevOffset,
			'limit' => $limit,
			'more' => $more,
			'less' => $less,
		];

		return view( 'posts.archive', $viewData );
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

		return view( 'posts.create', $viewData );
	}

	public function publish( $id )
	{
		$post = Post::find( $id );

		if ( !$post->is_published ) {
			$post->is_published = true;
			$post->published_at = date( 'Y-m-d H:i:s' );
			$post->save();
		}

		return redirect()->route( 'admin.posts.index' );
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
			return redirect()->back()->withErrors( $validator )->withInput();
		}

		Post::create( $data );

		return redirect()->route( 'admin.posts.index' );
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
			abort( 404 );
		}

		return view( 'posts.show', compact( 'post' ) );
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

		return view( 'posts.edit', $viewData );
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
			return redirect()->back()->withErrors( $validator )->withInput();
		}

		$post->update( $data );

		return redirect()->route( 'admin.posts.index' );
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

		return redirect()->route( 'admin.posts.index' );
	}

	public function confirmDestroy( $id ) {
		$post = Post::find( $id );

		$viewData = [
			'post' => $post,
			'pageTitle' => 'Confirm Delete ' . $post->title,
		];

		return view( 'posts.destroy', $viewData );
	}

	public function getPostBySlug( $slug ) {

		$post = Post::where( 'slug', '=', $slug )->where( 'is_published', '=', true )->first();

		if ( !$post ) {
			abort( 404 );
		}

		$viewData = [
			'post' => $post,
			'pageTitle' => $post->title,
		];

		return view( 'posts.show', $viewData );
	}

}
