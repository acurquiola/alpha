	<!-- Configuración del Precio del Estacionamiento y espacio libre -->
	<div class="col-sm-4 invoice-col">
		<div class="box box-danger estacionamientoBox">
			<div class="box-header">
				<h5>Internacionales<small></br>Bloque sin cargo y Precio por bloque</small></h5>
			</div>
			<div class="box-body">
				<!-- Espacio de Tiempo Libre-->
				<div class="bootstrap-timepicker">
					<div class="form-group">
						<label>Minutos Libres: </label>
						<div class="input-group">
							{!! Form::text('tiempoLibreInt', null, [ 'class'=>"form-control tiempoLibreInt","placeholder"=>"Minutos libres de cargo"]) !!}
					<input type="hidden" name="aeropuerto_id" value="{{session('aeropuerto')->id}}"></input>
							<div class="input-group-addon">
								min <i class="fa fa-clock-o"></i>
							</div>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				</div>


				<!-- Equivalente de la UT-->
				<div class="form-group">
					<label>Precio por bloque: </label>
					<div class="input-group"> 
						<div class="input-group-addon">
							Equivalente: 
						</div>
							{!! Form::text('eq_bloqueInt', null, [ 'class'=>"form-control eq_bloqueInt","placeholder"=>"Equivalente de la UT por bloque", "readonly"=>"readonly"]) !!}
						</div><!-- /.input group -->
				</div><!-- /.form group -->	
				<!-- Precio -->
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-money"></i> BsF. 
						</div>
							{!! Form::text('precio_estInt', null, ["id"=>"precio_estInt-input" 'class'=>"form-control precio_estInt","placeholder"=>"Precio Establecido"]) !!}
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<!-- Definición de Bloque -->
				<div class="bootstrap-timepicker">
					<div class="form-group">
						<label>Cantidad de minutos por bloque a cobrar: </label>
						<div class="input-group">
							{!! Form::text('minBloqueInt', null, [ 'class'=>"form-control minBloqueInt","placeholder"=>"Minutos por bloque de tiempo"]) !!}
							<div class="input-group-addon">
								min <i class="fa fa-clock-o"></i>
							</div>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				</div>								
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div> <!-- /.col -->

	<!-- Configuración del Precio del Estacionamiento y espacio libre -->
	<div class="col-sm-4 invoice-col">
		<div class="box box-danger estacionamientoBox">
			<div class="box-header">
				<h5>Nacionales<small></br>Bloque sin cargo y Precio por bloque</small></h5>
			</div>
			<div class="box-body">
				<!-- Espacio de Tiempo Libre-->
				<div class="bootstrap-timepicker">
					<div class="form-group">
						<label>Minutos Libres: </label>
						<div class="input-group">
							{!! Form::text('tiempoLibreNac', null, [ 'class'=>"form-control tiempoLibreNac","placeholder"=>"Minutos libres de cargo"]) !!}
							<div class="input-group-addon">
								min <i class="fa fa-clock-o"></i>
							</div>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				</div>


				<!-- Equivalente de la UT-->
				<div class="form-group">
					<label>Precio por bloque: </label>
					<div class="input-group"> 
						<div class="input-group-addon">
							Equivalente: 
						</div>
							{!! Form::text('eq_bloqueNac', null, [ 'class'=>"form-control eq_bloqueNac","placeholder"=>"Equivalente de la UT por bloque",  "readonly"=>"readonly"]) !!}
					</div><!-- /.input group -->
				</div><!-- /.form group -->	
				<!-- Precio -->
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-money"></i> BsF. 
						</div>
							{!! Form::text('precio_estNac', null, ["id"=>"precio_estNac-input" 'class'=>"form-control precio_estNac","placeholder"=>"Precio Establecido"]) !!}
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<!-- Definición de Bloque -->
				<div class="bootstrap-timepicker">
					<div class="form-group">
						<label>Cantidad de minutos por bloque a cobrar: </label>
						<div class="input-group">
							{!! Form::text('minBloqueNac', null, [ 'class'=>"form-control minBloqueNac","placeholder"=>"Minutos por bloque de tiempo"]) !!}
							<div class="input-group-addon">
								min <i class="fa fa-clock-o"></i>
							</div>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				</div>								
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</div> <!-- /.col -->

	
<!-- Definicion de Partida Presupuestaria -->
<div class="col-sm-4 invoice-col">
	<div class="box box-warning estacionamientoBox">
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