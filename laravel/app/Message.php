<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message_id'];
    public $timestamps = false;

    public function text()
    {
    	return $this->belongsTo(Text::class, 'message_id');
    }

    public function group_message()
    {
    	return $this->hasOne(GroupMessage::class, 'message_id');
    }
    public function public_message()
    {
    	return $this->hasOne(PublicMessage::class, 'message_id');
    }

    public function private_message()
    {
    	return $this->hasOne(PrivateMessage::class, 'message_id');
    }

    public function chat_message()
    {
    	return $this->hasOne(ChatMessage::class, 'message_id');
    }
}
