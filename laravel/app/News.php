<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'news';

    public function stud_stuff()
    {
    	return $this->blongsTo(StudStuff::class, 'staff_id');
    }
}
