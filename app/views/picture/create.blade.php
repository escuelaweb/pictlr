@extends('layouts.master')

@section('title')
Pictlr - Agregar Foto
@stop

@section('header')
<h1>Sube tu foto</h1>
@stop

@section('main')

@if(Session::has('message'))
<p>{{Session::get('message')}}</p>
@endif

{{Form::open(array('route' => 'picture.store', 'files' => true, 'method' => 'POST'))}}
	<fieldset class="form-group">
		{{Form::label('picture', 'Imagen: ')}}

		@if($errors->has('picture'))
		{{Form::label('picture', $errors->first('picture'))}}
		@endif

		{{Form::file('picture')}}
		<p class="help-block">Debes subir exclusivamente archivos de imagen</p>
	</fieldset>
	<fieldset class="form-group">
		<input type="submit" class="btn btn-success" value="Subir">
	</fieldset>
{{Form::close()}}
@stop