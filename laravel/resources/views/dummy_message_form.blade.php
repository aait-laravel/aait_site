@extends('layouts.app')

@section('content')
	<section class="row">
        <div class="col-md-6 col-md-offset-3">
            <header>Messaging</header>
        </div>
    </section>

    <section class="row">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Private Mail section
                </div>
                <div class="panel-body">
                	<form role="form" method="POST" action="mailing/send">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('priv_body') ? ' has-error' : '' }}">
                            
                            Mail
                            <div class="">
                                <input id="priv_body" type="text" class="form-control" name="priv_body" value="{{ old('priv_body') }}" required autofocus>

                            </div>
                            @if(count($students) > 0)
                            	<select class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown" id="student" name="student">
                            	@foreach($students as $student)
                            		<option value="{{$student->stud_id}}" name="student">{{$student->user->first_name}}</option>
                            	@endforeach
                            	</select>
                            @endif
                            
                            <div class="form-group">
	                            <div class="">
	                                <button type="submit" class="btn btn-default">
	                                    Send
	                                </button>
	                            </div>
	                        </div>
                        </div>
                    </form>
                	@if(count($private_messages) > 0)
                	Messages
                		<ul class="list-group">
                			@foreach($private_messages as $private_message)
                				<li class="list-group-item">{{$private_message->message->text->text_body}} ---- from --<span>{{$private_message->message->text->user->user_name}}</span></li>
                			@endforeach
                		</ul>	
                	@endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="pane panel-default">
        		<div class="panel-heading">
        			Student Groups
        		</div>
        		<div class="panel-body">
        			<form role="form" method="POST" action="{{url('groups/create_group')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
                            
                            Group
                            <div class="">
                                <input id="group_name" type="text" class="form-control" name="group_name" value="{{ old('group_name') }}" required>

                            </div>
                            
                            
                            <div class="form-group">
	                            <div class="">
	                                <button type="submit" class="btn btn-default">
	                                    Add Group
	                                </button>
	                            </div>
	                        </div>
                        </div>
                    </form>
                	@if(count($groups) > 0)
	                	<ul class="list-group">
	                		@foreach($groups as $group)
	                    		<li class="list-group-item">{{$group->group_name}}</li>
	                    	@endforeach
	                	</ul>
	                @endif
	                @if(count($student_groups) > 0)
	                	<ul class="list-group">
	                		@foreach($student_groups as $student_group)
	                			<li class="list-group-item">{{$student_group->group_name}}</li>
	                		@endforeach
	                	</ul>
	                @endif
        		</div>
        	</div>
        </div>
    </section>
@stop