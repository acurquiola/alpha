<p class="help-block text-right"><span class="text-danger">*</span> Campos obligatorios</p>
<div class="form-group">

	<label for="aeropuerto_id" class="col-xs-1  control-label"><strong>Aeropuerto<span class="text-danger">*</span></strong> </label>
	<div class="col-xs-3">
		{!! Form::hidden('aeropuerto_id', session('aeropuerto')->id,[ 'class'=>"form-control", "readonly"=>"true"]) !!}
		{!! Form::text(null, session('aeropuerto')->nombre,[ 'class'=>"form-control", "readonly"=>"true"]) !!}
	</div>
	<label for="condicionPago" class="col-xs-1 control-label"><strong>Cond. de pago<span class="text-danger">*</span></strong> </label>
	<div class="col-xs-3">
	@if(!isset($bloqueoDosa))
		{!! Form::select('condicionPago', ["Crédito" => "Crédito", "Contado"=>"Contado"], null, [ 'class'=>"form-control", $disabled]) !!}
	@else		
		{!! Form::text('condicionPago', $condicionPago, [ 'class'=>"form-control", $disabled] ) !!}
	@endif
	</div>
	<label for="nControl" class="col-xs-1 control-label"><strong>N° Control<span class="text-danger">*</span></strong> </label>
	<div class="col-xs-3">
		{!! Form::text('nControl', null, [ 'class'=>"form-control", $disabled,"data-empty"=>"false", "data-type"=>"int", "data-name"=>"Número de control"]) !!}
	</div>
</div>
<div class="form-group">
	<label for="nFactura" class="col-xs-1 control-label"><strong>N° Factura<span class="text-danger">*</span></strong> </label>
	<div class="col-xs-3">
		{!! Form::text('nFactura', null, [ 'class'=>"form-control", $disabled,"data-empty"=>"false", "data-type"=>"int", "data-name"=>"Número de factura"]) !!}
	</div>

	<label for="inputEmail3" class="col-xs-1  control-label"><strong>Fecha<span class="text-danger">*</span> </strong></label>
	<div class="col-xs-3">
		{!! Form::text('fecha', null, [ 'class'=>"form-control", $disabled, "id" =>"fecha"] ) !!}
	</div>

	@if(!isset($bloqueoDosa) || isset($facturaCarga))
	<label for="inputEmail3" class="col-xs-1  control-label"><strong>Fecha Venc.<span class="text-danger">*</span> </strong></label>
	<div class="col-xs-3">
		{!! Form::text('fechaVencimiento', null, [ 'class'=>"form-control", $disabled, "id" =>"fechaVencimiento"]) !!}
		@if(isset($facturaCarga))
					{!! Form::hidden('carga_id', $carga_id) !!}
		@endif
	</div>
	@else
	<label for="inputEmail3" class="col-xs-1  control-label"><strong>Nro. Dosa<span class="text-danger">*</span> </strong></label>
	<div class="col-xs-3 ">
		{!! Form::text('nroDosa', null, [ 'class'=>"form-control", $disabled]) !!}
		{!! Form::hidden('fechaVencimiento') !!}
		{!! Form::hidden('despegue_id', $despegue_id) !!}
	</div>
	@endif

</div>
<div class="form-group">
	<label for="cliente-select" class="control-label col-xs-1"><strong>Cliente<span class="text-danger">*</span></strong></label>
	<div class="col-xs-4">
		<select id="cliente-select" class="form-control" name="cliente_id" autocomplete="off" @if(!isset($bloqueoDosa)) readonly @endif>
			<option value="0" > --Seleccione un cliente-- </option>
			@foreach($clientes as $c)
			<option {{($c->id==$factura->cliente_id)?"selected":""}} value="{{$c->id}}" data-nombre="{{$c->nombre}}" data-ced-rif="{{$c->cedRif}}" data-ced-rif-prefix="{{$c->cedRifPrefix}}">{{$c->codigo}}</option>
			@endforeach
		</select>
	</div>
	@if($disabled!="disabled" && !isset($bloqueoDosa))
	<div class="col-xs-1">
		<button type="button" class="btn btn-primary" id="advance-search-btn" data-toggle="modal" data-target="#advance-search-modal"> <span class="glyphicon glyphicon-search"></span></button>
	</div>
	@endif
	<div class="col-xs-3">
		<input class="form-control" id="cliente_nombre-input" readonly autocomplete="off">
	</div>
	<div class="col-xs-3">
		<input class="form-control" id="cliente_cedRif-input" readonly autocomplete="off">
	</div>

</div>

@if(!isset($bloqueoDosa))
<div class="form-group">
	<label for="concepto-input" class="control-label col-xs-1"><strong>Concepto<span class="text-danger">*</span></strong></label>
	<div class="col-xs-4">
		<select id="concepto-select" class="form-control">
			<option value="0" > --Seleccione un concepto-- </option>
			@foreach($conceptos as $c)
			<option value="{{$c->id}}" data-costo="{{$c->costo}}">{{$c->nompre}}</option>
			@endforeach
		</select>
	</div>
	@if($disabled!="disabled")
	<div class="col-xs-7">
		<btn class="btn btn-primary" href="" id="add-conceptop-btn"><span class="glyphicon glyphicon-plus"></span></btn>
	</div>
	@endif
</div>
@endif

<div class="table-responsive"  style="margin-bottom:50px">
	<table class="table text-center" id="concepto-table">
		<thead class="bg-primary">
			<tr>
				<th style="min-width:90">Concepto</th>
				<th style="min-width:90">Cantidad</th>
				<th style="min-width:90">Monto Neto</th>
				<th style="min-width:90">% Descuento</th>
				<th style="min-width:90">Monto Descuento</th>
				<th style="min-width:90">% IVA</th>
				<th style="min-width:90">% Recargo</th>
				<th style="min-width:90">Monto Recargo</th>
				<th style="min-width:90">Monto Total</th>
				@if($disabled!="disabled" && !isset($bloqueoDosa))<th style="min-width:90">Acción</th>@endif
			</tr>
		</thead>

		<tbody>

			@if(isset($factura->detalles))
			@foreach($factura->detalles as $detalle)

			<tr>
				<td style="text-align: left"><input type="hidden" name="concepto_id[]" value="{{$detalle->concepto_id}}" autocomplete="off" />{{$detalle->concepto->nompre}}</td>
				<td><input {{$disabled}} class="form-control cantidad-input text-right" value="{{$detalle->cantidadDes}}" name="cantidadDes[]"  autocomplete="off" /></td>
				<td><input {{$disabled}} class="form-control monto-input text-right" value="{{$detalle->montoDes}}" name="montoDes[]"  autocomplete="off" /> </td>
				<td><input {{$disabled}} class="form-control descuentoPer-input text-right" value="{{$detalle->descuentoPerDes}}" name="descuentoPerDes[]"  autocomplete="off" /></td>
				<td><input {{$disabled}} class="form-control descuentoTotal-input text-right" value="{{$detalle->descuentoTotalDes}}" name="descuentoTotalDes[]"  autocomplete="off" /></td>
				<td><input {{$disabled}} class="form-control iva-input text-right" value="{{$detalle->ivaDes}}" name="ivaDes[]"  autocomplete="off" /></td>
				<td><input {{$disabled}} class="form-control recargoPer-input text-right" value="{{$detalle->recargoPerDes}}" name="recargoPerDes[]"  autocomplete="off" /></td>
				<td><input {{$disabled}} class="form-control recargoTotal-input text-right" value="{{$detalle->recargoTotalDes}}" name="recargoTotalDes[]"  autocomplete="off" /></td>
				<td><input {{$disabled}} class="form-control total-input text-right" value="{{$detalle->totalDes}}" readonly name="totalDes[]"  autocomplete="off" /></td>

				@if($disabled!="disabled" && !isset($bloqueoDosa))
				<td><button type="button" class="btn btn-danger eliminar-concepto-btn"><span class="glyphicon glyphicon-remove"></span></button></td>
				@endif
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot style="background-color: #f3f3f3">
			<tr>
				<td><label  style="padding-top: 10px; text-align: left"><strong>Totales</strong></label></td>
				<td></td>
				<td>
					{!! Form::text('subtotalNeto', null, [ 'class'=>"form-control text-right", $disabled, "id" =>"subtotalNeto-doc-input", "autocomplete"=>"off", "readonly"]) !!}

				</td>
				<td></td>
				<td>
					{!! Form::text('descuentoTotal', null, [ 'class'=>"form-control text-right", $disabled, "id" =>"descuentoTotal-doc-input", "autocomplete"=>"off", "readonly"]) !!}
					{!! Form::hidden('subtotal', null, [ 'class'=>"form-control text-right", $disabled, "id" =>"subtotal-doc-input", "autocomplete"=>"off", "readonly"]) !!}

				</td>
				<td>
					{!! Form::text('iva', null, [ 'class'=>"form-control text-right", $disabled, "id" =>"iva-doc-input", "autocomplete"=>"off", "readonly"]) !!}

				</td>
				<td></td>
				<td>
					{!! Form::text('recargoTotal', null, [ 'class'=>"form-control text-right", $disabled, "id" =>"recargoTotal-doc-input", "autocomplete"=>"off", "readonly"]) !!}

				</td>
				<td>
					{!! Form::text('total', null, [ 'class'=>"form-control text-right", $disabled, "id" =>"total-doc-input", "autocomplete"=>"off", "readonly"]) !!}

				</td>
				@if($disabled!="disabled")
				<td></td>
				@endif
			</tr>



		</tfoot>
	</table>
</div>

<div class="form-group">
	<label for="descripcion" class="col-xs-1 control-label"><strong>Descripción<span class="text-danger">*</span></strong></label>
	<div class="col-xs-11">
		{!! Form::textarea('descripcion', null, [ 'style'=>'padding-top:4px' ,'class'=>"form-control", $disabled , 'rows'=>"5", 'cols'=>"", "placeholder" => "Descripción de la factura"]) !!}
	</div>
</div>
<div class="form-group">
	<label for="comentario" class="col-xs-1 control-label"><strong>Comentario</strong></label>
	<div class="col-xs-11">
		{!! Form::textarea('comentario', null, [ 'style'=>'padding-top:4px' ,'class'=>"form-control", $disabled , 'rows'=>"5", 'cols'=>"", "placeholder" => "Uso interno"]) !!}
	</div>
</div>
