<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>AAIT</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">



    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
	<div id="wrapper">
        <nav class="navbar-default navbar-static-side" style="position:fixed;top:65px">
            @include('includes.sidebar', ['active_side'=>$active_side]);
        </nav>

        <div id="page-wrapper" class="gray-bg">
            @include('includes.headnav');
                    
        

        <!-- footer -->
        <div class="row" style="top:100px;">
            <div class="col-lg-8" style="height:60%;">
                @if($active_side == 'discussion')
                    @include('includes.messaging')
                
                @endif
                
                <div style="margin-top:100px;">
                    @yield('content')
                </div>
                

            </div>

            
            <div class="col-md-4">
                    <div class="animated">
                        <div class="sidebar-container" style="position:fixed;top:175px">
                            @include('includes.rightside')

                        </div>
                    </div>
            </div>
        </div>

        </div>
        <div class="small-chat-box fadeInRight animated">

            <div class="heading" draggable="true">
                <small class="chat-date pull-right">
                    
                </small>

                    <span id="heading">Small chat</span>
                    <input type="hidden" id="rid" value=""/>
            </div>

            <div class="content" id="chatContent">
<!-- 
                <div class="left">
                    <div class="author-name">
                        Monica Jackson <small class="chat-date">
                        10:02 am
                    </small>
                    </div>
                    <div class="chat-message active">
                        Lorem Ipsum is simply dummy text input.
                    </div>

                </div>
                <div class="right">
                    <div class="author-name">
                        Mick Smith
                        <small class="chat-date">
                            11:24 am
                        </small>
                    </div>
                    <div class="chat-message">
                        Lorem Ipsum is simpl.
                    </div>
                </div> -->
                <!-- <div class="left">
                    <div class="author-name">
                        Alice Novak
                        <small class="chat-date">
                            08:45 pm
                        </small>
                    </div>
                    <div class="chat-message active">
                        Check this stock char.
                    </div>
                </div>
                <div class="right">
                    <div class="author-name">
                        Anna Lamson
                        <small class="chat-date">
                            11:24 am
                        </small>
                    </div>
                    <div class="chat-message">
                        The standard chunk of Lorem Ipsum
                    </div>
                </div>
                <div class="left">
                    <div class="author-name">
                        Mick Lane
                        <small class="chat-date">
                            08:45 pm
                        </small>
                    </div>
                    <div class="chat-message active">
                        I belive that. Lorem Ipsum is simply dummy text.
                    </div>
                </div> -->


            </div>
            <div class="form-chat">
                <div class="input-group input-group-sm">
                    <textarea class="form-control" id="#chatMsg" placeholder="type here..."></textarea>
                    <span class="input-group-btn"> 
                        <button class="btn btn-primary" type="button" id="sendChat">Send</button>
                    </span>
                </div>
            </div>

        </div>
        <div id="small-chat">

            <!-- {{--<span class="badge badge-warning pull-right">5</span>--}} -->
            <a class="open-small-chat">
                <i class="fa fa-comments"></i>

            </a>
        </div>
        
    </div>
</body>


<!-- Mainly scripts -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/js/ajax/chat.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/js/plugins/jquery-ui/jquery-ui.min.js"></script>

</body>

</html>
