@extends('layouts.external')

@section('title') Pictlr - Registro @stop

@section('content')
<div id="register-content" class="container">
	<div class="row">
		<h1 class="col-md-6 col-md-offset-3">Pictlr - Crea tu cuenta</h1>
	</div>
	
	<div class="row">
		<h2 class="col-md-6 col-md-offset-3">Al registrarte podrás compartir fotos con miles de personas en todo el mundo.</h2>
	</div>

	@if(Session::has('message'))
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<p class="alert alert-danger">{{Session::get('message')}}</p>
		</div>
	</div>
	@endif

	{{Form::open(array('route' => 'user.store', 'method' => 'POST'))}}
		<fieldset class="row form-group">
			<div class="col-md-6 col-md-offset-3">
				{{Form::label('name', 'Nombre: ')}}

				@if($errors->has('name'))
				{{Form::label('name', $errors->first('name'), array('class' => 'label label-warning'))}}
				@endif

				{{Form::text('name', Input::old('name'), array('class' => 'form-control'))}}
			</div>		
		</fieldset>
		<fieldset class="row form-group">
			<div class="col-md-6 col-md-offset-3">
				{{Form::label('username', 'Nombre de Usuario: ')}}

				@if($errors->has('username'))
				{{Form::label('username', $errors->first('username'), array('class' => 'label label-warning'))}}
				@endif

				{{Form::text('username', Input::old('username'), array('class' => 'form-control'))}}
			</div>		
		</fieldset>
		<fieldset class="row form-group">
			<div class="col-md-6 col-md-offset-3">
				{{Form::label('email', 'Email: ')}}

				@if($errors->has('email'))
				{{Form::label('email', $errors->first('email'), array('class' => 'label label-warning'))}}
				@endif

				{{Form::email('email', Input::old('email'), array('class' => 'form-control'))}}
			</div>		
		</fieldset>
		<fieldset class="row form-group">
			<div class="col-md-6 col-md-offset-3">
				{{Form::label('password', 'Contraseña: ')}}
				
				@if($errors->has('password'))
				{{Form::label('password', $errors->first('password'), array('class' => 'label label-warning'))}}
				@endif

				{{Form::password('password', array('class' => 'form-control'))}}
			</div>		
		</fieldset>
		<fieldset class="row form-group">
			<div class="col-md-6 col-md-offset-3">
				{{Form::label('password_confirmation', 'Confirma tu contraseña: ')}}

				@if($errors->has('password_confirmation'))
				{{Form::label('password_confirmation', $errors->first('password_confirmation'), array('class' => 'label label-warning'))}}
				@endif

				{{Form::password('password_confirmation', array('class' => 'form-control'))}}
			</div>		
		</fieldset>
		<fieldset class="form-group row">
			<div class="col-md-6 col-md-offset-3">
			<input type="submit" class="btn btn-success" value="Regístrate" />
			</div>		
		</fieldset>									
	{{Form::close()}}
</div>
@stop



