@extends('layouts.app')

@section('content')
	<section class="row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header>Your Are thinking...</header>
			<form action="post" method="POST">
			{{ csrf_field() }}
				<div class="form-group">
					<textarea id='text_body' name="text_body" rows='5' cols='80' placeholder="Your post" calss="form-control"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Post</button>
				</div>
			</form>
		</div>
	</section>
	<section class="row posts">
		
		<div class="col-md-6 col-md-offset-3">
			<header>Peaple were thinking</header>
			<article class="post">
				<p>The original problem unfortunately isn't really solvable. Even if you can save all at once, if the first save fails, it fails. You CAN, however - use transactions to get around this, as was originally provided. Transaction statements will let you know if something is wrong with any of the queries, before you execute them. Just wrap it in a transaction block:</p>
				<div class="info">
					posted by cbs 2017 jan 20
				</div>
				<div class="interaction">
					<a href="#">like</a> |
					<a href="#">dislike</a> | 
					<a href="#">edit</a> | 
					<a href="#">delete</a> | 
				</div>
			</article>
			<hr>
			@if(count($posts) > 0)
				@foreach($posts as $dep_post)
					<article class="post">
						<p>{{$dep_post->post->text->text_body}}</p>
						@if(count($dep_post->post->comments())> 0)
						Comments:
							@foreach($dep_post->post->comments() as $comment)
								<p>{{$comment->text->text_body}}</p>
							@endforeach
						@endif
						<!-- if($student->followed_text($dep_post->post->text) )
							Following <a href="/$dep_post->post->text->text_id/unfollow">unfollow</a>
						else
							<a href="/{{$dep_post->post->text->text_id}}/follow">follow</a>
						endif -->
						<span class="glyphicon glyphicon-thumbs-up">{{$dep_post->post->text->votes_up}}</span>
						<span class="glyphicon glyphicon-thumbs-down">{{$dep_post->post->text->votes_down}}</span>
						<div class="info">
							posted by {{$dep_post->post->text->user->user_name}} {{$dep_post->post->text->created_at}}
							@if($dep_post->post->text->edited)
								<label>edited</label>
							@endif
						</div>
						<div class="interaction">

							<a href="/{{$dep_post->post->text->text_id}}/like">like</a> |
							<a href="/{{$dep_post->post->text->text_id}}/dislike">dislike</a> | 
							<a href="#">
								<button data-toggle="collapse" data-target="#edit">edit</button>
								<div id="edit" class="collapse">
									<form role="form" method="post" action="/{{$dep_post->post->text->text_id}}/edit">
										{{csrf_field()}}
										<input type='text' value="{{$dep_post->post->text->text_body}}" name="text_body">
										<input type="submit" value="Done" class="btn btn-success">
									</form>
								</div>
							</a> | 
							<a href="{{$dep_post->post->text->text_id}}/delete">delete</a> | 
							<a href="#">
								<button data-toggle="collapse" data-target="#comment">Comment</button>
								<div id="comment" class="collapse">
									<form role="form" method="post" action="/{{$dep_post->post->text->text_id}}/comment">
										{{csrf_field()}}
										<input type='text' name="com_body">
										<input type="submit" value="Done" class="btn btn-success">
									</form>
								</div>
							</a>
						</div>
					</article>
					<hr>
				@endforeach
			@else
				<p class="text-warning">No Posts here</p>
			@endif
		</div>
	</section>
@stop