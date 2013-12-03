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
<header class="row">Bienvenido {{Auth::user()->name}} <a href="{{URL::to('/logout')}}">Cerrar Sesión</a></header>
@stop