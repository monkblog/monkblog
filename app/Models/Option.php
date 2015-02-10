<?php

class Option extends \Eloquent {

    /**
     * The model's rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:options,name,{id}',
        'value' => 'required',
    ];

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'sort_order' => 1,
        'autoload' => true,
    ];

    protected $table = 'options';

	protected $fillable = [
        'name',
        'value',
        'autoload',
        'display_name',
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
        return new OptionCollection($models);
    }

    public function __toString()
    {
        return $this->value;
    }
}