@extends('users/layout')


@section('content')

		<h1>Cambio de contraseña</h1>
        <p class="lead">Ingrese la contraseña nueva.</p>
        <p>Usuario: {{ Auth::user()->username }}</p>

{{ Form::open(array('route' => 'users.pass', 'method' => 'POST'), array('role' => 'form')) }}

    <div class="row col-md-4">
        <div class="form-group">
            {{ Form::label('password', 'Nueva contraseña') }}
            {{ Form::password('password', array('placeholder'=>'Contraseña', 'class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password2', 'Repitir contraseña') }}
            {{ Form::password('password2', array('placeholder'=>'Contraseña', 'class' => 'form-control')) }}
        </div>

       {{ Form::button('Cambiar !', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
    </div>

    {{ Form::close() }}

@stop



