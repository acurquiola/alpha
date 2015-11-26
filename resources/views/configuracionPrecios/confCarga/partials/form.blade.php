<div class="col-sm-4 invoice-col">
	<!-- Configuración del Precio por Carga -->
	<div class="box box-success cargaBox">
		<div class="box-header">
			<h5>Carga <small></br>Costo</small></h5>
		</div>
		<div class="box-body">
			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Precio por bloque: </label>
				<div class="input-group"> 
					<div class="input-group-addon">
						Equivalente: 
					</div>
					{!! Form::text('equivalenteUT', null, [ 'class'=>"form-control equivalenteUT","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->	
			<!-- Precio -->
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					<input type="text" class="form-control"  id="equivalenteUT-input" disabled/>
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<!-- Definición de Bloque -->
			<div class="bootstrap-timepicker">
				<div class="form-group">
					<label>Kilogramos por bloque a cobrar: </label>
					<div class="input-group">
						{!! Form::text('toneladaPorBloque', null, [ 'class'=>"form-control toneladaPorBloque","placeholder"=>"Kilogramos por Bloque"]) !!}
						<div class="input-group-addon">
							Kg(s) <i class="ion ion-soup-can-outline"></i>
						</div>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
			</div>			
		</div><!-- /.box-body -->
	</div><!-- /.box -->		
</div><!-- /.col -->

<!-- Definicion de Partida Presupuestaria -->
<div class="col-sm-4 invoice-col">
	<div class="box box-success cargaBox">
		<div class="box-header">
			<h5>Conceptos<small></br>Seleccionar nombre del concepto</small></h5>
		</div>
		<div class="box-body">
			<!-- Precio Diurno-->
			<!-- Equivalente de la UT-->
			<div class="form-group" >
				<label>Concepto Contado: </label><br/>

				{!! Form::select('conceptoContado_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>	

			<div class="form-group" >
				<label>Concepto Crédito: </label><br/>

				{!! Form::select('conceptoCredito_id',	$conceptos, null, [ 'class'=>"form-control"]) !!}
			</div>		
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->