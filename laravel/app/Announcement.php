<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $primaryKey = 'announ_id';
    protected $fillable = ['body', 'subject', 'announ_tag_id', 'stuff_id'];

    public function stud_stuff()
    {
    	return $this->belongsTo(StudStuff::class, 'stuff_id');
    }

    public function department_announcements()
    {
    	return $this->hasMany(DepartmentAnnouncement::class, 'announcement_id');
    }

    public function public_announcements()
    {
    	return $this->hasMany(PublicAnnouncement::class, 'announcement_id');
    }
}
