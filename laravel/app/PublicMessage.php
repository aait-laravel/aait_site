<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicMessage extends Model
{
    protected $fillable = ['message_id'];
    public $timestamps = false;

    public function message()
    {
    	return $this->belongsTo(Message::class, 'message_id');
    }

    public function course_public_message()
    {
    	return $this->hasOne(CoursePublicMessage::class, 'p_message_id');
    }

    public function department_public_message()
    {
    	return $this->hasOne(DepartmentPublicMessage::class, 'p_message_id');
    }

    public function public_public_message()
    {
        return $this->hasOne(PublicPublicMessage::class, 'p_message_id');
    }
}
