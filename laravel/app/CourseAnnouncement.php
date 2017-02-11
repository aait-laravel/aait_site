<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseAnnouncement extends Model
{
    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function announcment()
    {
    	return $this->belongsTo(Announcment::class, 'announcment_id');
    }
}
