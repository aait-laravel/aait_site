@extends('layouts.aait_layout')

@section('content')
    <div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
        @include('includes.post_form')
        
    </div>
    <div class="ibox float-e-margins">
        
        <div class="ibox-title">
            <h5>Posts</h5>
            <div class="ibox-tools">
                <span class="label label-warning-light pull-right">10 Messages</span>
               </div>
        </div>
        
        <div class="ibox-content">

            <div>
                <div class="feed-activity-list">


                    <div class="feed-element">
                        <a href="profile.html" class="pull-left">
                            <img alt="image" class="img-circle" src="/img/a5.jpg">
                        </a>
                        <div class="media-body ">
                            <small class="pull-right">2h ago</small>
                            <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                            <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
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

                    
                </div>


                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>

            </div>

        </div>
    </div>
@stop