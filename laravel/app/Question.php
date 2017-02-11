<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['course_id', 'ques_id'];
    public $timestamps = false;

    public function text()
    {
    	return $this->belongsTo(Text::class, 'ques_id');
    }

    public function course_question()
    {
    	return $this->hasOne(CourseQuestion::class, 'ques_id');
    }

    public function department_question()
    {
    	return $this->hasOne(DepartmentQuestion::class, 'ques_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'ques_id');
    }

}
