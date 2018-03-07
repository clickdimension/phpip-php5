@extends('layout')


@section('content')
    <p class="lead">Listado de IPs</p>
    <p>Buscando: {{ $buscando }} - total: {{ $contador }}</p>
    <span class="navbar-right">  {{ $posts->links(); }} </span>
    
    <table class="table table-hover">
      <tr> 
          <th>IP</th>
          <th>Mascara</th>
          <th>Velocidad</th>
          <th>Cliente</th>
          <th>Teléfono</th>
          <th>Celda</th>
           <th>&nbsp;</th>
      </tr>
      
  @foreach ($posts as $post)
      <tr> 
          <td>{{ $post->ip }} </td>
          <td>{{ $post->mask }} </td>
          <td>{{ $post->downlink }} </td>
          <td>{{ $post->client }} </td>
          <td>{{ $post->phone }} </td>
          <td>{{ $post->celda }} </td>
          <td>
              <a href="{{ route('ipinfo.show', $post->id) }}" class="btn btn-primary btn-xs"> Detalles</a>
       </td>
      </tr>
  @endforeach
    </table>

@stop
