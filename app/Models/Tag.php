<?php

namespace MonkBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}