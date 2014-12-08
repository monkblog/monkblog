<?php

class Option extends \Eloquent {

    public static $rules = [
        'name' => 'required|unique:options',
        'value' => 'required',
    ];

    protected $autoload = true;

    protected $table = 'options';

	protected $fillable = [
        'name',
        'value',
        'autoload',
    ];

    public function __toString()
    {
        return $this->value;
    }
}