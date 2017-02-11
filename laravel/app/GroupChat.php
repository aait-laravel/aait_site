<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class GroupChat extends Model
{
    protected $priamryKey = 'group_id';
    protected $fillable = ['creator_id', 'group_name'];

    public function student()
    {
    	return $this->belongsTo(Student::class, 'creator_id');
    }

    public function group_messages()
    {
    	return $this->hasMany(GroupMessage::class, 'group_id');
    }

    public function users()
    {
    	$users = DB::table('group_chat_users')->where('group_id', $this->group_id)->get();
    	return $users;
    }

    public function updateName($group_name)
    {
    	$group->group_name = $group_name;
    	return $group->save();
    }
}
