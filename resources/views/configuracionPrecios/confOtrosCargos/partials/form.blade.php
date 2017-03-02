<div class="form-group">
	<label for="nombre_cargo" class="col-sm-2 control-label">Nombre</label>
	<div class="col-sm-10">
		{!! Form::text('nombre_cargo', null, [ 'class'=>"form-control", $disabled, "placeholder"=>"Nombre del concepto", "maxlength"=>"255"]) !!}

	</div>
</div> 

<div class="form-group" >
	<label for="precio_cargo" class="col-sm-2 control-label" >Bs. </label>
	<div class="col-sm-10">
		{!! Form::text('precio_cargo', null, [ 'class'=>"form-control", $disabled, "placeholder"=>"Monto"]) !!}

	</div>
</div>
<div class="form-group">
	<label for="telefono" class="col-sm-2 control-label">Concepto Crédito</label>
	<div class="col-sm-10">
		{!! Form::select('conceptoCredito_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
	</div>
</div>
<div class="form-group">
	<label for="telefono" class="col-sm-2 control-label">Concepto Contado</label>
	<div class="col-sm-10">
		{!! Form::select('conceptoContado_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
	</div>
</div>