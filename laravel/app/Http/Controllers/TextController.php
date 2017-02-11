<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\Text;
use DB;
use Auth;

class TextController extends Controller
{
    public function editText(Request $request, Text $text)
    {
        $this->validate($request, [
            'text_body' => 'required',
        ]);
    	$text->editText($request['text_body']);
        return redirect()->back();
    }

    public function commentText(Request $request, Text $text)
    {
        $this->validate($request, [
            'com_body' => 'required',
        ]);
        $student = Auth::user()->student;
        if($student)
        {
            $text->commentText($request['com_body'], $student->stud_id);
            return redirect()->back();
        }
        	
    }

    public function likeText(Text $text)
    {
        $student = Auth::user()->student;
        if($student)
        {
            $text->likeText($student->stud_id);
            return redirect()->back();
        }
        	
    }


    public function dislikeText(Text $text)
    {
        $student = Auth::user()->student;
        if($student)
        {
            $text->dislikeText($student->stud_id);
            return redirect()->back();
        }
        	
    }

    public function followText(Text $text)
    {
        $student = Auth::user()->student;
        if($student)
        {
            $text->followText($student->stud_id);
            return redirect()->back();
        }
        
    }

    public function unfollowText(Text $text)
    {
        $student = Auth::user()->student;
        if($student)
        {
            $text->unfollowText($student->stud_id);
            return redirect()->back();;
        }
            
    }
}
