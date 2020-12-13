<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Post extends Model
{
    //
    protected $fillable = ['title','content','image','slug'];

   public function categories(){
    	return $this->belongsToMany(Category::class, 'post_category');
	}
}
