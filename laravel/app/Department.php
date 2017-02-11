<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

	protected $primaryKey = 'dep_id';
    protected $fillable = ['head_id', 'dep_name', 'description'];

    public function stud_stuff()
    {
        return $this->belongsTo(StudStuff::class, 'head_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'department_id');
    }
	public function courses()
	{
		return $this->hasMany(Course::class, 'dep_id');
	}

    public function questions()
    {
        return $this->hasMany(DepartmentQuestion::class, 'dep_id');
    }

    
    public function department_public_messages()
    {
    	return $this->hasMany(DepartmentPublicMessage::class, 'dep_id');
    }

    public function department_announcements()
    {
    	return $this->hasMany(DepartmentAnnouncement::class, 'dep_id');
    }

    public function department_protests()
    {
    	return $this->hasMany(DepartmentProtest::class, 'dep_id');
    }

    public function department_questions()
    {
    	return $this->hasMany(DepartmentQuestion::class, 'dep_id');
    }

    public function department_posts()
    {
    	return $this->hasMany(DepartmentPost::class, 'dep_id');
    }

    public function department_group_messages()
    {
    	return $this->hasMany(DepartmentGroupMessage::class, 'dep_id');
    }

    public function addQuestion(Text $text)
    {
        return $text->question()->save(new Question)->department_question()->create(['dep_id'=>$this->dep_id]);;
    }

    public function addPublicMessage(Text $text)
    {
        return $text->message()->save(new Message)->public_message()->save(new PublicMessage)->department_public_message()->create(['dep_id'=>$this->dep_id]);
    }

    public function addPost(Text $text)
    {
        return $text->post()->save(new Post)->department_post()->create(['dep_id'=>$this->dep_id]);
    }

    public function addCourse(Course $course)
    {
        return $this->courses()->save($course);;
    }
}
