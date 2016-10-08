<?php

namespace MonkBlog\Models;

use Illuminate\Database\Eloquent\Model;

class OptionTab extends Model
{
    protected $table = 'option_tabs';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany('MonkBlog\Models\Option');
    }
}
