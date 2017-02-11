<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $primaryKey = 'message_id';
    protected $fillable = ['message_id', 'dest_id'];
    public $timestamps = false;

    public function message()
    {
    	return $this->belongsTo(Message::class, 'message_id');
    }

    public function dest_student()
    {
    	return $this->belongsTo(Student::class, 'dest_id');
    }

}
