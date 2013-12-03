<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pictlr - Registro</title>

	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">	
</head>
<body class="container">
	<header>
		<div class="row">
			<h1>Pictlr - Registro</h1>
		</div>
	</header>
	<section id="main">
		@if(Session::has('message'))
		<p>{{Session::get('message')}}</p>
		@endif
		
		{{Form::open(array('route' => 'user.store', 'method' => 'POST'))}}
			<fieldset class="row form-group">
				{{Form::label('name', 'Nombre: ')}}
				{{Form::text('name', Input::old('name'), array('class' => 'form-control'))}}
			</fieldset>
			<fieldset class="row form-group">
				{{Form::label('username', 'Nombre de Usuario: ')}}
				{{Form::text('username', Input::old('username'), array('class' => 'form-control'))}}
			</fieldset>
			<fieldset class="row form-group">
				{{Form::label('email', 'Email: ')}}
				{{Form::email('email', Input::old('email'), array('class' => 'form-control'))}}
			</fieldset>
			<fieldset class="row form-group">
				{{Form::label('password', 'Contraseña: ')}}
				{{Form::password('password', array('class' => 'form-control'))}}
			</fieldset>
			<fieldset class="row form-group">
				{{Form::label('password_confirmation', 'Confirma tu contraseña: ')}}
				{{Form::password('password_confirmation', array('class' => 'form-control'))}}
			</fieldset>
			<fieldset class="form-group row">
				<input type="submit" class="btn btn-success" value="Regístrate" />				
			</fieldset>									
		{{Form::close()}}
	</section>
</body>
</html>