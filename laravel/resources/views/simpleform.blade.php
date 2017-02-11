
<!DOCTYPE html>
<html>
<head>
	<title>test send</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form action="/send_chat_message" method="post">
{{csrf_field()}}
	Student<input type="text" name="student">
	Chat<input name="chat_body" type="text" >
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		            @foreach ($errors->all() as $error)
		                <strong>{{ $error }} </strong>
		            @endforeach
		    </div>
		@endif
	<input type="submit" name="submit" />
</form>
</body>
</html>