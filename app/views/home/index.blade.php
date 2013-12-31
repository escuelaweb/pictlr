@extends('layouts.external')

@section('title') Pictlr - Bienvenido @stop

@section('content')
<section id="home-content" class="content jumbotron">
	<div class="container">
		<header>
			<div class="row">
				<h1 class="col-md-6">Bienvenido a Pictlr</h1>
			</div>

			<div class="row">
				<nav class="btn-group col-md-6">
					<a href="{{URL::to('/login')}}" class="btn btn-lg btn-primary">Inicia Sesión</a>
					<a href="{{URL::route('user.create')}}" class="btn btn-lg btn-success">Regístrate</a>
				</nav>
			</div>
		</header>
		<div class="row">
			<aside class="col-md-6">
				<img src="{{asset('img/iPhone-SLR.jpg')}}" alt="Pictlr home image, iPhone with SLR lens">
			</aside>
			<article class="col-md-4">
				<p>
					Pictlr es una aplicación web desarrollada como herramienta de aprendizaje por mí, Leonardo Graterol (<a href="http://www.twitter.com/pankas87">@pankas87</a>), para el curso
					de desarrollo web con Laravel dictado en la Escuela de Diseño Web a un grupo de desarrolladores de la empresa venezolana <a href="http://sim.org.ve/">SIM</a>.
					<br>
					<br>
					En el desarrollo de Pictlr usamos el framework Laravel 4 como tecnología de backend y el framework Bootstrap 3 para el frontend.
				</p>
			</article>
		</div>
	</div>
</section>

@stop
