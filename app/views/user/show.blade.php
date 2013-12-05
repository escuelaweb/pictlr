@extends('layouts.master')

@section('title')
{{$user->username}} - Pictlr
@stop

@section('header')
<h1>{{$user->username}} - Perfil de Usuario</h1>
<h2>{{$user->name}}</h2>
<h3>Número de visitas: {{$user->view_count}}</h3>
@stop

@section('main')
	@if($user->pictures->count() > 0)
	<ul>
		@foreach($user->pictures as $picture)
		<li class="container">			
			<a href="{{URL::route('picture.show', $picture->id)}}" class="row">
				<img class="col-md-4" src="{{asset($picture->basedir . $picture->filename)}}">
			</a>
			<div class="row controls">
				@if($picture->user->id == Auth::user()->id)
				<a href="{{URL::route('picture.destroy', $picture->id)}}" class="btn btn-danger col-md-2">Borrar</a>
				@endif
			</div>
		</li>
		@endforeach
	</ul>
	@else
		<p>El usuario no ha subido fotos.</p>	
	@endif
@stop