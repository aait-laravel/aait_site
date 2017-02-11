@extends('layouts.aait_layout')

@section('content')
	@if(session()->has('mail_message'))
		<h3 class="alert-danger">{{session()->get('mail_message')}}</h3>
	@endif
    <div class="animated fadeInRight">
	    <div class="mail-box-header">

	        <form method="get" action="#" class="pull-right mail-search">
	            <div class="input-group">
	                <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
	                <div class="input-group-btn">
	                    <button type="submit" class="btn btn-sm btn-primary">
	                        Search
	                    </button>
	                </div>
	            </div>
	        </form>
	        <h2>
	            Inbox ({{count($private_messages)}})
	        </h2>

	        <div class="mail-tools tooltip-demo m-t-md">
	        	@if(count($private_messages) > 10)
	        		<div class="btn-group pull-right">
		                <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
		                <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

		            </div>
	        	@endif
		            
	            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
	            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as read"><i class="fa fa-eye"></i> </button>
	            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as important"><i class="fa fa-exclamation"></i> </button>
	            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>

	        </div>
	    </div>
        <div class="mail-box">

	        <table class="table table-hover table-mail">
		        <tbody>
			        <!-- <tr class="unread">
			            <td class="check-mail">
			                <div class="icheckbox_square-green" style="position: relative;">
			                    <input type="checkbox" class="i-checks" style="">
			                    <ins class="iCheck-helper" style="top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; "></ins>
			                </div>
			            </td>
			            <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
			            <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
			            <td class=""><i class="fa fa-paperclip"></i></td>
			            <td class="text-right mail-date">6.10 AM</td>
			        </tr>
			        <tr class="read">
			            <td class="check-mail">
			                <div class="icheckbox_square-green" style="position: relative;">
			                    <input type="checkbox" class="i-checks" style="">
			                    <ins class="iCheck-helper" style="top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; "></ins>
			                </div>
			            </td>
			            <td class="mail-ontact"><a href="mail_detail.html">Facebook</a> <span class="label label-warning pull-right">Clients</span> </td>
			            <td class="mail-subject"><a href="mail_detail.html">Many desktop publishing packages and web page editors.</a></td>
			            <td></td>
			            <td class="text-right mail-date">Jan 16</td>
			        </tr> -->
			        @if (count($errors) > 0)
					    <div class="alert alert-danger">
					            @foreach ($errors->all() as $error)
					                <strong>{{ $error }} </strong>
					            @endforeach
					    </div>
					@endif
			        @if(count($private_messages) > 0)
                	Messages
                			@foreach($private_messages as $private_message)
                				<tr class="unread">
						            <td class="check-mail">
						                <div class="icheckbox_square-green" style="position: relative;">
						                    <input type="checkbox" class="i-checks" style="">
						                    <ins class="iCheck-helper" style="top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; "></ins>
						                </div>
						            </td>
						            <td class="mail-ontact">
						            	<a href="mail_detail.html">{{$private_message->message->text->user->user_name}}</a>
						            </td>
						            <td class="mail-subject"><a href="mail_detail.html">{{$private_message->subject}}</a></td>
						            <td class=""></td>
						            <td class="text-right mail-date">Jan 16</td>
						        </tr>
                				
                			@endforeach
                	@endif
		        
		        
		        </tbody>
	        </table>
        </div>
	</div>


	<div class="animated fadeInRight">
        <div class="mail-box-header">
            <h2>
                Compse mail
            </h2>
        </div>
        <div class="mail-box">
	        <form class="form-horizontal" method="post" action="mailing/send">
	        {{csrf_field()}}
	        	<div class="mail-body">
                    <div class="form-group {{$errors->has('student')? 'has-error': ''}}">
                    	<label for="student" class="col-sm-2 control-label">To:</label>
                        <div class="col-sm-10">
                        	<input type="text" name="student" class="form-control" value="{{ old('student')}}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                    	<label for="subject" class="col-sm-2 control-label">Subject:</label>
                        <div class="col-sm-10">
                        	<input type="text" name="subject" class="form-control">
                        </div>
                    </div>
	            </div>

	            <div class="mail-body">
	            	<div class="form-group {{$errors->has('priv_body')? 'has-error': ''}}">
				        <textarea name="priv_body" class="form-control" id="text" name="text" placeholder="Type in your message" rows="7" value="{{old('priv_body')}}"></textarea>
				        <h6 class="pull-right" id="count_message"></h6>
		            </div>
	            </div>
		            
	            <div class="mail-body text-right tooltip-demo">
	                <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</button>
	                <a href="mailbox.html" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
	                <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
	            </div>
	        </form>
	            
        </div>
    </div>
@stop