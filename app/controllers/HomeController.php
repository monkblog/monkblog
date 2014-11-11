<?php

class HomeController extends BaseController {

	public function getHome()
	{
		$recentPosts = Post::where( 'is_published', '=', 'true' )->orderBy( 'created_at', 'desc' )->take( 3 )->get();

		$viewData = [
			'pageTitle' => 'Home',
			'recentPosts' => $recentPosts,
		];

		return View::make( 'home', $viewData );
	}

	public function getAdminHome()
	{
		$viewData = [
			'pageTitle' => 'Home',
		];

		return View::make( 'admin.home', $viewData );
	}

}
