<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protest extends Model
{
    protected $primaryKey = 'protest_id';

    protected $fillable = ['upvotes', 'downvotes', 'accepted'];

    public function public_protests()
    {
    	return $this->hasMany(PublicProtest::class, 'protest_id');
    }

    public function department_protests()
    {
    	return $this->hasMany(DepartmentProtest::class, 'protest_id');
    }

    public function course_protests()
    {
    	return $this->hasMany(CourseProtest::class, 'protest_id');
    }
}
