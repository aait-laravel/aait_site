<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentProtest extends Model
{
    public function department()
    {
    	return $this->belongsTo(Department::class, 'dep_id');
    }

    public function protest()
    {
    	return $this->belongsTo(Protest::class, 'protest_id');
    }
}
