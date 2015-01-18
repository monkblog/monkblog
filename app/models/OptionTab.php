<?php

class OptionTab extends \Eloquent {

	protected $table = 'option_tabs';

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function options()
	{
		return $this->hasMany( 'Option' );
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function themes() {
		return $this->hasMany( 'Theme' );
	}
}