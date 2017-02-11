<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicPublicMessage extends Model
{
   	protected $fillabe = ['p_messsage_id'];
   	public $timestamps = false;

   	public function public_message()
   	{
   		return $this->belongsTo(PublicMessage::class, 'p_message_id');
   	}
}
