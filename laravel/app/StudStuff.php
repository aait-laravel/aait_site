<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudStuff extends Model
{
    protected $table = 'stud_stuff';
    protected $primaryKey = 'stuff_id';

    public function departments()
    {
    	return $this->hasMany(Department::class, 'head_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'stuff_id');
    }

    public function addDepartment(Department $department)
    {
    	return $this->departments()->save($department);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'stud_stuff');
    }
}
