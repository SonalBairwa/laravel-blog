<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function contents()
    {
    	return $this->belongsToMany(Content::class);
    }
}
