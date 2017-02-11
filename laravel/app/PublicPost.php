<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicPost extends Model
{
	protected $fillable = ['post_id'];
	
    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
    }

}
