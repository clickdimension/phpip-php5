@extends('layout')

@section('webmodulo')
<a>Acerca de..</a>
@stop

@section('content')

      <table>
          <tr><td><img src="imagenes/acerca_clasify_v094.png" /></td>
          <td><b>Sistema clon phpIP.</b>
          <br><br>
          Clon del software <a href="http://www.phpip.net/console.php">PHPip</a> adaptado a versión actualizada de PHP de servidores actuales.
          <br><br>
          
          </td>
          </tr>
      </table>
      
        <a data-toggle="modal" href="#myModal" class="btn btn-default">(c)</a>

<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Autor</h4>
        </div>
        <div class="modal-body">
        Made by: <br/>
        Klemens Häckel <br/>
        2014
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- <div>by Klemens Häckel</div> //-->
@stop
