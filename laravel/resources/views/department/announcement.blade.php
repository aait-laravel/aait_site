@extends('layouts.aait_layout')

@section('content')
    <div class="ibox float-e-margins" style = "margin-top:80p; margin-bottom: 30px">
        
        <div class="ibox-title">
            <h5>Your Department Announcements</h5>
            <div class="ibox-tools">
                <span class="label label-warning-light pull-right">{{count($department->department_announcements)}} Messages</span>
            </div>
        </div>
        
        @if($department->stud_stuff->stuff_id == Auth::user()->id)
            @include('department.add_announcement_form')
        @endif

        @if(count($department->department_announcements) > 0)
            @foreach($department->department_announcements as $department_announcement)
                <div class="feed-element">
                    <a href="{{url('/profile/')}}" class="pull-left">
                        <img alt="image" class="img-circle" src="/img/profile/{{$department_announcement->announcement->stud_stuff->user->avatar}}">
                    </a>
                    <div class="media-body ">
                        <small class="pull-right">{{$department_announcement->announcement->created_at->diffForHumans()}}</small>
                        <strong>{{$department_announcement->announcement->stud_stuff->user->user_name}}</strong>
                        <small class="text-muted">{{ date('g:i a - j.F. Y ', strtotime($department_announcement->announcement->created_at))}}</small><br>
                        <strong class="text-muted">{{$department_announcement->announcement->body}}</strong>
                        
                    </div>
                </div>
            @endforeach
            <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>
        @endif
    </div>
@stop