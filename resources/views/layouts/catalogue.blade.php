<!DOCTYPE html>
<html lang="en" class="text-center">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="{{ elixir("css/all.css") }}"> -->
        <link rel="stylesheet" href="{{ elixir("css/catalogue.css") }}">
	</head>
	<body class="d-inline-block">
		@yield('content')
		<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js">
		</script>
    </body>
</html>