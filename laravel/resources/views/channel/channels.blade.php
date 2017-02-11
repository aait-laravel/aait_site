@extends('layouts.aait_layout')

@section('content')
    <div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
        <div class="ibox-title">
            <h5>Add new channel</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>                
            </div>
        </div>
        <div class="ibox-content no-padding">
            <div class="ibox-title">
                @include('channel.add_channel_form')
            </div>
            
        </div>
    </div>
    <div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
        
        <div class="ibox-title">
            <h5>All Channels</h5>
            <div class="ibox-tools">
                <span class="label label-success-light pull-right">{{count($channels)}} Channels</span>
           </div>
        </div>
        
        <div class="ibox-content">

            <div>
                <div class="feed-activity-list">

                    @if(count($channels) > 0)
                        <ul class="list-group">
                            @foreach($channels as $channel)
                                <li class="list-group-item" style="margin-bottom: 10px">
                                    <a href="/channel/{{$channel->channel_name}}">{{$channel->channel_name}} </a> | 
                                    <a href="/channel/{{$channel->channel_name}}/blogs">Blogs</a> | 
                                    <a href="/channel/{{$channel->channel_name}}/discussion">Discussion</a> | 
                                    <a href="/channel/{{$channel->channel_name}}/bloggers">Questions</a>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <p class="text-warning">No Channels here</p>
                    @endif
                    <div class="feed-element">

                        <div class="media-body ">
                            <small class="pull-right"></small>
                            <strong></strong><br>
                            <small class="text-muted"></small>

                        </div>
                    </div>

                    
                </div>


                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>

            </div>

        </div>
    </div>
@stop