<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePost extends Model
{

	protected $fillable = ['course_id', 'post_id'];
    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
    }
}
