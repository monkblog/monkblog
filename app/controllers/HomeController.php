<?php

class HomeController extends BaseController {

	public function getHome()
	{
		$recentPosts = Post::where( 'is_published', '=', true )->orderBy( 'published_at', 'desc' )->take( 3 )->remember( Config::get( 'site.cacheduration', 5 ) )->get();

		$more = false;

		if ( Post::where( 'is_published', '=', true )->count() > 3 ) {
			$more = true;
		}

		$viewData = [
			'pageTitle' => 'Home',
			'recentPosts' => $recentPosts,
			'more' => $more,
		];

		return View::make( 'home', $viewData );
	}

	public function getAdminHome()
	{
		$viewData = [
			'pageTitle' => 'Dashboard',
		];

		return View::make( 'admin.home', $viewData );
	}

}
