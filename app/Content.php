<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
   
   protected $fillable = [
        'user_id','title', 'abstract', 'text','image','category_id'
    ];

   public function category()
   {
   	 return $this->hasOne(Category::class);
   }
   public function tags()
   {
   	 return $this->belongsToMany(Tag::class);
   }
}
