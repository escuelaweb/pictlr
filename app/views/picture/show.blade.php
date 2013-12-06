@extends('layouts.master')

@section('header')
<h1 class="row">Foto por {{$picture->user->name}} ({{$picture->user->username}})</h1>
@stop

@section('main')
<header class="row">
	<a href="{{URL::to('/main')}}">Regresar</a>
</header>
<article class="row">
	<img src="{{asset($picture->basedir . $picture->filename)}}" class="col-md-4">
</article>
<footer class="row">
	
	<div class="col-md-2">
		@if( Auth::user()->likesPicture($picture->id) )
		
		{{Form::open( array('route' => array( 'ops.like', $picture->id, Auth::user()->id ), 'method' => 'POST' ) )}}	
		<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-heart-empty unlike">Me Gusta</span></button>
		
		@else
		
		{{Form::open( array('route' => array( 'ops.unlike', $picture->id, Auth::user()->id ), 'method' => 'DELETE' ) )}}	
		<button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-heart like">Ya No Me Gusta</span></button>
		
		@endif
		
		{{Form::close()}}
	</div>
	
	@if($picture->comments->count() > 0)
	<ul class="col-md-4">	
		@foreach($picture->comments as $comment)
			<li class="panel panel-default">
				<div class="panel-heading">{{$comment->user->username}}</div>
				<div class="panel-body">{{$comment->text}}</div>
			</li>
		@endforeach		
	</ul>
	@else
	<p class="col-md-4">Sé el primero en comentar</p>
	@endif

	{{Form::open(array('route' => 'comment.store', 'method' => 'POST', 'class' => 'col-md-6'))}}
		<fieldset class="form-group">
			<legend>Escribe un comentario: </legend>
			{{Form::text('text', null, array('class' => 'form-control'))}}
		</fieldset>
		<fieldset class="form-group">
			{{Form::hidden('picture_id', $picture->id)}}
			{{Form::submit('Comentar', array('class' => 'btn btn-primary'))}}
		</fieldset>
	{{Form::close()}}
</footer>
@stop