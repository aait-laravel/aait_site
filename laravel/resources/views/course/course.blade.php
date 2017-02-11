@extends('layouts.app')


@section('content')
    <!-- <section class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Course</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="storecourse">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dep_name') ? ' has-error' : '' }}">
                            <label for="course_name" class="col-md-4 control-label">Course Name</label>

                            <div class="col-md-6">
                                <input id="course_name" type="text" class="form-control" name="course_name" value="{{ old('course_name') }}" required autofocus>

                                @if ($errors->has('dep_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dep_name') ? ' has-error' : '' }}">
                            <label for="ins_name" class="col-md-4 control-label">Instructor Name</label>

                            <div class="col-md-6">
                                <input id="ins_name" type="text" class="form-control" name="ins_name" value="{{ old('ins_name') }}" required autofocus>

                                @if ($errors->has('ins_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ins_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('course_code') ? ' has-error' : '' }}">
                            <label for="course_code" class="col-md-4 control-label">Course Code</label>

                            <div class="col-md-6">
                                <input id="course_code" type="text" class="form-control" name="course_code" value="{{ old('course_code') }}" required autofocus>

                                @if ($errors->has('course_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-4">
                                <textarea id="description" class="form-control" name="description" rows="5" cols="5" value="{{old('description')}}" required autofocus></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Add Course
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section> -->
    
    <section class="row">
        <div class="col-md-6 col-md-offset-3">
            <header>Courses</header>
        </div>
    </section>

    <section class="row">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Posts Section
                </div>
                <div class="panel-body">
                	<form role="form" method="POST" action="{{$course->course_id}}/post">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
                            
                            Post
                            <div class="">
                                <input id="post_body" type="text" class="form-control" name="post_body" value="{{ old('post_body') }}" required autofocus>

                                @if ($errors->has('post_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
	                            <div class="">
	                                <button type="submit" class="btn btn-primary">
	                                    Post
	                                </button>
	                            </div>
	                        </div>
                        </div>
                    </form>
                	@if(count($course->course_posts) > 0)
	                    <ul class="list-group">
	                    	@foreach($course->course_posts as $course_post)
	                    		<p class="text-sucess">{{$course_post->post->text->text_body}}</p>
	                    	@endforeach
	                        
	                    </ul>
	                @else
	                	<h4 class="text-info">No Posts so far</h4>
	                @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Questsion Section
                </div>
                <div class="panel-body">

                	<form role="form" method="POST" action="{{$course->course_id}}/ask">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
                            
                            Question
                            <div class="">
                                <input id="ques_body" type="text" class="form-control" name="ques_body" value="{{ old('ques_body') }}" required autofocus>

                                @if ($errors->has('ques_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ques_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
	                            <div class="">
	                                <button type="submit" class="btn btn-primary">
	                                    Ask
	                                </button>
	                            </div>
	                        </div>
                        </div>
                    </form>
                	@if(count($course->course_questions) > 0)
	                    <ul class="list-group">
	                    	@foreach($course->course_questions as $course_question)
	                    		<p class="text-sucess"> {{$course_question->question->text->text_body}}</p>
	                    	@endforeach
	                        
	                    </ul>
	                @else
	                	<h4 class="text-info">No Questions so far</h4>
	                @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Discussion Section
                </div>
                <div class="panel-body">

                	<form role="form" method="POST" action="{{$course->course_id}}/add_message">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('message_body') ? ' has-error' : '' }}">
                            
                            Message
                            <div class="">
                                <input id="message_body" type="text" class="form-control" name="message_body" value="{{ old('message_body') }}" required autofocus>

                                @if ($errors->has('message_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
	                            <div class="">
	                                <button type="submit" class="btn btn-default">
	                                    Protests
	                                </button>
	                            </div>
	                        </div>
                        </div>
                    </form>
                	@if(count($course->course_public_messages) > 0)
	                    <ul class="list-group">
	                    	@foreach($course->course_public_messages as $course_discussion)
	                    		<p class="text-sucess"> {{$course_discussion->public_message->message->text->text_body}}</p>
	                    	@endforeach
	                        
	                    </ul>
	                @else
	                	<h4 class="text-info">No Discussion so far</h4>
	                @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Protests Section
                </div>
                <div class="panel-body">

                	<form role="form" method="POST" action="{{$course->course_id}}/add_protest">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('protest_body') ? ' has-error' : '' }}">
                            
                            New Protest
                            <div class="">
                                <input id="protest_body" type="text" class="form-control" name="protest_body" value="{{ old('protest_body') }}" required autofocus>

                                @if ($errors->has('post_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('protest_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
	                            <div class="">
	                                <button type="submit" class="btn btn-primary">
	                                    Protest
	                                </button>
	                            </div>
	                        </div>
                        </div>
                    </form>
                	@if(count($course->protests) > 0)
	                    <ul class="list-group">
	                    	@foreach($course->protests as $protest)
	                    		<li class="list-group-item"> <a href="#">Questions</a></li>
		                        <li class="list-group-item"> <a href="#">Posts</a></li>
		                        <li class="list-group-item"> <a href="#">Discussion</a></li>
	                    	@endforeach
	                        
	                    </ul>
	                @else
	                	<h4 class="text-info">No Protests so far</h4>
	                @endif
                </div>
            </div>
        </div>

    </section>
    
@stop