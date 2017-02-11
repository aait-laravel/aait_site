@extends('layouts.post_layout')

@section('posts')
   
<!--  -->
    @if(count($department->department_posts) > 0)
        @foreach($department->department_posts as $department_post)
            <div class="feed-element">
                <a href="{{url('/profile/{user}')}}" class="pull-left">
                    <img alt="image" class="img-circle" src="/img/profile/{{$department_post->post->text->user->avatar}}">
                </a>
                <div class="media-body ">
                    <small class="pull-right">{{$department_post->post->text->created_at->diffForHumans()}}</small>
                    <strong>{{$department_post->post->text->user->user_name}}</strong>
                    <small class="text-muted">{{ date('g:i a - j.F. Y ', strtotime($department_post->post->text->created_at))}}</small><br>
                    
                    <div class="well">
                        <p>{{$department_post->post->text->text_body}}</p>
                        @if(count($department_post->post->text->files) > 0)
                            @foreach($department_post->post->text->files as $file)
                                <img src="/img/text/{{$file->file_reference}}" class="img-responsive" style="width:300px;height:300px">
                            @endforeach
                        @endif
                    </div>
                    
                        @if($department_post->post->text->user->id == Auth::user()->id)
                        <div class="pull-right">
                            <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$department_post->post->text->text_id}}" area-expanded="false" area-controls="collapseExample"><i class="fa fa-edit"></i> Edit </a>
                            <!-- <a class="btn btn-primary" data-toggle="collapse" href="#edit_post" aria-expanded="false" aria-controls="collapseExample">
                                Link with href
                            </a> -->
                            <form action="{{$department_post->post->text->text_id}}/delete_post" method="post" style="display:inline-block">
                            {{csrf_field()}}
                                <button type="submit" class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i> Delete </button>
                            </form>
                            <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$department_post->post->text->text_id}}-comment" area-expanded="false"><i class="fa fa-comments"></i></a>
                            
                            
                            
                        </div>
                        <div class="collapse" id="{{$department_post->post->text->text_id}}-comment">
                          <div class="card card-block">
                            <form action="/text/{{$department_post->post->text->text_id}}/comment" method="post">
                            {{csrf_field()}}
                                <input type="text" placeholder="Your comment here..." name="com_body" style="width: 400px; height: 40px"/>
                          
                            </form>
                          </div>
                        </div>
                        <div class="collapse" id="{{$department_post->post->text->text_id}}">
                          <div class="card card-block">
                            <form action="/text/{{$department_post->post->text->text_id}}/edit" method="post">
                            {{csrf_field()}}
                                <textarea name="text_body" cols="80"> {{$department_post->post->text->text_body}}</textarea>
                                <button type="submit" class="btn btn-xs btn-white"><i class="fa fa-save-o"></i> Update</button>
                            </form>
                          </div>
                        </div>
                        @else

                        @if(Auth::user()->student->liked_text($department_post->post->text->text_id) == "liked")
                            <div class="pull-left">
                                <span class="fa fa-thumbs-up"> You liked this</span>
                            </div>
                        @elseif(Auth::user()->student->liked_text($department_post->post->text->text_id) == "disliked")
                            <div class="pull-left">
                                <span class="fa fa-thumbs-down">You disliked this</span>
                            </div>
                        
                        @endif
                            
                        <div class="pull-right">
                            <a href="/text/{{$department_post->post->text->text_id}}/like" class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> {{$department_post->post->text->votes_up}} Like </a>
                            <a href="/text/{{$department_post->post->text->text_id}}/dislike" class="btn btn-xs btn-white"><i class="fa fa-thumbs-down"></i> {{$department_post->post->text->votes_down}} Dislike </a>
                            <a href="/text/{{$department_post->post->text->text_id}}/{{Auth::user()->student->followed_texts($department_post->post->text->text_id)}}" class="btn btn-xs btn-white"><i class="fa fa-feed"></i> 
                                @if(Auth::user()->student->followed_texts($department_post->post->text->text_id) == "unfollow")
                                    Unfollow
                                @else
                                    Follow
                                @endif
                            </a>
                            <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$department_post->post->text->text_id}}-comment" area-expanded="false"><i class="fa fa-comments"></i></a>
                            <div class="collapse" id="{{$department_post->post->text->text_id}}-comment">
                              <div class="card card-block">
                                <form action="/text/{{$department_post->post->text->text_id}}/comment" method="post">
                                {{csrf_field()}}
                                    <input type="text" placeholder="Your comment here..." name="com_body" style="width: 400px; height: 40px"/>
                              
                                </form>
                              </div>
                            </div>
                        </div>   
                        @endif
                    
                    
                </div>
                <div class="social-footer">
                @if(count($department_post->post->comments()) > 0)
                    Comments
                    @foreach($department_post->post->comments() as $comment)
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
                                <a href="/text/{{$comment->text->text_id}}/like" class="small"><i class="fa fa-thumbs-up"></i> {{$comment->text->votes_up}} Like this!</a>
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