@extends('layouts.aait_layout')

@section('content')
    <div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
        @include('includes.post_form')
        
    </div>
    <div class="ibox float-e-margins">
        
        <div class="ibox-title">
            <h5>Posts</h5>
            <div class="ibox-tools">
                <span class="label label-warning-light pull-right"> Posts</span>
               </div>
        </div>
        
        <div class="ibox-content">

            <div>
                @yield('posts')


                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>

            </div>

        </div>
    </div>
@stop