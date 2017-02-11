<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicAnnouncement extends Model
{
    public function announcement()
    {
    	return $this->belongsTo(Announcement::class, 'announcement_id');
    }
}
