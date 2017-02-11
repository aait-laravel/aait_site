<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelPublicMessage extends Model
{
    public function channel()
    {
    	return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function public_message()
    {
    	return $this->belongsTo(PublicMessage::class, 'message_id');
    }
}
