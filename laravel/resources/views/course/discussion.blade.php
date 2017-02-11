@extends('layouts.aait_layout')

@section('content')
    <div class="ibox float-e-margins" style = "margin-top:80p; margin-bottom: 30px">
        
        <div class="ibox-title">
            <h5>Your daily feed</h5>
            <div class="ibox-tools">
                <span class="label label-warning-light pull-right">{{count($course->course_public_messages)}} Messages</span>
               </div>
        </div>
        

        @if(count($course->course_public_messages) > 0)
            @foreach($course->course_public_messages as $course_public_message)
                <div class="feed-element">
                    <a href="{{url('/profile/{user}')}}" class="pull-left">
                        <img alt="image" class="img-circle" src="/img/profile/{{$course_public_message->public_message->message->text->user->avatar}}">
                    </a>
                    <div class="media-body ">
                        <small class="pull-right">{{$course_public_message->public_message->message->text->created_at->diffForHumans()}}</small>
                        <strong>{{$course_public_message->public_message->message->text->user->user_name}}</strong>
                        <small class="text-muted">{{ date('g:i a - j.F. Y ', strtotime($course_public_message->public_message->message->text->created_at))}}</small><br>
                        <strong class="text-muted">{{$course_public_message->public_message->message->text->text_body}}</strong>
                        
                            @if($course_public_message->public_message->message->text->user->id == Auth::user()->id)
                            <div class="pull-right">
                                <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$course_public_message->public_message->message->text->text_id}}" area-expanded="false" area-controls="collapseExample"><i class="fa fa-edit"></i> Edit </a>
                                <form action="{{$course_public_message->public_message->message->text->text_id}}/delete_message" method="post" style="display:inline-block">
                                {{csrf_field()}}
                                    <button class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i> Delete </button>
                                </form>
                            </div>
                            @endif
                        
                        <div class="collapse" id="{{$course_public_message->public_message->message->text->text_id}}">
                          <div class="card card-block">
                            <form action="/text/{{$course_public_message->public_message->message->text->text_id}}/edit" method="post">
                            {{csrf_field()}}
                                <textarea name="text_body" cols="80"> {{$course_public_message->public_message->message->text->text_body}}</textarea>
                                <button type="submit" class="btn btn-xs btn-white"><i class="fa fa-save-o"></i> Update</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@stop