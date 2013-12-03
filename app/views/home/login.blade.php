<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pictlr - Login</title>

	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
</head>
<body class="container">
	<header>
		<div class="row">
			<h1>Pictlr - Login</h1>
		</div>
	</header>
	<section>
		@if(Session::has('message'))
		{{Session::get('message')}}
		@endif

		{{Form::open( array('url' => '/authenticate', 'method' => 'POST') )}}
			<fieldset class="form-group row">
				{{Form::label('email', 'Email: ')}}

				@if($errors->has('email'))
				{{Form::label('email', $errors->first('email'))}}
				@endif

				{{Form::text('email', null, array('class' => 'form-control'))}}
			</fieldset>
			<fieldset class="form-group row">
				{{Form::label('password', 'Contraseña: ')}}

				@if($errors->has('password'))
				{{Form::label('password', $errors->first('password'))}}
				@endif

				{{Form::password('password', array('class' => 'form-control'))}}
			</fieldset>		
			<fieldset class="form-group row">
				<input type="submit" class="btn btn-primary" value="Iniciar Sesión" />
			</fieldset>
		{{Form::close()}}
	</section>
</body>
</html>