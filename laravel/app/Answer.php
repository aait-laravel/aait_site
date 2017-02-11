<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	protected $primaryKey = 'ans_id';
	protected $fillable = ['ques_id', 'editor_id', 'ans_id'];
	public $timestamps = false;
	public function text()
	{
		return $this->belongsTo(Text::class, 'ans_id');
	}
    public function question()
    {
    	return $this->belongsTo(Question::class, 'ques_id');
    }
}
