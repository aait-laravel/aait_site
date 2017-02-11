@extends('layouts.post_layout')

@section('content')
    <div class="container">
        <img src="/img/profile/{{Auth::user()->avatar}}" class="img-circle" style="height:120px;width:120px;">
        <h2>{{Auth::user()->user_name}}'s Profile</h2>

        <form enctype="multipart/form-data" action="/profile/update_profile" method="post">
        {{csrf_field() }}
            <div class="row" style="width:500px">
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name" class="col-md-4 control-label">First Name</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name }}" required>

                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row" style="width:500px">
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name" class="col-md-4 control-label">Last Name</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}" required>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" style="width:500px">
                <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                    <label for="user_name" class="col-md-4 control-label">User Name</label>

                    <div class="col-md-6">
                        <input id="user_name" type="text" class="form-control" name="user_name" value="{{ Auth::user()->user_name }}" required>

                        @if ($errors->has('user_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row" style="width:500px">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row" style="width:500px">
                <div class="form-group{{ $errors->has('student_department') ? ' has-error' : '' }}">
                    <label for="student_department" class="col-md-4 control-label">change department</label>

                    <div class="col-md-6">
                        @if(Auth::user()->student)
                            <select class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown" id="student_department" name="student_department">
                                <option value="none" name="student_department">--department--</option>
                                @if(count(session()->get('all_departments')) > 0)
                                    @foreach(session()->get('all_departments') as $department)
                                        <option value="{{$department->dep_id}}" name="student_department" 
                                        @if($department->dep_id == Auth::user()->student->department_id)
                                            {{"selected"}}
                                        @endif
                                        >{{$department->dep_name}}</option>

                                    @endforeach
                                @endif
                            </select>
                        @endif


                        @if ($errors->has('student_department'))
                            <span class="help-block">
                                <strong>{{ $errors->first('student_department') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
                
            <br/>

            
            

            <label> Update Profile Image</label>
            <input type="file" name="avatar">

            <button type="submit" class="fa fa-upload btn-md">Upload</button>
        </form>
    </div>
@stop