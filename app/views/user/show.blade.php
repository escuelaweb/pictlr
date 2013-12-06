@extends('layouts.master')

@section('title')
{{$user->username}} - Pictlr
@stop

@section('header')
	<h1>{{$user->username}} - Perfil de Usuario</h1>
	<h2>{{$user->name}}</h2>
	<h3>Número de visitas: {{$user->view_count}}</h3>

	@if($user->id !== Auth::user()->id)
		@if($user->followedBy(Auth::user()->id))
		{{Form::open( array('route' => array('ops.unfollow', Auth::user()->id, $user->id), 'method' => 'DELETE' ) )}}
		{{Form::submit('Dejar de Seguir', array('class' => 'btn btn-primary'))}}
		@else
		{{Form::open( array('route' => array('ops.follow', Auth::user()->id, $user->id) ) )}}
		{{Form::submit('Seguir', array('class' => 'btn btn-success'))}}
		@endif	
		{{Form::close()}}
	@endif

@stop

@section('main')
	@if($user->pictures->count() > 0)
	<ul>
		@foreach($user->pictures as $picture)
		<li class="container">			
			<a href="{{URL::route('picture.show', $picture->id)}}" class="row">
				<img class="col-md-4" src="{{asset($picture->basedir . $picture->filename)}}">
			</a>
		</li>
		@endforeach
	</ul>
	@else
		<p>El usuario no ha subido fotos.</p>	
	@endif
@stop