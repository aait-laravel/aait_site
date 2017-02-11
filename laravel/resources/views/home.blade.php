@extends('layouts.aait_layout', ['active_side'=>$active_side])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="content">
                        

                        <ul class="list-group">
                            <li class="list-group-item"><a href="department/departments">Departments</a></li>
                            <li class="list-group-item"><a href="channel/channels">Channels</a></li>
                            <li class="list-group-item"><a href="public/all">Public</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
