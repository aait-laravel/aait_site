<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    public function student()
    {
    	return $this->belongsToMany(Student::class, 'stud_id');
    }
    public function departments()
    {
    	return $this->belongsToMany(Department::class, 'dep_id');
    }
}
