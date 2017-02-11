<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentAnnouncement extends Model
{
	public $timestamps = false;
	protected $fillable = ['announcement_id', 'dep_id'];
	
    public function department()
    {
    	return $this->belongsTo(Department::class, 'dep_id');
    }

    public function announcement()
    {
    	return $this->belongsTo(Announcement::class, 'announcement_id');
    }
}
