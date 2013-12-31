@extends('layouts.external')

@section('title') Pictlr - Inicio de Sesión @stop

@section('content')
<div class="container">
	<div class="row">
		<h1 class="col-md-6 col-md-offset-3">Bienvenido de Vuelta a Pictlr</h1>
	</div>

	@if(Session::has('message'))
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<p class="alert alert-danger">{{Session::get('message')}}</p>
		</div>
	</div>
	@endif

	{{Form::open( array('url' => '/authenticate', 'method' => 'POST') )}}
		<fieldset class="form-group row">
			<div class="col-md-6 col-md-offset-3">
				{{Form::label('email', 'Email: ')}}

				@if($errors->has('email'))
				{{Form::label('email', $errors->first('email'), array('class' => 'label label-warning'))}}
				@endif

				{{Form::text('email', null, array('class' => 'form-control'))}}
			</div>
		</fieldset>
		<fieldset class="form-group row">
			<div class="col-md-6 col-md-offset-3">
				{{Form::label('password', 'Contraseña: ')}}

				@if($errors->has('password'))
				{{Form::label('password', $errors->first('password'), array('class' => 'label label-warning'))}}
				@endif

				{{Form::password('password', array('class' => 'form-control'))}}
			</div>
		</fieldset>		
		<fieldset class="form-group row">
			<div class="col-md-6 col-md-offset-3">
				<input type="submit" class="btn btn-primary" value="Iniciar Sesión" />
				<span class="register">¿No posees una cuenta? <a href="{{URL::route('user.create')}}">Regístrate</a></span>
			</div>
		</fieldset>
	{{Form::close()}}
	

</div>
@stop

@section('main')

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
@stop
