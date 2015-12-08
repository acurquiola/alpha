<!-- Configuración del Precio por habilitación -->
<div class="col-sm-4 invoice-col">

	<!-- Configuración del Precio del Formulario -->
	<div class="box box-success cargosVariosBox">
		<div class="box-header">
			<h5>Formulario <small></br>Costo</small></h5>
		</div>
		<div class="box-body">

			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Precio: </label>
				<div class="input-group"> 
					<div class="input-group-addon">
						Establecido: 
					</div>
					{!! Form::text('eq_formulario', null, [ 'class'=>"form-control eq_formulario","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->	
			<!-- Precio -->
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					<input type="text" id="precioFormulario-input" class="form-control"  disabled/>
				</div><!-- /.input group -->
			</div><!-- /.form group -->		
			<div class="form-group" >
				<label>Concepto Crédito:  </label><br/>

				{!! Form::select('formularioCredito_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>	

			<div class="form-group" >
				<label>Concepto Contado: </label><br/>

				{!! Form::select('formularioContado_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>					
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div>

<div class="col-sm-4 invoice-col">
	<div class="box box-success cargosVariosBox">
		<div class="box-header">
			<h5>Derecho de Habilitación <small></br>Costo</small></h5>
		</div>
		<div class="box-body">


			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Precio: </label>
				<div class="input-group"> 
					<div class="input-group-addon">
						Establecido: 
					</div>
					{!! Form::text('eq_derechoHabilitacion', null, [ 'class'=>"form-control eq_derechoHabilitacion","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->	
			<!-- Precio -->
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					<input type="text" id="precioDerechoHabilitacion-input" class="form-control"  disabled/>
				</div><!-- /.input group -->
			</div><!-- /.form group -->	
			<div class="form-group" >
				<label>Concepto Crédito:  </label><br/>

				{!! Form::select('habilitacionCredito_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>	

			<div class="form-group" >
				<label>Concepto Contado: </label><br/>

				{!! Form::select('habilitacionContado_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>					
		</div><!-- /.box-body -->
	</div><!-- /.box -->		
</div><!-- /.col -->

<!-- Configuración del Precio del uso de Abordaje -->
<div class="col-sm-4 invoice-col">
	<div class="box box-success cargosVariosBox">
		<div class="box-header">
			<h5>Derecho de Uso de Abordaje <small></br>Con/Sin Habilitación</small></h5>
		</div>
		<div class="box-body">

			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Precio por bloque <b>SIN</b> habilitación: </label>
				<div class="input-group"> 
					<div class="input-group-addon">
						Establecido: 
					</div>
					{!! Form::text('eq_usoAbordajeSinHab', null, [ 'class'=>"form-control eq_usoAbordajeSinHab","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->	
			<!-- Precio -->
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					<input type="text" id="preciousoAbordajeSinHab-input" class="form-control"  disabled/>
				</div><!-- /.input group -->
			</div><!-- /.form group -->


			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Precio por bloque <b>CON</b> habilitación: </label>
				<div class="input-group"> 
					<div class="input-group-addon">
						Establecido: 
					</div>
					{!! Form::text('eq_usoAbordajeConHab', null, [ 'class'=>"form-control eq_usoAbordajeConHab","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->	
			<!-- Precio -->
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					<input type="text" id="preciousoAbordajeConHab-input" class="form-control" disabled/>
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group" >
				<label>Concepto Crédito:  </label><br/>

				{!! Form::select('abordajeCredito_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>	

			<div class="form-group" >
				<label>Concepto Contado: </label><br/>

				{!! Form::select('abordajeContado_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>								
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->