<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Buscar detalles de IP</h4>
        </div>

          {{ Form::open(array('route' => 'buscar', 'method' => 'POST'), array('role' => 'form')) }}

        <div class="modal-body">
            <div class="form-group">
                {{ Form::label('searchterm', 'Buscar en') }}
    {{ Form::select('searchfield', array(
            'ip'       => 'IP',
            'id_cliente'     => 'ID CLiente',
            'client'     => 'Cliente',
            'clientcontact'     => 'Contacto',
            'email'     => 'Email',
            'direccion'     => 'Direccion',
            's_n'     => 'Serial',
        ), 'client') }}
            </div>

            <div class="form-group">
            {{ Form::text('searchterm', Input::old('searchterm'), array('placeholder' => 'nombre del cliente, ip ...', 'class' => 'form-control')) }}
            </div>
        </div>

        <div class="modal-footer">
        {{ Form::button('<span class="glyphicon glyphicon-search"></span> Buscar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
             <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>

        {{ Form::close() }}

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
