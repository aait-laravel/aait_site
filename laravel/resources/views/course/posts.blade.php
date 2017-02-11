@extends('layouts.post_layout')

@section('posts')
                <!-- <div class="feed-activity-list">


                    <div class="feed-element">
                        <a href="profile.html" class="pull-left">
                            <img alt="image" class="img-circle" src="/img/profile.jpg">
                        </a>
                        <div class="media-body ">
                            <small class="pull-right">5m ago</small>
                            <strong>Monica Smith</strong> posted a new blog. <br>
                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                            <div class="well">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-down"></i> Dislike </a>
                                <a class="btn btn-xs btn-white"><i class="fa fa-edit"></i> Edit </a>
                                <a class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i> Delete </a>
                                <a class="btn btn-xs btn-white"><i class="fa fa-feed"></i> Follow </a>
                            </div>

                        </div>
                    </div>
                    <div class="social-comment" style="margin-left: 40px">
                        <a href="#" class="pull-left">
                            <img alt="image" src="/img/a1.jpg" style="width: 30px; height:30px" class="img-rounded">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                Andrew's
                            </a>
                            Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words. 
                            <br>
                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                            <small class="text-muted">12.06.2014</small>
                        </div>
                    </div>

                </div> -->
           <!--  -->

        @if(count($course->course_posts) > 0)
            @foreach($course->course_posts as $course_post)
                <div class="feed-element">
                    <a href="{{url('/profile/{user}')}}" class="pull-left">
                        <img alt="image" class="img-circle" src="/img/profile/{{$course_post->post->text->user->avatar}}">
                    </a>
                    <div class="media-body ">
                        <small class="pull-right">{{$course_post->post->text->created_at->diffForHumans()}}</small>
                        <strong>{{$course_post->post->text->user->user_name}}</strong>
                        <small class="text-muted">{{ date('g:i a - j.F. Y ', strtotime($course_post->post->text->created_at))}}</small><br>
                        
                        <div class="well">
                            {{$course_post->post->text->text_body}}
                        </div>
                        
                            @if($course_post->post->text->user->id == Auth::user()->id)
                            <div class="pull-right">
                                <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$course_post->post->text->text_id}}" area-expanded="false" area-controls="collapseExample"><i class="fa fa-edit"></i> Edit </a>
                                <!-- <a class="btn btn-primary" data-toggle="collapse" href="#edit_post" aria-expanded="false" aria-controls="collapseExample">
                                    Link with href
                                </a> -->
                                <form action="{{$course_post->post->text->text_id}}/delete_post" method="post" style="display:inline-block">
                                {{csrf_field()}}
                                    <button class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i> Delete </button>
                                </form>
                                
                                
                            </div>
                            <div class="collapse" id="{{$course_post->post->text->text_id}}">
                              <div class="card card-block">
                                <form action="/text/{{$course_post->post->text->text_id}}/edit" method="post">
                                {{csrf_field()}}
                                    <textarea name="text_body" cols="80"> {{$course_post->post->text->text_body}}</textarea>
                                    <button type="submit" class="btn btn-xs btn-white"><i class="fa fa-save-o"></i> Update</button>
                                </form>
                              </div>
                            </div>
                            @else
                            @if(Auth::user()->student->liked_text($course_post->post->text->text_id) == "liked")
                                <div class="pull-left">
                                    <span class="fa fa-thumbs-up"> You liked this</span>
                                </div>
                            @elseif(Auth::user()->student->liked_text($course_post->post->text->text_id) == "disliked")
                                <div class="pull-left">
                                    <span class="fa fa-thumbs-down">You disliked this</span>
                                </div>
                            
                            @endif
                                
                            <div class="pull-right">
                                <a href="/text/{{$course_post->post->text->text_id}}/like" class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> {{$course_post->post->text->votes_up}} Like </a>
                                <a href="/text/{{$course_post->post->text->text_id}}/dislike" class="btn btn-xs btn-white"><i class="fa fa-thumbs-down"></i> {{$course_post->post->text->votes_down}} Dislike </a>
                                <a href="/text/{{$course_post->post->text->text_id}}/{{Auth::user()->student->followed_texts($course_post->post->text->text_id)}}" class="btn btn-xs btn-white"><i class="fa fa-feed"></i> 
                                    @if(Auth::user()->student->followed_texts($course_post->post->text->text_id) == "unfollow")
                                        Unfollow
                                    @else
                                        Follow
                                    @endif
                                </a>
                                <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$course_post->post->text->text_id}}-comment" area-expanded="false"><i class="fa fa-comments"></i></a>
                                <div class="collapse" id="{{$course_post->post->text->text_id}}-comment">
                                  <div class="card card-block">
                                    <form action="/text/{{$course_post->post->text->text_id}}/comment" method="post">
                                    {{csrf_field()}}
                                        <input type="text" placeholder="Your comment here..." name="com_body" style="width: 400px; height: 40px"/>
                                    </form>
                                  </div>
                                </div>
                            </div>   
                            @endif
                        
                        
                    </div>
                    <div class="social-footer">
                    @if(count($course_post->post->comments()) > 0)
                        Comments
                        @foreach($course_post->post->comments() as $comment)
                            <div class="social-comment" style="margin-left: 40px">
                                <a href="#" class="pull-left">
                                    <img alt="image" src="/img/profile/{{$comment->text->user->avatar}}" style="width: 30px; height:30px" class="img-rounded">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">{{$comment->text->created_at->diffForHumans()}}</small>
                                    <a href="#">
                                        {{$comment->text->user->user_name}}
                                    </a>
                                    {{$comment->text->text_body}}
                                    <br>
                                    <a href="/text/{{$comment->text->text_id}}/like" class="small"><i class="fa fa-thumbs-up"></i> {{$comment->text->votes_up}} Like this!</a> -
                                    <small class="text-muted">12.06.2014</small>
                                </div>
                            </div>
                        @endforeach
                            
                    @else
                        No comments
                    @endif
                        
                    </div>
                    <hr>
                </div>
            @endforeach
        @endif
@stop