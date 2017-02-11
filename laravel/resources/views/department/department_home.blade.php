@extends('layouts.aait_layout')

@section('content')
    <div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
        <div class="ibox-title">
            <h5>Add new course</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>                
            </div>
        </div>
        <div class="ibox-content no-padding">
            <div class="ibox-title">
                @include('department.add_course_form')
            </div>
            
        </div>
    </div>
    <div class="ibox float-e-margins">
        
        <div class="ibox-title">
            <h5>All Courses</h5>
            <div class="ibox-tools">
                <span class="label label-success-light pull-right">{{count($department->courses)}} Courses</span>
           </div>
        </div>
        
        <div class="ibox-content">

            <div>
                <div class="feed-activity-list">

                    @if(count($department->courses) > 0)
                        <ul class="list-group">
                            @foreach($department->courses as $course)
                                <li class="list-group-item" style="margin-bottom: 10px">
                                    <a href="/department/{{$department->dep_name}}/{{$course->name}}home">{{$course->course_name}} </a> | 
                                    <a href="/department/{{$department->dep_name}}/{{$course->name}}posts">Posts</a> | 
                                    <a href="/department/{{$department->dep_name}}/{{$course->name}}discussion">Discussion</a> | 
                                    <a href="/department/{{$department->dep_name}}/{{$course->name}}questions">Questions</a>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <p class="text-warnint">No Departments here</p>
                    @endif
                    <div class="feed-element">

                        <div class="media-body ">
                            <small class="pull-right">5m ago</small>
                            <strong>Monica Smith</strong> posted a new blog. <br>
                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                        </div>
                    </div>

                    
                </div>


                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>

            </div>

        </div>
    </div>
@stop