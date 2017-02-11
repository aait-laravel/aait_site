<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentPublicMessage extends Model
{
	protected $fillable = ['dep_id', 'p_message_id'];
	public $timestamps = false;
    public function department()
    {
    	return $this->belongsTo(Department::class, 'dep_id');
    }

    public function public_message()
    {
    	return $this->belongsTo(PublicMessage::class, 'p_message_id');
    }
}
