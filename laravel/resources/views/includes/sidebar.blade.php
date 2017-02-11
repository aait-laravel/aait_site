<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Addis Ababa Institute of Technology</strong>
                </span></span> </a>
                <span>
                    <img alt="image" class="img-circle" src="/img/aait_logo.png" />
                </span>
            </div>
            <div class="logo-element">
                AAIT
            </div>
        </li>
        <li class="
            @if($active_side == 'discussion')
                active
            @endif
            ">
            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Discussion </span><span class="caret"></span></a>
            
            <ul class="nav nav-second-level">
                <li class="active"><a href="/public/discussion">Public Discussion</a></li>
                <li><a href="{{url('department', ['display'=>'discussion'])}}">Department Discussion</a></li>
                <li><a href="{{url('course/courses', ['display'=>'discussion'])}}">Course Discussion</a></li>
                <!-- <li><a href="#">Section Discussion</a></li> -->
            </ul>
            
        </li>
        <li
        class="
            @if($active_side == 'posts')
                active
            @endif
            "
        >
            <a href="#"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Posts </span><span class="caret"></span></a>
            
            <ul class="nav nav-second-level">
                <li class="active"><a href="/public/posts">Public Posts</a></li>
                <li><a href="{{url('department', ['display'=>'posts'])}}">Department Posts</a></li>
                <li><a href="{{url('course/courses', ['display'=>'posts'])}}">Course Posts</a></li>
                <!-- <li><a href="#">Section Posts</a></li> -->
            </ul>
        </li>
        <li
        class="
            @if($active_side == 'annoucements')
                active
            @endif
            "
        >
            <a href="{{url('department', ['display'=>'announcements'])}}"><i class="fa fa-bell-o"></i> <span class="nav-label">Announcements</span></a>


        </li>

        <li
        class="
            @if($active_side == 'questions')
                active
            @endif
            "
        >
            <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Questions</span><span class="caret"></span><span class="pull-right label label-primary">forum</span></a>
            <ul class="nav nav-second-level">
                <li><a href="{{url('department/questions')}}">Department Questions</a></li>
                <li><a href="{{url('course/courses', ['display'=>'questions'])}}">Course Questions</a></li>
                <!-- <li><a href="#">Section Questions</a></li> -->
            </ul>
        </li>

        <li
        class="
            @if($active_side == 'news')
                active
            @endif
            "
        >
            <a href="{{url('news')}}"><i class="fa fa-news-paper-o"></i> <span class="nav-label">News</span>  </a>
        </li>

        <li
        class="
            @if($active_side == 'mail')
                active
            @endif
            "
        >
            <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox</span><span class="caret"></span><span class="label label-warning pull-right">check</span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{{url('mailing')}}">Mail inbox</a></li>
                <li><a href="{{url('mailing/group_mail')}}">View direct chat</a></li>
                <li><a href="{{url('mailing/compose_mail')}}">Compose message</a></li>
                <li><a href="{{url('mailing/chatroom')}}">Group chat</a></li>
            </ul>
        </li>
        
        <li class="landing_link">
            <a target="_blank" href="{{url('/channel/channels')}}"><i class="fa fa-star"></i> <span class="nav-label">Channels</span> <span class="label label-warning pull-right" style="color:rgba(13, 71, 161, 0.85);">NEW</span></a>
        </li>
    </ul>

</div>