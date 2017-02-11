<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMessage extends Model
{
    protected $primaryKey = 'group_id';
    public $timestamps = false;

    public function message()
    {
    	return $this->belongsTo(Message::class, 'message_id');
    }

    public function group_chat()
    {
    	return $this->belongsTo(GroupChat::class, 'group_id');
    }
}
