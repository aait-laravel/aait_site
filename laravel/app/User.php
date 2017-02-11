<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password','first_name', 'last_name', 'online'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function texts()
    {
        return $this->hasMany(Text::class, 'user_id');
    }

    public function channels()
    {
        return $this->hasMany(Channel::class, 'owner_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'stuff_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'source_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'stud_id');
    }

    public function stud_stuff()
    {
        return $this->hasOne(StudStuff::class, 'stuff_id');
    }

    public function addChannel(Channel $channel)
    {
        return $this->channels()->save($channel);
    }
    
}
