<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentPost extends Model
{
	protected $fillable = ['dep_id'];
    public function department()
    {
    	return $this->belongsTo(Department::class, 'dep_id');
    }

    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id');
    }
}
