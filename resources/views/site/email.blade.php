<!DOCTYPE html>
<html>
<head>
	<title>Send Email</title>
</head>
<body>
	<h1>Hi Welcome to Test Mail </h1>
	<h2> {{ $data['name'] }} </h2>
	
	<div>{{ $data['text'] }}</div>
</body>
</html>
{{ csrf_field() }}