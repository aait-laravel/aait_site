@extends('layouts.aait_layout')

@section('content')
    <div class="ibox float-e-margins" style = "margin-top:80p; margin-bottom: 30px">
        
        <div class="ibox-title">
            <h5>Your daily feed</h5>
            <div class="ibox-tools">
                <span class="label label-warning-light pull-right">{{count($public_messages)}} Messages</span>
               </div>
        </div>
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <strong>{{ $error }} </strong>
                    @endforeach
            </div>
        @endif

        @if(count($public_messages) > 0)
            @foreach($public_messages as $public_message)
                <div class="feed-element">
                    <a href="{{url('/profile/{user}')}}" class="pull-left">
                        <img alt="image" class="img-circle" src="/img/profile/{{$public_message->public_message->message->text->user->avatar}}">
                    </a>
                    <div class="media-body ">
                        <small class="pull-right">{{$public_message->public_message->message->text->created_at->diffForHumans()}}</small>
                        <strong>{{$public_message->public_message->message->text->user->user_name}}</strong>
                        <small class="text-muted">{{ date('g:i a - j.F. Y ', strtotime($public_message->public_message->message->text->created_at))}}</small><br>
                        <strong class="text-muted">{{$public_message->public_message->message->text->text_body}}</strong>
                        
                            @if($public_message->public_message->message->text->user->id == Auth::user()->id)
                            <div class="pull-right">
                                <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$public_message->public_message->message->text->text_id}}" area-expanded="false" area-controls="collapseExample"><i class="fa fa-edit"></i> Edit </a>
                                <form action="{{$public_message->public_message->message->text->text_id}}/delete_post" method="post" style="display:inline-block">
                                {{csrf_field()}}
                                    <button class="btn btn-xs btn-white"><i class="fa fa-trash-o"></i> Delete </button>
                                </form>
                            </div>    
                            @endif
                        
                        <div class="collapse" id="{{$public_message->public_message->message->text->text_id}}">
                          <div class="card card-block">
                            <form action="/text/{{$public_message->public_message->message->text->text_id}}/edit" method="post">
                            {{csrf_field()}}
                                <textarea name="text_body" cols="80"> {{$public_message->public_message->message->text->text_body}}</textarea>
                                <button type="submit" class="btn btn-xs btn-white"><i class="fa fa-save-o"></i> Update</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>
        @endif
    </div>
@stop