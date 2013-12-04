@extends('layouts.master')

@section('title') 
Bienvenido {{Auth::user()->name}} 
@stop

@section('header')
<div class="row">
	<h1>Pictlr - Página Principal</h1>
</div>
@stop

@section('main')
<header>
	<div class="row">Bienvenido {{Auth::user()->name}}</div>
	<div class="row">
		<a class="btn btn-primary" href="{{URL::route('user.edit', Auth::user()->id)}}">Editar Perfil</a>
		<a class="btn btn-warning" href="{{URL::to('/logout')}}">Cerrar Sesión</a>
		{{Form::open(array('route' => array('user.destroy', Auth::user()->id), 'method' => 'DELETE'))}}
		<input type="submit" class="btn btn-danger" value="Borrar Perfil">
		{{Form::close()}}
	</div>
	<div class="row">
		@if(Session::has('message'))
		<p>{{Session::get('message');}}</p>
		@endif
	</div>
</header>
@stop