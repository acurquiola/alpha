<h5><i align="center" class="fa fa-plane"></i> Información de Vuelo</h5>


<input type="hidden" name="" id="precio_bloque" class="form-control" value="{{$precios_cargas->equivalenteUT}}">	
<input type="hidden" name="" id="toneladas_bloque" class="form-control" value="{{$precios_cargas->toneladaPorBloque}}">	
<input type="hidden" name="" id="ut" class="form-control" value="{{$montos_fijos->unidad_tributaria}}">	
				
<div class="form-group" >
	<label for="fecha" class="col-sm-2 control-label" >Fecha</label>
	<div class="col-sm-10">
		{!! Form::text('fecha', null, [ 'class'=>"form-control fecha", "disabled"=>"disabled",  "placeholder"=>"Fecha"]) !!}
	</div>
</div>
<div class="form-group">
	<label for="aeronave_id" class="col-sm-2 control-label">Aeronave</label>
	<div class="col-sm-10">
		<select class="form-control no-vacio aeronave" name="aeronave_id" required>
			<option value="">--Seleccione Aeronave--</option>
	        @foreach ($aeronaves as $aeronave)
	        <option data-modelo="{{$aeronave->modelo_id}}" data-nombremodelo="{{$aeronave->modelo->modelo}}" data-cliente="{{$aeronave->cliente_id}}" data-tipo="{{$aeronave->tipo_id}}" data-tipoV="{{$aeronave->tipo->nombre}}" value="{{$aeronave->id}}" {{(($carga->aeronave_id == $aeronave->id)?"selected":"")}}> {{$aeronave->matricula}}</option>
   			@endforeach						
		</select>
	</div>
</div>
<div class="form-group">
	<label for="cliente_id" class="col-sm-2 control-label">Cliente</label>
	<div class="col-sm-10">
		<select name="cliente_id" class="form-control cliente">
			<option value="">--Seleccione Cliente--</option>
			@foreach ($clientes as $index=>$cliente)
			<option value="{{$index}}" {{(($carga->cliente_id == $index)?"selected":"")}}> {{$cliente}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group" >
	<label for="num_vuelo" class="col-sm-2 control-label" >Número de Vuelo</label>
	<div class="col-sm-10">
		{!! Form::text('num_vuelo', null, [ 'class'=>"form-control num_vuelo",  "placeholder"=>"Número de Vuelo"]) !!}
	</div>
</div>
<h5><i align="center" class="fa fa-truck"></i> Información de Carga</h5>
<div class="form-group" >
	<label for="peso_embarcado" class="col-sm-2 control-label" >Peso Embarcado (Kgs)</label>
	<div class="col-sm-10">
		{!! Form::text('peso_embarcado', null, [ 'class'=>"form-control peso_embarcado",  "placeholder"=>"Peso Embarcado"]) !!}
	</div>
</div>

<div class="form-group" >
	<label for="peso_embarcado_monto" class="col-sm-2 control-label" >Peso Embarcado (BsF.)</label>
	<div class="col-sm-10">
		{!! Form::text('peso_embarcado_monto', null, [ 'class'=>"form-control peso_embarcado_monto",  "disabled"=>"disabled", "placeholder"=>"Peso Embarcado (BsF)"]) !!}
	</div>
</div>

<div class="form-group" >
	<label for="peso_desembarcado" class="col-sm-2 control-label" >Peso Desembarcado (Kgs)</label>
	<div class="col-sm-10">
		{!! Form::text('peso_desembarcado', null, [ 'class'=>"form-control peso_desembarcado",  "placeholder"=>"Peso Desembarcado"]) !!}
	</div>
</div>

<div class="form-group" >
	<label for="peso_desembarcado_monto" class="col-sm-2 control-label" >Precio del Peso Desembarcado (BsF.)</label>
	<div class="col-sm-10">
		{!! Form::text('peso_desembarcado_monto', null, [ 'class'=>"form-control peso_desembarcado_monto", "disabled"=>"disabled",  "placeholder"=>"Peso Desembarcado (BsF)"]) !!}
	</div>
</div>

<div class="form-group" >
	<label for="monto_total" class="col-sm-2 control-label" >Monto Total</label>
	<div class="col-sm-10">
		{!! Form::text('monto_total', null, [ 'class'=>"form-control monto_total", "disabled"=>"disabled",  "placeholder"=>"Monto Total"]) !!}
	</div>
</div>