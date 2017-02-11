<div class="tab-content">
    <div id="tab-1" class="tab-pane active" style="padding-bottom: 200px;">

        <!-- <div class="sidebar-title">
            <h3> <i class="fa fa-comments-o"></i> Latest Notes</h3>
            <small><i class="fa fa-tim"></i> You have 10 new message.</small>
        </div> -->

        <!-- <div class="sidebar-message">
            <a href="#">
                
                <div class="media-body">

                    There are many variations of passages of Lorem Ipsum available.
                    <br>
                    <small class="text-muted">Today 4:21 pm</small>
                </div>
            </a>
        </div> -->

        @if(count(session()->get('all_online_students')) > 0)
            @foreach(session()->get('all_online_students') as $student)
                <div class="sidebar-message" name="{{$student->user_name}}" id="{{$student->id}}">
                    <a href="#">
                        
                        <div class="media-body">

                            <div class="chat-user">
                            <span class="pull-right label label-primary">Online</span>
                                <img class="chat-avatar" src="/img/profile/{{$student->avatar}}" alt="">
                                <div class="chat-user-name">
                                    <a href="">{{$student->user_name}}</a>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
                

        <!-- <div class="sidebar-message">
            <a href="#">
                <div class="chat-user">
                    <img class="chat-avatar" src="/img/a1.jpg" alt="">
                    <div class="chat-user-name">
                        <a href="#">Monica Smith</a>
                    </div>
                </div>
            </a>
        </div>

        <div class="sidebar-message">
            <a href="#">
                <div class="chat-user">
                    <span class="pull-right label label-primary">Online</span>
                    <img class="chat-avatar" src="/img/a2.jpg" alt="">
                    <div class="chat-user-name">
                        <a href="#">Michael Smith</a>
                    </div>
                </div>
            </a>
        </div>

        <div class="sidebar-message">
            <a href="#">
                <div class="chat-user">
                    <span class="pull-right label label-primary">Online</span>
                    <img class="chat-avatar" src="/img/a3.jpg" alt="">
                    <div class="chat-user-name">
                        <a href="#">Janet Smith</a>
                    </div>
                </div>
            </a>
        </div> -->

       <!--  <div class="sidebar-message">
            <a href="#">
                <div class="chat-user">
                    <img class="chat-avatar" src="/img/a2.jpg" alt="">
                    <div class="chat-user-name">
                        <a href="#">Mark Jordan</a>
                    </div>
                </div>
            </a>
        </div>

        <div class="sidebar-message">
            <a href="#">
                <div class="chat-user">
                    <span class="pull-right label label-primary">Online</span>
                    <img class="chat-avatar" src="/img/a3.jpg" alt="">
                    <div class="chat-user-name">
                        <a href="#">Janet Smith</a>
                    </div>
                </div>
            </a>
        </div>
 -->

        <!-- <div class="sidebar-message">
            <a href="#">
                <div class="pull-left text-center">
                    <img alt="image" class="img-circle message-avatar" src="/img/a3.jpg">

                    <div class="m-t-xs">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                    </div>
                </div>
                <div class="media-body">
                    Mevolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                    <br>
                    <small class="text-muted">Yesterday 1:10 pm</small>
                </div>
            </a>
        </div>
        <div class="sidebar-message">
            <a href="#">
                <div class="pull-left text-center">
                    <img alt="image" class="img-circle message-avatar" src="/img/a4.jpg">
                </div>

                <div class="media-body">
                    Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                    <br>
                    <small class="text-muted">Monday 8:37 pm</small>
                </div>
            </a>
        </div>
        <div class="sidebar-message">
            <a href="#">
                <div class="pull-left text-center">
                    <img alt="image" class="img-circle message-avatar" src="/img/a8.jpg">
                </div>
                <div class="media-body">

                    All the Lorem Ipsum generators on the Internet tend to repeat.
                    <br>
                    <small class="text-muted">Today 4:21 pm</small>
                </div>
            </a>
        </div>
        <div class="sidebar-message">
            <a href="#">
                <div class="pull-left text-center">
                    <img alt="image" class="img-circle message-avatar" src="/img/a7.jpg">
                </div>
                <div class="media-body">
                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    <br>
                    <small class="text-muted">Yesterday 2:45 pm</small>
                </div>
            </a>
        </div>
        <div class="sidebar-message">
            <a href="#">
                <div class="pull-left text-center">
                    <img alt="image" class="img-circle message-avatar" src="/img/a3.jpg">

                    <div class="m-t-xs">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                    </div>
                </div>
                <div class="media-body">
                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.
                    <br>
                    <small class="text-muted">Yesterday 1:10 pm</small>
                </div>
            </a>
        </div>
        <div class="sidebar-message">
            <a href="#">
                <div class="pull-left text-center">
                    <img alt="image" class="img-circle message-avatar" src="/img/a4.jpg">
                </div>
                <div class="media-body">
                    Uncover many web sites still in their infancy. Various versions have.
                    <br>
                    <small class="text-muted">Monday 8:37 pm</small>
                </div>
            </a>
        </div> -->
        

        
    </div>

    <div id="tab-2" class="tab-pane" style="padding-bottom: 200px;">
        <div class="sidebar-title">
            <h3> <i class="fa fa-cube"></i> Latest projects</h3>
            <small><i class="fa fa-tim"></i>Your projects will be displayed here.</small>
        </div>

        <ul class="sidebar-list">
            <!-- <li>
                <a href="#">
                    <div class="small pull-right m-t-xs">9 hours ago</div>
                    <h4>Business valuation</h4>
                    It is a long established fact that a reader will be distracted.

                    <div class="small">Completion with: 22%</div>
                    <div class="progress progress-mini">
                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                    </div>
                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="small pull-right m-t-xs">9 hours ago</div>
                    <h4>Contract with Company </h4>
                    Many desktop publishing packages and web page editors.

                    <div class="small">Completion with: 48%</div>
                    <div class="progress progress-mini">
                        <div style="width: 48%;" class="progress-bar"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="small pull-right m-t-xs">9 hours ago</div>
                    <h4>Meeting</h4>
                    By the readable content of a page when looking at its layout.

                    <div class="small">Completion with: 14%</div>
                    <div class="progress progress-mini">
                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="small pull-right m-t-xs">9 hours ago</div>
                    <h4>Business valuation</h4>
                    It is a long established fact that a reader will be distracted.

                    <div class="small">Completion with: 22%</div>
                    <div class="progress progress-mini">
                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                    </div>
                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-primary pull-right">NEW</span>
                    <h4>The generated</h4>
                    There are many variations of passages of Lorem Ipsum available.
                    <div class="small">Completion with: 22%</div>
                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                </a>
            </li>
            
            <li>
                <a href="#">
                    <div class="small pull-right m-t-xs">9 hours ago</div>
                    <h4>Contract with Company </h4>
                    Many desktop publishing packages and web page editors.

                    <div class="small">Completion with: 48%</div>
                    <div class="progress progress-mini">
                        <div style="width: 48%;" class="progress-bar"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="small pull-right m-t-xs">9 hours ago</div>
                    <h4>Meeting</h4>
                    By the readable content of a page when looking at its layout.

                    <div class="small">Completion with: 14%</div>
                    <div class="progress progress-mini">
                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="label label-primary pull-right">NEW</span>
                    <h4>The generated</h4>
                    <div class="small pull-right m-t-xs">9 hours ago</div>
                    There are many variations of passages of Lorem Ipsum available.
                    <div class="small">Completion with: 22%</div>
                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                </a>
            </li> -->

        </ul>
        
    </div>

    <div id="tab-3" class="tab-pane" style="padding-bottom: 200px;">
        <div class="sidebar-title">
            <h3><i class="fa fa-gears"></i> Settings</h3>
            <small><i class="fa fa-tim"></i> You can change your settings here.</small>
        </div>

        @yield('profile')
        <div class="container">
            <img src="/img/profile/{{Auth::user()->avatar}}" class="img-circle" style="height:120px;width:120px;">
            <h2>{{Auth::user()->user_name}}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile/change_avatar" method="post">
            {{csrf_field() }}
                <label> Update Profile Image</label>
                <input type="file" name="avatar">
              
                <button type="submit" class="fa fa-upload btn-md">Upload</button>
            </form>
        </div>

        <div class="setings-item">
            <span>
                Show notifications
            </span>
            <div class="switch">
                <div class="onoffswitch">
                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                    <label class="onoffswitch-label" for="example">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>
        

        <div class="sidebar-content">
            <h4>Settings</h4>
            <div class="small">
                
            </div>
        </div>
    </div>
</div>