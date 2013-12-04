@extends('layouts.master')

@section('title')
{{$user->username}} - Pictlr
@stop

@section('header')
<h1>{{$user->username}} - Perfil de Usuario</h1>
<h2>{{$user->name}}</h2>
<h3>Número de visitas: {{$user->view_count}}</h3>
@stop