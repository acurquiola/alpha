<div class="row invoice-info">
@foreach ($estacionamientoAeronave as $estacionamientoAeronave) 
    {!! Form::model($estacionamientoAeronave, ['url' =>action('EstacionamientoAeronaveController@update', [$estacionamientoAeronave->id]), "method" => "PUT", "class"=>"form-horizontal"]) !!}
	    @include('configuracionPrecios.confEstacionamientoAeronave.partials.form')
	{!! Form::close() !!}
@endforeach
</div> <!-- /.row -->
<!-- Cancelar o Guardar cambios-->
<hr/>
<div class="row no-print">
	<div class="col-xs-12">
		<button class="btn btn-primary pull-right estacionamientoAeronave-save-btn"  id="estacionamientoAeronave-save-btn"><i class="fa fa-save"></i> Guardar Cambios</button>
	</div>
</div>