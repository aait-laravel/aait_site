<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $primaryKey = 'course_id';

	public function department()
	{
		return $this->belongsTo(Department::class, 'dep_id');
	}
    public function course_public_messages()
    {
    	return $this->hasMany(CoursePublicMessage::class, 'course_id');
    }

    public function course_announcements()
    {
    	return $this->hasMany(CourseAnnouncement::class, 'course_id');
    }

    public function course_protests()
    {
    	return $this->hasMany(CourseProtest::class, 'course_id');
    }

    public function course_questions()
    {
    	return $this->hasMany(CourseQuestion::class, 'course_id');
    }

    public function course_posts()
    {
    	return $this->hasMany(CoursePost::class, 'course_id');
    }

    public function course_group_messages()
    {
    	return $this->hasMany(CourseGroupMessage::class, 'course_id');
    }

    public function addPost(Text $text)
    {
        return $text->post()->save(new Post)->course_post()->create(['course_id'=>$this->course_id]);
    }

    public function addPublicMessage(Text $text)
    {
        return $text->message()->save(new Message)->public_message()->save(new PublicMessage)->course_public_message()->create(['course_id'=>$this->course_id]);
    }
}
