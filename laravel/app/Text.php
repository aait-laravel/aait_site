<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Text extends Model
{
	public $primaryKey = 'text_id';
    protected $fillable = ['text_body', 'votes_up', 'votes_down', 'edited'];
    
    public function student(){
    	return $this->belongsTo(Student::class, 'user_id');
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function blog()
    {
    	return $this->hasOne(Blog::class, 'blog_id');
    }

    public function message()
    {
    	return $this->hasOne(Message::class, 'message_id');
    }
    public function question()
    {
    	return $this->hasOne(Question::class, 'ques_id');
    }

    public function answer()
    {
    	return $this->hasOne(Answer::class, 'ans_id');
    }

    public function protest()
    {
    	return $this->hasOne(Protest::class, 'protest_id');
    }

    public function post()
    {
    	return $this->hasOne(Post::class, 'post_id');
    }

    public function comment()
    {
    	return $this->hasOne(Comment::class, 'text_id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'text_id');
    }

    // public function addPost(Post $post)
    // {
    //     return $this->post()->save($post);
    // }

    public function addFile($file_name)
    {
        return $this->files()->create(['file_reference'=>$file_name, 'description'=>'question_image']);
    }


    public static function addText($text_body, $user_id)
    {
        $text = new Text;
        $text->text_body = $text_body;
        $text->user_id = $user_id;
        $text->save();
        return $text;
    }

    public function editText($text_body)
    {
        return $this->update(['text_body'=> $text_body, 'edited'=>true]);
    }

    public function commentText($com_body, $user_id)
    {
        $com_text = new Text;
        $com_text->text_body = $com_body;
        $com_text->user_id = $user_id;
        $com_text->save();

        return $com_text->comment()->create(['com_text_id'=>$this->text_id]);
    }

    public function likeText($stud_id)
    {
        $liked_text = DB::table('liked_text')->where('stud_id', $stud_id)->where('liked_text_id', $this->text_id);
        if($liked_text->first())
        {
            if($liked_text->first()->liked == true)
            {
                //was liked now wants to drop
                $this->update(['votes_up' => $this->votes_up - 1]);
                return $liked_text->delete();
            }
            else if($liked_text->first()->liked == false)
            {
                //was voted down and now want to vote up
                $this->update(['votes_up' => $this->votes_up + 1]);
                $this->update(['votes_down' => $this->votes_down - 1]);
                return $liked_text->update(['liked' => true]);
            }
        }
            
        else
        {
            $this->update(['votes_up'=>$this->votes_up + 1]);
            return DB::table('liked_text')->insert(['stud_id'=> $stud_id, 'liked_text_id'=>$this->text_id, 'liked' => true]);
        }
    }


    public function dislikeText($stud_id)
    {
        $liked_text = DB::table('liked_text')->where('stud_id', $stud_id)->where('liked_text_id', $this->text_id);
        if($liked_text->first())
        {
            if($liked_text->first()->liked == false)
            {
                $this->update(['votes_down' => $this->votes_down - 1]);
                return $liked_text->delete(); //drop dislike
            }
            else if($liked_text->first()->liked == true)
            {
                //dislike a liked text
                $this->update(['votes_up' => $this->votes_up - 1]);
                $this->update(['votes_down' => $this->votes_down + 1]);
                return $liked_text->update(['liked' => false]); // dislike a liked text
            }
        }
            
        else
        {
            $this->update(['votes_down' => $this->votes_down + 1]);
            return DB::table('liked_text')->insert(['stud_id'=> $stud_id, 'liked_text_id'=>$this->text_id, 'liked'=> false]); //dislike
        }
    }

    public function followText($stud_id)
    {
        $followed_text = DB::table('followed_text')->where('stud_id', $stud_id)->where('followed_text_id', $this->text_id);
        if($followed_text->first())
        {
            //return already following;
            return true;
        }
        else
        {
            return DB::table('followed_text')->insert(['stud_id'=>$stud_id, 'followed_text_id'=>$this->text_id]);
        }
    }

    public function unfollowText($stud_id)
    {
        $followed_text = DB::table('followed_text')->where('stud_id', $stud_id)->where('followed_text_id', $this->text_id);
        if($followed_text->first())
        {
            //unfollow here
            return $followed_text->delete();
        }
        else
        {
            //already not following text
            return true;
        }
    }


}
