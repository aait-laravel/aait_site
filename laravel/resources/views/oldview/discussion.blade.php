@extends('layouts.app')

@section('content')
	<section class="row messages">
		
		<div class="col-md-6 col-md-offset-3">
			<h2>All Public Messages</h2>
			<article class="message">
				<p>The original problem unfortunately isn't really solvable. Even if you can save all at once, if the first save fails, it fails. You CAN, however - use transactions to get around this, as was originally provided. Transaction statements will let you know if something is wrong with any of the queries, before you execute them. Just wrap it in a transaction block:</p>
			</article>
			<hr>
			@if(count($discussion) > 0)
				@foreach($discussion as $public_message)
					<article class="message">
						<p>{{$public_message->message->text->text_body}} -- -- {{$public_message->message->text->created_at}}
							<button data-toggle="collapse" data-target="#edit">edit</button>
							<div id="edit" class="collapse">
								<form role="form" method="post" action="{{$public_message->message->text->text_id}}/edit">
									{{csrf_field()}}
									<input type='text' value="{{$public_message->message->text->text_body}}" name="text_body">
									<input type="submit" value="Done" class="btn btn-success">
								</form>
							</div>
							<form role="form" method="post" action="{{$public_message->message->text->text_id}}/delete">
								{{csrf_field()}}
								<input type="submit" value="Delete" class="btn btn-warning">
							</form>
						</p>
					</article>
					<hr>
				@endforeach
			@else
				<p class="text-warning">No Messages here</p>
			@endif
		</div>
	</section>







	<nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <div class="navbar-header">
                	<form role="form" method="post" action="message">
                	{{ csrf_field() }}
                		<div class="form-group">
                		 	<input type="text" name="text_body" class="form-control">
                		 	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-right"></span></button>
                		</div>
                	</form>
                </div>
            </div>
    </nav>
@stop