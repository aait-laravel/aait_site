@extends('layouts.app')

@section('content')
	<section class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Department</div>
                <div class="panel-body">
                	<form class="form-horizontal" role="form" method="POST" action="storedepartment">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dep_name') ? ' has-error' : '' }}">
                            <label for="dep_name" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="dep_name" type="text" class="form-control" name="dep_name" value="{{ old('dep_name') }}" required autofocus>

                                @if ($errors->has('dep_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dep_name') }}</strong>
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
                                    Add Department
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
	</section>

	<section class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Department Section
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"> <a href="#">Questions</a></li>
                        <li class="list-group-item"> <a href="#">Posts</a></li>
                        <li class="list-group-item"> <a href="#">Discussion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


	<section class="row">
		<div class="col-md-6 col-md-offset-3">
			<header>Departments</header>
			@if(count($departments) > 0)
				<ul class="list-group">
					@foreach($departments as $department)
						<li class="list-group-item">
							<a href="/department/{{$department->dep_id}}">{{$department->dep_name}} </a> | 
							<a href="/department/{{$department->dep_id}}/posts">Posts</a> | 
                            <a href="/department/{{$department->dep_id}}/discussion">Discussion</a> | 
                            <a href="/department/{{$department->dep_id}}/questions">Questions</a>
							<ul class="list-group">
								@foreach($department->courses as $course)
									<li class="list-group-item">{{$course->course_name}}</li>
								@endforeach
							</ul>
						</li>
					@endforeach
				</ul>

			@else
				<p class="text-warnint">No Departments here</p>
			@endif
		</div>
	</section>
	
@stop