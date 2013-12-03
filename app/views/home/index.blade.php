@extends('layouts.master')

@section('title') Pictlr - Bienvenido @stop

@section('header')
<div class="row">
	<h1>Bienvenido a Pictlr</h1>
</div>
<div class="row">
	<h2>Social Pics!!</h2>
</div>
@stop		

@section('main')
<footer class="row">
	<a href="{{URL::to('login')}}" class="btn btn-primary">Inicia Sesión</a>
	<a href="{{URL::route('user.create')}}" class="btn btn-success">Regístrate</a>
</footer>
@stop
