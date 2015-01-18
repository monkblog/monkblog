<?php

class Theme extends \Eloquent {

	public static $rules = [
		'name' => 'required|unique:themes,name,{id}',
		'display_name' => 'required',
		'description' => 'required',
		'author' => 'required',
		'version' => 'required',
		'assets_folder' => 'required',
	];

	protected $fillable = [
		'name',
		'display_name',
		'description',
		'author',
		'assets_folder',
	];


	public function option_tabs()
	{
		return $this->belongsTo( 'OptionTab' );
	}

	/**
	 * Create a new Eloquent Collection instance.
	 *
	 * @param  array $models
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function newCollection(Array $models = [])
	{
		return new ThemeCollection($models);
	}
}