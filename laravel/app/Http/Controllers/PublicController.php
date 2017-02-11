<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublicPost;
use App\Post;
use App\PublicMessage;
use App\PublicPublicMessage;
use App\Message;
use App\PublicAnnouncement;
use App\Announcement;
use App\PublicProtest;
use App\Protest;
use App\News;
use App\Text;
use Auth;
use Image;

class PublicController extends Controller
{

    public function home()
    {
        return view('public.home');
    }
    public function getPosts()
    {
    	$public_posts = PublicPost::all();
        $active_side = 'posts';
    	//return $public_posts;
    	return view('public.posts', compact('active_side'), compact('public_posts'));
    }

    public function getDiscussion()
    {
        $public_messages = PublicPublicMessage::all();
        $active_side = 'discussion';
        return view('public.discussion', compact('active_side'), compact('public_messages'));
    }

    public function getAnnouncements()
    {
        $announcement = PublicAnnouncement::all();
        return $announcement;
    }

    public function getNews()
    {
        $news = News::all();
        return $news;
    }

    public function getProtests()
    {
        $protests = PublicProtest::all();
        return $protests;
    }

    public function addPost(Request $request)
    {
        $this->validate($request, [
            'text_body' => 'required',
        ]);
        $student = Auth::user()->student;
        if($student)
        {
            $text = Text::addText($request->text_body, $student->stud_id);
            
            if($request->hasFile('post_image'))
            {
                $image = $request['post_image'];
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save(public_path('/img/text/' . $image_name));
                $text->addFile($image_name);
                $text->post()->save(new Post)->public_post()->save(new PublicPost);
            }
            return redirect()->back();
        }
        return 'errror';
    }

    public function addPublicMessage(Request $request)
    {
        $this->validate($request, [
            'message_body' => 'required',
        ]);
        $student = Auth::user()->student;
        if($student)
        {
            $text = Text::addText($request->message_body, $student->stud_id);
            $text->message()->save(new Message)->public_message()->save(new PublicMessage)->public_public_message()->save(new PublicPublicMessage);
        }

        return redirect()->back();
    }

    public function deletePublicMessage(Request $request, Text $message)
    {
        $message->message->public_message->public_public_message->delete();
        $message->message->public_message->delete();
        $message->message->delete();
        $message->delete();
        return redirect()->back();
    }
    //add News, Announcements, 

}
