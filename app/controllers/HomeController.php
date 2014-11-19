<?php

class HomeController extends BaseController {

	public function getHome()
	{
		$recentPosts = Post::where( 'is_published', '=', true )->orderBy( 'published_at', 'desc' )->take( 3 )->remember( Config::get( 'site.cacheduration', 5 ) )->get();

		$viewData = [
			'pageTitle' => 'Home',
			'recentPosts' => $recentPosts,
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
