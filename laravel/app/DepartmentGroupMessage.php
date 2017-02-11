<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentGroupMessage extends Model
{
    public function department()
    {
    	return $this->belongsTo(Department::class, 'dep_id');
    }

    public function group_chat()
    {
    	return $this->belongsTo(GroupChat::class, 'group_id');
    }
}
