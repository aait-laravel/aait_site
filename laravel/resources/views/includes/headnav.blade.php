<div class="row">
    <div class="col-md-8">
        <div class="row border-bottom">
            <div class="col-md-12">
                <nav class="navbar navbar-fixed-top" style="margin-bottom: 0;width:70.8%;border-right:solid black;">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" style="width:auto;"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="#" style="width: 200px">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">

                    	<li class="form-group">
                        	
						  <select class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown" id="department">
                            <option value="none">--Department--</option>
                            @if(count(session()->get('all_departments')) > 0)
                                @foreach(session()->get('all_departments') as $department)
                                    <option value="{{$department->dep_name}}">{{$department->dep_name}}</option>
                                @endforeach
                            @endif
						  </select>
							
                        </li>
                        <li class="form-group">
                        	
						  <select class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown" id="section">
                            <option>--Course--</option>
						    @if(count(session()->get('all_courses')) > 0)
                                @foreach(session()->get('all_courses') as $course)
                                    <option value="{{$course->course_name}}">{{$course->course_name}}</option>
                                @endforeach
                            @endif
						  </select>
							
                        </li>


                    	
                    	
                        <!-- <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                        </li> -->
                        @if(Auth::user()->student)
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>  <span class="label label-warning">{{count(Auth::user()->student->private_messages)}}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                Messages
                                <!-- <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="/img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="/img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li> -->
                                @if(Auth::user()->student)
                                @if(count(Auth::user()->student->private_messages) > 0)
                                
                                        @foreach(Auth::user()->student->private_messages as $private_message)
                                            <li>
                                                <div class="dropdown-messages-box">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="/img/profile/{{$private_message->message->text->user->avatar}}">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">23h ago</small>
                                                        <strong>{{$private_message->message->text->user->user_name}}</strong>. <br>
                                                        <small class="text-muted">{{$private_message->message->text->text_body}}</small>
                                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                        @endforeach
                                @endif
                                @endif

                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" ></i>Log Out
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <nav class="navbar navbar-static-top prof" style="margin-bottom:0;position: fixed; width:100%;">
            <!-- here profile-->
            <ul class="list-group">
                <li class="nav-header list-group-item">
                    <div class="dropdown"> <span>
                        <img alt="image" class="img-rounded" src="/img/profile/{{Auth::user()->avatar}}" style="height:60px;width:60px"/>
                         </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs">
                        <strong class="font-bold">{{Auth::user()->first_name. " " .Auth::user()->last_name}}</strong>
                         </span> <span class="text-muted text-xs block">Software Engineer<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{url('profile')}}">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out" ></i>Log Out
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                            </li>
                        </ul>

                    </div>                                
                </li>
            </ul>
            <ul class="nav nav-tabs navs-3">
                <li class="active"><a data-toggle="tab" href="#tab-1">
                    Chat room
                </a></li>
                <li class=""><a data-toggle="tab" href="#tab-2">
                    Files
                </a></li>
                <li class=""><a data-toggle="tab" href="#tab-3">
                    <i class="fa fa-gear"></i>Profile
                </a></li>
            </ul>
        </nav>
    </div>
    
</div>