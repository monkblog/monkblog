<?php

namespace MonkBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'title',
		'description',
		'slug',
	];

	public function posts() {
		return $this->hasMany( 'Post' );
	}
}
