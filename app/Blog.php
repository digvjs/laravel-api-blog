<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Category', 'blog_categories');
    }
}
