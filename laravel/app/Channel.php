<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $primaryKey = 'channel_id';
    protected $fillable = ['owener_id', 'channel_name', 'description', 'subscribers_size'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'owner_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'owner_id');
    }

    public function channel_public_messages()
    {
    	return $this->hasMany(ChannelPublicMessage::class, 'channel_id');
    }

    public function blogs()
    {
    	return $this->hasMany(Blog::class, 'channel_id');
    }
    
}
