
@extends('layouts.app_layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            </div>
            
        </div>
    @endif

    <hr>
    <div class="content">
        <div class="jumbotron">
            <h1>Addis Ababa Institute of Technology</h1>
        </div>

        <ul class="list-group">
            <li class="list-group-item"><a href="department/departments">Departments</a></li>
            <li class="list-group-item"><a href="channel/channels">Channels</a></li>
            <li class="list-group-item"><a href="public/all">Public</a></li>
        </ul>
    </div>
</div>
@stop