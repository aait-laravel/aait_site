<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentQuestion extends Model
{
	protected $fillable = ['dep_id', 'ques_id'];
    public function department()
    {
    	return $this->belongsTo(Department::class, 'dep_id');
    }

    public function question()
    {
    	return $this->belongsTo(Question::class, 'ques_id');
    }
}
