@extends('layout')


@section('webmodulo')
<a href="{{ route('adminusers.index') }}" >Administración de usuarios</a>
@stop


@section('content')

<!-- if there are creation errors, they will show here -->
<!-- http://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers -->

<p class="lead">Nuevo Usuario</p>

{{ Form::open(array('route' => 'adminusers.store', 'method' => 'POST'), array('role' => 'form')) }}

<div class="row col-md-4">

        <div class="form-group">
            {{ Form::label('username', 'Nombre de usuario') }}
            {{ Form::text('username', Input::old('username'), array('placeholder' => 'usuario', 'class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'operador@rieder.com.py', 'class' => 'form-control')) }}
        </div>

            <div class="form-group">
                {{ Form::label('access_level', 'Nivel de acceso') }}
                <br/>
    {{ Form::select('access_level', array(
            'admin'       => 'admin',
            'read/write'     => 'read/write',
            'read'     => 'read',
        ), Input::old('access_level')) }}
            </div>
<hr>

        <div class="form-group">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::password('password', array('placeholder'=>'Contraseña', 'class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('password2', 'Repetir contraseña') }}
            {{ Form::password('password2', array('placeholder'=>'Repetir contraseña', 'class' => 'form-control')) }}
        </div>

  {{ Form::button('Crear', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
    <a href="{{ route('adminusers.index') }}" class="btn btn-default">Cancelar</a>
</div>

{{ Form::close() }}

@stop
