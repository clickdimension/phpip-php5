@extends('layout')

@section('webmodulo')
<a class="disabled href="{{ route('adminusers.index') }}" >Administración de usuarios</a>
@stop

@section('content')
    <p class="lead">Listado de Usuarios</p>
    <span class="navbar-right">  {{ $posts->links(); }} </span>
    
    <table class="table table-hover">
      <tr> 
          <th>Username</th>
          <th>Acceso</th>
          <th>Email</th>
          <th><a href="{{ route('adminusers.create') }}" class="btn btn-success btn-xs">* Agregar</a></th>
      </tr>
      
  @foreach ($posts as $post)
      <tr> 
      @if ($post->is_inactive > 0)
          <td><span class="text-warning">{{ $post->username }} </span></td>
          <td><span class="text-warning">{{ $post->access_level }} </span></td>
          <td><span class="text-warning">{{ $post->email }} </span></td>
      @else
          <td>{{ $post->username }} </td>
          <td>{{ $post->access_level }} </td>
          <td>{{ $post->email }} </td>
      @endif

          <td>
              <a href="{{ route('adminusers.edit', $post->id) }}" class="btn btn-primary btn-xs">Modificar</a>
       </td>
      </tr>
  @endforeach
    </table>

@stop
