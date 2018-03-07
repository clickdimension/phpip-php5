@extends('layout')


@section('webmodulo')
<a href="{{ route('adminusers.index') }}" >Administración de usuarios</a>
@stop


@section('content')

<!-- if there are creation errors, they will show here -->
<!-- http://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers -->

<p class="lead">Modificar Usuario</p>

<div class="row col-md-4">
{{ Form::model($post, array('route' => array('adminusers.update', $post->id), 'method' => 'PATCH'), array('role' => 'form')) }}

        <div class="form-group">
            {{ Form::label('username', 'Nombre de usuario') }}
            @if ($post->name != 'admin')
            {{ Form::text('username', Input::old('username'), array('placeholder' => 'usuario', 'class' => 'form-control')) }}
            @else
            {{ $post->username }}
            @endif
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
            'disabled'     => 'disabled',
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

        {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

        <a href="{{ route('adminusers.index') }}" class="btn btn-default">Cancelar</a>

                @if ($post->name != 'admin')
                 <!-- Button trigger modal -->
  <a data-toggle="modal" href="#myModal" class="btn btn-danger">Eliminar</a>
              @endif

{{ Form::close() }}
 
</div>


 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Eliminar Usuario</h4>
        </div>
        <div class="modal-body">
        Está seguro que desea eliminar el <br/>
        Usuario: {{ $post->username }} <br/>
        id: {{ $post->id }} ?
        </div>
        <div class="modal-footer">
          {{ Form::model($post, array('route' => array('adminusers.destroy', $post->id), 'method' => 'DELETE'), array('role' => 'form')) }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@stop
