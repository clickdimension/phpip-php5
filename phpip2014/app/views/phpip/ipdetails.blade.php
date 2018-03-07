@extends('layout')


@section('content')
    <p class="lead">Detalle de IP</p>

    <div class="form-group">                    
        <!-- Button trigger modal -->
      <a data-toggle="modal" href="#myModal" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar de nuevo</a>
            <a href="{{ route('buscar') }}" class="btn btn-default">Volver al listado</a>
    </div>
    
    <table class="table table-hover">
      
          <tr><td>IP</td><td>{{ $post->ip }} </td></tr>
          <tr><td>Mascara</td><td>{{ $post->mask }} </td></tr>
          <tr><td>IP Gateway</td><td>{{ $post->ip_gw_lan }} </td></tr>
          <tr><td>ID Cliente</td><td>{{ $post->id_cliente }} </td></tr>
          <tr><td>Nombre cliente</td><td>{{ $post->client }} </td></tr>

          <tr><td>Contacto</td><td>{{ $post->clientcontact }} </td></tr>
          <tr><td>Telefono</td><td>{{ $post->phone }} </td></tr>
          <tr><td>Email</td><td>{{ $post->email }} </td></tr>
          <tr><td>Direccion</td><td>{{ $post->direccion }} </td></tr>
          <tr><td>Fecha inicio</td><td>{{ date('d/m/Y', strtotime($post->fecha_inicio)) }} </td></tr>

          <tr><td>Celda</td><td>{{ $post->celda }} </td></tr>
          <tr><td>Downlink/Sector</td><td>{{ $post->downlink }} </td></tr>
<!--          <tr><td>Uplink Int.</td><td>{{ $post->uplink }} </td></tr>
          <tr><td>Downlink Nac.</td><td>{{ $post->downlink_nac }} </td></tr>
          <tr><td>Uplink Nac.</td><td>{{ $post->uplink_nac }} </td></tr>
//-->
          <tr><td>Equipo</td><td>{{ $post->equipo }} </td></tr>
          <tr><td>Marca/Plan</td><td>{{ $post->marca }} </td></tr>
          <tr><td>Modelo</td><td>{{ $post->modelo }} </td></tr>
          <tr><td>Serial</td><td>{{ $post->s_n }} </td></tr>
<!--          <tr><td>Descripcion</td><td>{{ $post->description }} </td></tr>
//-->
          <tr><td>Notas / Cacti</td><td>{{ $post->notes }} </td></tr>

@if(Auth::user()->access_level != 'read')
          <tr><td>
              <a href="{{ route('ipinfo.edit', $post->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
       </td>
@endif

      </tr>
    </table>
    
@include('popup/buscaripcliente')

@stop
