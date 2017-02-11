<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Text;
use DB;


class PostController extends Controller
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
    	$text->commentText($request['com_body'], 1);
    	return redirect()->back();
    }

    public function likeText(Text $text)
    {
    	$text->likeText(1);
    	
    	return redirect()->back();
    }


    public function dislikeText(Text $text)
    {
    	$text->dislikeText(1);    	
    	return redirect()->back();
    }
}
