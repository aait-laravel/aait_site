<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePublicMessage extends Model
{
	protected $fillable = ['course_id'];
	public $timestamps = false;
    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function public_message()
    {
    	return $this->belongsTo(PublicMessage::class, 'p_message_id');
    }
}
