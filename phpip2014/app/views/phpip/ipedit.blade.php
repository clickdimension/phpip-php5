@extends('layout')


@section('content')
    <p class="lead">Detalle de IP</p>

    <div class="form-group">                    
        <!-- Button trigger modal -->
      <a data-toggle="modal" href="#myModal" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar de nuevo</a>
        <a href="{{ route('buscar') }}" class="btn btn-default">Volver al listado</a>
    </div>
{{ Form::model($post, array('route' => array('ipinfo.update', $post->id), 'method' => 'PATCH'), array('role' => 'form')) }}

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('ip', 'IP') }}
		<br>&nbsp;<b>{{  $post->ip }}</b>
                <!-- {{ Form::text('ip', Input::old('ip'), array('placeholder' => 'IP', 'class' => 'form-control')) }}
//-->
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('mask', 'Mascara') }}
                {{ Form::text('mask', Input::old('mask'), array('placeholder' => 'Mascara', 'class' => 'form-control')) }}
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('ip_gw_lan', 'IP Gateway') }}
                {{ Form::text('ip_gw_lan', Input::old('ip_gw_lan'), array('placeholder' => 'IP Gateway', 'class' => 'form-control')) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('client', 'Nombre cliente') }}
                {{ Form::text('client', Input::old('client'), array('placeholder' => 'Nombre cliente', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('direccion', 'Direccion') }}
                {{ Form::text('direccion', Input::old('direccion'), array('placeholder' => 'Direccion', 'class' => 'form-control')) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('id_cliente', 'ID cliente') }}
                {{ Form::text('id_cliente', Input::old('id_cliente'), array('placeholder' => 'ID cliente', 'class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('clientcontact', 'Contacto') }}
                {{ Form::text('clientcontact', Input::old('clientcontact'), array('placeholder' => 'Contacto', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'Telefono') }}
                {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'Telefono', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email'), array('placeholder' => 'email', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('fecha_inicio', 'Fecha inicio') }}
                {{ Form::text('fecha_inicio', Input::old('fecha_inicio'), array('class' => 'form-control','placeholder' => 'Fecha inicio','data-datepicker' => 'datepicker')) }}
            </div>


        </div>

        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('celda', 'Celda') }}<br/>
    {{ Form::select('celda', array(
        '' => '-- Punto de acceso --',
            'C01-Siemens'       => 'C01-Siemens',
            'C02-Sapucai'     => 'C02-Sapucai',
            'C03-Radco'     => 'C03-Radco',
            'C04-Garantia'     => 'C04-Garantia',
            'C05-Villa Elisa'     => 'C05-Villa Elisa',
            'C07-Canal9'     => 'C07-Canal9',
            'C10-Torre del Sol'     => 'C10-Torre del Sol',
            'C12-Lambare'     => 'C12-Lambare',
            'C13-Zavalas Cue'     => 'C13-Zavalas Cue',
            'C14-Caballeria'     => 'C14-Caballeria',
            'C15-Luque'     => 'C15-Luque',
            'C115-San Lorenzo'     => 'C115-San Lorenzo',
            'OLT101-Siemens'     => 'OLT101-Siemens',
            'OLT103-Garantia'     => 'OLT103-Garantia',
            'OLT105-Emergencias'     => 'OLT105-Emergencias',
            'OLT107-Torre del Sol'     => 'OLT107-Torre del Sol',
            'OLT109-Mariano'     => 'OLT109-Mariano',
            'OLT121-Fernando'     => 'OLT121-Fernando',
            'OLT123-Luque-SLO'     => 'OLT123-Luque-SLO',
            'Fibra directa'     => 'Fibra directa',
            'Fibra Teisa'     => 'Fibra Teisa',
            'Conexion directa'     => 'Conexion directa',
            'NOC-CORE'     => 'NOC-CORE',
            'RIEDER-Corporativo'     => 'RIEDER-Corporativo',
          ), Input::old('celda')) }}
            </div>
            <div class="form-group">
                {{ Form::label('downlink', 'Downlink/Sector') }}
                {{ Form::text('downlink', Input::old('downlink'), array('placeholder' => 'Downlink Int.', 'class' => 'form-control')) }}
            </div>
<!--            <div class="form-group">
                {{ Form::label('uplink', 'Uplink Int.') }}
                {{ Form::text('uplink', Input::old('uplink'), array('placeholder' => 'Uplink Int.', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('downlink_nac', 'Downlink Nac.') }}
                {{ Form::text('downlink_nac', Input::old('downlink_nac'), array('placeholder' => 'Downlink Nac.', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('uplink_nac', 'Uplink Nac.') }}
                {{ Form::text('uplink_nac', Input::old('uplink_nac'), array('placeholder' => 'Uplink Nac.', 'class' => 'form-control')) }}
            </div>
//-->
            
            <div class="form-group">
                {{ Form::label('equipo', 'Equipo') }}
                {{ Form::text('equipo', Input::old('equipo'), array('placeholder' => 'Equipo', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('marca', 'Marca/Plan') }}
                {{ Form::text('marca', Input::old('marca'), array('placeholder' => 'Marca', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('modelo', 'Modelo') }}
                {{ Form::text('modelo', Input::old('modelo'), array('placeholder' => 'Modelo', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('s_n', 'Serial') }}
                {{ Form::text('s_n', Input::old('s_n'), array('placeholder' => 'Serial', 'class' => 'form-control')) }}
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

<!--            <div class="form-group">
                {{ Form::label('description', 'Descripcion') }}
                {{ Form::textarea('description', Input::old('description'), array('placeholder' => 'descripcion', 'class' => 'form-control')) }}
            </div>
//-->
            <div class="form-group">
                {{ Form::label('notes', 'Notas') }}
                {{ Form::textarea('notes', Input::old('notes'), array('placeholder' => 'Anotaciones', 'class' => 'form-control')) }}
            </div>
        </div>
    </div>
        {{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

 <script>
$(function() {
$( "#fecha_inicio" ).datepicker({ dateFormat: "yy-mm-dd" });
});
</script>

    
@include('popup/buscaripcliente')

@stop
