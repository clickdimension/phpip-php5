@extends('layout')


@section('content')
    <p class="lead">Listado de Busqueda</p>
    <p>Buscando: {{ $buscando }} (en {{ $buscando_in }}) - total: {{ $contador }}</p>

    <div class="form-group">                    
        <!-- Button trigger modal -->
      <a data-toggle="modal" href="#myModal" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar de nuevo</a>
      
      <span class="navbar-right">  {{ $posts->links(); }} </span>
    </div>

    <table class="table table-hover">
      <tr> 
          <th>IP</th>
          <th>Cliente</th>
          <th>ID cliente</th>
          <th>Velocidad</th>
          <th>Dirección</th>
          <th>Teléfono - email</th>
         <!-- <th>Email</th>  //-->
          <th>Celda</th> 
          <th>&nbsp;</th>
      </tr>
      
  @foreach ($posts as $post)
      <tr> 
          <td>{{ $post->ip }} </td>
          <td>{{ $post->client }} </td>
          <td>{{ $post->id_cliente }} </td>
          <td>{{ $post->downlink }} </td>
          <td>{{ $post->direccion }} </td>
          <td>{{ $post->phone }} {{ $post->email }}</td>
          <!-- <td>{{ $post->email }} </td> //-->
          <td>{{ $post->celda }} </td>
          <td>
              <a href="{{ route('ipinfo.show', $post->id) }}" class="btn btn-primary btn-xs">Detalles</a>
       </td>
      </tr>
  @endforeach
    </table>
    
@include('popup/buscaripcliente')

@stop
