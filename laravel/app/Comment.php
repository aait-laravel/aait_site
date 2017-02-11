<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $primaryKey = 'comment_id';
	protected $fillable = ['com_text_id', 'text_id'];
    public function text()
    {
    	return $this->belongsTo(Text::class, 'text_id');
    }
}
