<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['post_id', 'follows', 'likes'];

	public function text()
	{
		return $this->belongsTo(Text::class, 'post_id');
	}

	public function department_post()
	{
		return $this->hasOne(DepartmentPost::class, 'post_id');
	}

	public function course_post()
	{
		return $this->hasOne(CoursePost::class, 'post_id');
	}

	public function public_post()
	{
		return $this->hasOne(PublicPost::class, 'post_id');
	}

	public function comments()
	{
		return Comment::where('com_text_id', $this->post_id)->get();
	}

	public function add_public_post(PublicPost $public_post)
	{
		return $this->public_post()->save($public_post);
	}
}
