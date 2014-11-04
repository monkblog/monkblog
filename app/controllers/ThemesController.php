<?php

class ThemesController extends \BaseController {

	/**
	 * Display a listing of themes
	 *
	 * @return Response
	 */
	public function index()
	{
		$themes = Theme::all();

		return View::make('themes.index', compact('themes'));
	}

	/**
	 * Show the form for creating a new theme
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('themes.create');
	}

	/**
	 * Store a newly created theme in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Theme::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Theme::create($data);

		return Redirect::route('themes.index');
	}

	/**
	 * Display the specified theme.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$theme = Theme::findOrFail($id);

		return View::make('themes.show', compact('theme'));
	}

	/**
	 * Show the form for editing the specified theme.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$theme = Theme::find($id);

		return View::make('themes.edit', compact('theme'));
	}

	/**
	 * Update the specified theme in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$theme = Theme::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Theme::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$theme->update($data);

		return Redirect::route('themes.index');
	}

	/**
	 * Remove the specified theme from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Theme::destroy($id);

		return Redirect::route('themes.index');
	}

}
