<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicProtest extends Model
{
    public function protest()
    {
    	return $this->belongsTo(Protest::class, 'protest_id');
    }
}
