@extends('layouts.aait_layout')

@section('content')

    @if(Auth::user()->stud_stuff)
    <div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
        <div class="ibox-title">
            <h5>Add new department</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>                
            </div>
        </div>
        <div class="ibox-content no-padding">
            <div class="ibox-title">
                @include('department.add_dep_form')
            </div>
            
        </div>
    </div>
    @endif
    <div class="ibox float-e-margins">
        
        <div class="ibox-title">
            <h5>All Departments</h5>
            <div class="ibox-tools">
                <span class="label label-success-light pull-right">{{count($departments)}} Departments</span>
           </div>
        </div>
        
        <div class="ibox-content">

            <div>
                <div class="feed-activity-list">

                    @if(count($departments) > 0)
                        <ul class="list-group">
                            @foreach($departments as $department)
                                <li class="list-group-item" style="margin-bottom: 10px">
                                    <a href="/department/{{$department->dep_name}}/home">{{$department->dep_name}} </a> | 
                                    <a href="/department/{{$department->dep_name}}/posts">Posts</a> | 
                                    <a href="/department/{{$department->dep_name}}/discussion">Discussion</a> | 
                                    <a href="/department/{{$department->dep_name}}/questions">Questions</a>
                                    <a href="/department/{{$department->dep_name}}/courses">Courses</a>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <p class="text-warnint">No Departments here</p>
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