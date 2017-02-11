<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseGroupMessage extends Model
{
    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function group_chat()
    {
    	return $this->belongsTo(GroupChat::class, 'group_id');
    }
}
