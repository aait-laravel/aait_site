<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Student extends Model
{
    public $primaryKey = 'stud_id';
    protected $fillable = ['stud_id', 'department_id'];
    //public $incrementing = 'false';

    public function texts(){
        return $this->hasMany(Text::class, 'user_id');
    }

    public function channels()
    {
        return $this->hasMany(Channel::class, 'owener_id');
    }

    public function private_messages()
    {
        return $this->hasMany(PrivateMessage::class, 'dest_id');
    }
    public function chat_messages()
    {
        return $this->hasMany(ChatMessage::class, 'dest_id');
    }

    public function chat_received($sender_id)
    {
        $received_messages = $this->chat_messages;
        $sender_received = array();
        foreach($received_messages as $received_message)
        {
            $result = $received_message->message->text->user->id == $sender_id;
            $result ?  array_push($sender_received, [$received_message->message->text->text_body, $received_message->message->text->created_at]): null;
        }
        return $sender_received;
    }

    public function chat_sent($receiver_id)
    {
        $texts = $this->user->texts;
        $sent_messages = array();
        foreach($texts as $text)
        {
            if($text->message)
            {
                if($text->message->chat_message)
                {
                    $result = $text->message->chat_message->dest_id == $receiver_id;
                    $result ? array_push($sent_messages, [$text->text_body, $text->created_at]) : null;
                }
            }
            
        }
        return $sent_messages;
    }

    public function group_chats()
    {
        return $this->hasMany(GroupChat::class, 'creator_id');
    }

    public function groups()
    {
        $groups = DB::table('group_chat_users as gcu')->join('group_chats as gc', 'gcu.group_id', 'gc.group_id')->get();
        //$groups = DB::table('group_chat_users')->where('user_id', $this->user_id)->get();
        return $groups;
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    // public function questions()
    // {
    //  return $this->hasMany(Question::class, 'ques_id');
    // }
    
    // public function answers()
    // {
    //  return $this->hasMany(Answer::class, 'ans_id');
    // }

    public function courses()
    {
        return $this->hasMany(StudentCourse::class, 'stud_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'stud_id');
    }

    public function followed_texts($text)
    {
        $text = Text::find($text);
        $followed = DB::table('followed_text')->where('stud_id', $this->stud_id)->where('followed_text_id', $text->text_id)->first();
        if(count($followed) > 0)
        {
            return "unfollow";
        }
        else
        {
            return "follow";
        }
    }

    public function liked_text($text)
    {
        $text = Text::find($text);
        $liked = DB::table('liked_text')->where('stud_id', $this->stud_id)->where('liked_text_id', $text->text_id)->first();
        if(count($liked) > 0 )
        {
            if($liked->liked == 1)
            {
                return "liked";
            }
            else
            {
                return "disliked";
            }
            
        }
        else
        {
            return null;
        }
        return ;
    }

    public function requestDepartmentProtest(Department $department)
    {
        return ;
    }

    public function requestCourseProtest(Course $course)
    {
        return ;
    }

    public function requestPublicProtest()
    {
        return ;
    }

    public function approveDepartmentProtest(Department $department)
    {
        return ;
    }

    public function approveCourseProtest(Course $course)
    {
        return ;
    }

    public function approvePublicProtest()
    {
        return ;
    }

    public function deleteProtest()
    {
        return ;
    }


    /*** mailing part ***/
    public function createGroup($group_name)
    {
        return $this->group_chats()->create(['group_name'=>$group_name]);
    }

}
