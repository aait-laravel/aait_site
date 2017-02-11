@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="content">
                        <div class="text-success">
                            <h1>Profile</h1>
                        </div>                    
                    </div>
                </div>
            </div>

            <div class="container">
            	<img src="/img/profile/{{$user->avatar}}" class="img-circle">
            	<h2>{{$user->user_name}}'s Profile</h2>
            	<form enctype="multipart/form-data" action="/upload_avatar" method="post">
            	{{csrf_field() }}
            		<label>	Update Profile Image</label>
            		<input type="file" name="avatar">
            		<input type="submit" value="Upload" class="pull-right btn btn-sm btn-default">
            	</form>
            </div>
        </div>
    </div>
</div>
@endsection
