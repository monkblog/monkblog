<?php

namespace MonkBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	// Add your validation rules here
	public static $rules = [
		 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'title',
		'slug',
		'summary',
		'body',
		'category_id',
	];

	public function category() {
		return $this->belongsTo( 'MonkBlog\Models\Category' );
	}
}
