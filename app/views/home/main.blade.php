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
	<div class="row">
		<h2 class="col-md-12">Bienvenido {{Auth::user()->name}}</h2>
	</div>
	<div class="row">
		<div class="col-md-4">
			<a href="{{URL::route('picture.create')}}" class="btn btn-success">Subir Foto</a>
			<a class="btn btn-primary " href="{{URL::route('user.edit', Auth::user()->id)}}">Editar Perfil</a>		
			<a class="btn btn-warning" href="{{URL::to('/logout')}}">Cerrar Sesión</a>
		</div>
		<div class="col-md-2">
			{{Form::open(array('route' => array('user.destroy', Auth::user()->id), 'method' => 'DELETE'))}}
			<input type="submit" class="btn btn-danger" value="Borrar Perfil">
			{{Form::close()}}
		</div>
	</div>
	
	@if(Session::has('message'))
	<div class="row">
		<p>{{Session::get('message');}}</p>
	</div>
	@endif
	
</header>
<article>
	@if(! empty($pictures))
	<ul>
		@foreach($pictures as $picture)
		<li class="container">			
			<a href="{{URL::route('picture.show', $picture->id)}}" class="row">
				<img class="col-md-4" src="{{asset($picture->basedir . $picture->filename)}}">
			</a>
		</li>
		@endforeach
	</ul>
	@else
		<p>Aún no hay fotos.</p>	
	@endif
</article>
@stop