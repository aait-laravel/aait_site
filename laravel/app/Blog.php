<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $primaryKey = 'blog_id';
	public $timestamps = false;
    public function text(){
    	return $this->belongsTo(Text::class, 'blog_id');
    }

    public function channel()
    {
    	return $this->belongsTo(Channel::class, 'channel_id');
    }

}
