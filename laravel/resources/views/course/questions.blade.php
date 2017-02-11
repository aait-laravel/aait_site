@extends('layouts.aait_layout')

@section('content')
	
	<div class="social-feed-box">
		@include('includes.add_question_form')
		{{$course->course_name}}'s Questions

    
        @if(count($course->course_questions) > 0)
        	<div class="social-feed-box">
	        	@foreach($course->course_questions as $course_question)
	        		<div class="pull-right social-action dropdown">
			            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
			                <i class="fa fa-angle-down"></i>
			            </button>
			            <ul class="dropdown-menu m-t-xs">
			                <li><a href="#">Config</a></li>
			            </ul>
			        </div>
			        <div class="social-avatar">
			        	<div class="vote-actions">
		                    <a href="/text/{{$course_question->question->text->text_id}}/like">
		                        <i class="fa fa-chevron-up"> </i>
		                    </a>
		                    <div>{{$course_question->question->text->votes_up - $course_question->question->text->votes_down}}</div>
		                    <a href="/text/{{$course_question->question->text->text_id}}/dislike">
		                        <i class="fa fa-chevron-down"> </i>
		                    </a>
		                </div>
			            <a href="#" class="pull-left">
			                <img alt="image" src="/img/profile/{{$course_question->question->text->user->avatar}}">
			            </a>
			            <div class="media-body">
			            	<small class="pull-right">{{$course_question->question->text->created_at->diffForHumans()}}</small>
			                <a href="#">
			                    {{$course_question->question->text->user->user_name}}
			                </a>
			                <small class="text-muted">{{ date('g:i a - j.F. Y ', strtotime($course_question->question->text->created_at))}}</small>
			            </div>
			        </div>
			        <div class="social-body">
			            <p>
			                {{$course_question->question->text->text_body}}
			                <!-- question body -->
			            </p>
			            @if(count($course_question->question->text->files) > 0)
			            	@foreach($course_question->question->text->files as $file)
			            		<img src="/img/text/{{$file->file_reference}}" class="img-responsive" style="width:300px;height:300px">
			            	@endforeach
			            @endif
			            
			            <div class="btn-group">
			                <a href="/text/{{$course_question->question->text->text_id}}/{{Auth::user()->student->followed_texts($course_question->question->text->text_id)}}" class="btn btn-xs btn-white"><i class="fa fa-feed"></i> 
                                    @if(Auth::user()->student->followed_texts($course_question->question->text->text_id) == "unfollow")
                                        Unfollow
                                    @else
                                        Follow
                                    @endif
                                </a>

                            <a class="btn btn-xs btn-white" data-toggle="collapse" href="#{{$course_question->question->text->text_id}}-comment" area-expanded="false"><i class="fa fa-comments"></i></a>
			                
			            </div>
			            <div class="collapse" id="{{$course_question->question->text->text_id}}-comment">
                          <div class="card card-block">
                            <form action="/text/{{$course_question->question->text->text_id}}/comment" method="post">
                            {{csrf_field()}}
                                <input type="text" placeholder="Your comment here..." name="com_body" style="width: 400px; height: 40px"/>
                          
                            </form>
                          </div>
                        </div>
			        </div>
			        <div class="social-footer">
			            

			            @if(count($course_question->question->answers) > 0)
			            	@foreach($course_question->question->answers as $answer)
			            		<div class="social-comment">
			            			<small class="pull-right">{{$answer->text->created_at->diffForHumans()}}</small>
			            			<a href="{{$course_question->question->id}}/{{$answer->ans_id}}/approve" class="btn 
			            			@if($course_question->question->answered && $answer->ans_id == $course_question->question->ans_id)
			            			btn-success
			            			@else
			            			btn-default
			            			@endif
			            			btn-sm btn-circle pull-left" type="button"><i class="fa fa-check"></i>
                            		</a>
					                <a href="#" class="pull-left">
					                    <img alt="image" src="/img/profile/{{$answer->text->user->avatar}}">
					                </a>
					                <div class="media-body">
					                    <a href="#">
					                        {{$answer->text->user->user_name}}
					                    </a>
					                    {{$answer->text->text_body}}
					                    <br>
					                    <a href="/text/{{$answer->text->text_id}}/like" class="small"><i class="fa fa-thumbs-up"></i> {{$answer->text->votes_up}} Like this!</a>
					                </div>
					            </div>
			            	@endforeach

			            @else
			            	No answers yet
			            @endif

			            <div class="social-comment">
			                <a href="#" class="pull-left">
			                    <img alt="image" src="/img/profile/{{Auth::user()->avatar}}">
			                </a>
			                <form action="{{$course_question->question->id}}/answer" method="post">
			                {{csrf_field()}}
			                	<div class="media-body">
				                    <textarea class="form-control" name="ans_body" placeholder="Try this question ..."></textarea>
				                </div>
				                <button type="submit"><i class="fa fa-ll">answer</i></button>
			                </form>
				                
			            </div>

			        </div>
	        	@endforeach
        	</div>
        @endif
    

    </div>


@stop