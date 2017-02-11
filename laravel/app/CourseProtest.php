<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseProtest extends Model
{
    
    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function protest()
    {
    	return $this->belongsto(Protest::class, 'protest_id');
    }
}
