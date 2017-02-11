<?php

namespace App\Http\Controllers;

use App\Text;
use App\ChannelPost;
use App\ChannelPublicMessage;
use App\Blog;
use App\Post;
use App\Channel;
use Auth;

use Illuminate\Http\Request;

class ChannelController extends Controller
{

	public function getChannels()
	{
		$channels = Channel::all();
        $active_side = 'channels';
		return view('channel.channels', compact('active_side'), compact('channels'));
	}

    public function addChannel(Request $request)
    {
        if($user = Auth::user())
        {
            $user->addChannel(new Channel($request->all()));
        }
        return redirect()->back();
    }
    public function getPosts(Channel $channel)
    {
    	$posts = $channel->channel_posts;
    	return view('posts', compact('posts'));
    }

    public function channelHome()
    {
    	return 'home';
    }

    public function getBlogs($channel_name)
    {
        $active_side = 'blogs';
        $channel = Channel::where('channel_name', $channel_name)->first();
        if($channel)
        {
            return view('channel.blogs', compact('active_side'), compact('blogs'));
        }
        else
        {
            return "No ".$channel_name." found!";
        }
    }

    public function getDiscussion()
    {
    	return 'discussion';
    }

    public function getQuestions()
    {
    	return 'questions';
    }

    public function addPost(Request $request, Channel $channel)
    {
        $this->validate($request, [
            'text_body' => 'required',
        ]);
    	$text = new Text;
    	$text->text_body = $request['text_body'];
    	$text->user_id = 1;
    	$text->save();
    	$text->post()->save(new Post)->channel_posts()->create(['channel_id'=>$channel->channel_id]);
    	return redirect()->back();
    }
}
