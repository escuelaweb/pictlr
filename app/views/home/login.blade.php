@extends('layouts.master')

@section('title')
Pictlr - Login
@stop

@section('header')
<div class="row">
	<h1>Pictlr - Login</h1>
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
