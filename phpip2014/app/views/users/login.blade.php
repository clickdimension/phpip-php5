@extends('users/layout')


@section('content')


		<h1>Acceso al sistema</h1>
        <p class="lead">Ingrese sus credenciales.</p>

{{ Form::open(array('route' => 'login', 'method' => 'POST'), array('role' => 'form')) }}

    <div class="row col-md-4">
        <div class="form-group">
            {{ Form::label('username', 'Usuario') }}
            {{ Form::text('username', Input::old('username'), array('placeholder' => 'operador', 'class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::password('password', array('placeholder'=>'Contraseña', 'class' => 'form-control')) }}
        </div>

       {{ Form::button('Log in !', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
    </div>

    {{ Form::close() }}

@stop



