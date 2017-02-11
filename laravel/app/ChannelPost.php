<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelPost extends Model
{

	//not useful at this moment
	protected $fillable = ['channel_id', 'post_id'];
	public $timestamps = false;
    public function channel()
    {
    	return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
    }
}
