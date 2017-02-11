<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseQuestion extends Model
{
	protected $fillable = ['course_id', 'ques_id'];
	public $timestamps = false;
	
    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function question()
    {
    	return $this->belongsTo(Question::class, 'ques_id');
    }
}
