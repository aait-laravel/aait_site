<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $primaryKey = 'message_id';
    protected $fillable = ['dest_id', 'viewed', 'subject'];
    public $timestamps = false;

    public function message()
    {
    	return $this->belongsTo(Message::class, 'message_id');
    }
    public function user_dest()
    {
    	return $this->belongsTo(Student::class, 'dest_id');
    }
}
