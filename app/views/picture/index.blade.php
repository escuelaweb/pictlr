@extends('layouts.master')

@section('title')
	Pictlr - Últimas fotos
@stop

@section('header')
	<h1>Pictlr - Últimas Fotos</h1>
@stop

@section('main')

	<ul class="container">
	@foreach($pictures as $picture)
		<li class="row">			
			<img src="{{asset($picture->basedir . $picture->filename)}}" class="col-md-2">
			<h3 class="col-md-4">Foto por <a href="{{URL::route('user.show', $picture->user->id)}}">{{$picture->user->username}}</a></h3>
		</li>
	@endforeach
	</ul>

@stop