@extends('layouts.master')

@section('title')
Pictlr - Editar Perfil - {{Auth::user()->name}} 
@stop

@section('header')
<div class="row">
	<h1>Editar Perfil</h1>
</div>
<div class="row">
	<h2>Modifica la información básica de <a href="#">tu cuenta</a></h2>
</div>
@stop

@section('main')
@if(Session::has('message'))
<p>{{Session::get('message')}}</p>
@endif

{{Form::open(array('route' => 'user.store', 'method' => 'POST'))}}
	<fieldset class="row form-group">
		{{Form::label('name', 'Nombre: ')}}
		{{Form::text('name', $user->name, array('class' => 'form-control'))}}
	</fieldset>
	<fieldset class="row form-group">
		{{Form::label('username', 'Nombre de Usuario: ')}}
		{{Form::text('username', $user->username, array('class' => 'form-control'))}}
	</fieldset>
	<fieldset class="row form-group">
		{{Form::label('email', 'Email: ')}}
		{{Form::email('email', $user->email, array('class' => 'form-control', 'disabled'))}}
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
		<input type="submit" class="btn btn-primary" value="Editar" />				
	</fieldset>									
{{Form::close()}}
@stop