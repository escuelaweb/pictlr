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
		<a href="btn btn-danger" href="{{URL::route('user.destroy', Auth::user()->id)}}" class="btn btn-danger">Borrar Perfil</a>
	</div>
</header>
@stop