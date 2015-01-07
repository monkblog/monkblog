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
}