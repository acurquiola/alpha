<div class="col-sm-4 invoice-col">

	<div class="box box-warning aterrizajeBox">
		<div class="box-header">
			<h5>Internacionales<small></br>Diurno y Nocturno</small></h5>
		</div>
		<div class="box-body">

			<!-- Precio Diurno-->
			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Diurno: </label><br/>
				<div class="input-group"> 
					<div class="input-group-addon">
						Equivalente: 
					</div>
					{!! Form::text('eq_diurnoInt', null, [ 'class'=>"form-control eq_diurnoInt","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->		

			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					{!! Form::text('precio_diurnoInt', null, ["id"=>"precio_diurnoInt-input", 'class'=>"form-control precio_diurnoInt","placeholder"=>"Precio Establecido", "readonly"=>"readonly"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->	

			<!-- Precio Nocturno-->
			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Nocturno </label><br/>
				<div class="input-group"> 
					<div class="input-group-addon">
						Equivalente: 
					</div>
					{!! Form::text('eq_nocturInt', null, [ 'class'=>"form-control eq_nocturInt","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->						

			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					{!! Form::text('precio_nocturInt', null, ["id"=>"precio_nocturInt-input", 'class'=>"form-control precio_nocturInt","placeholder"=>"Precio Establecido", "readonly"=>"readonly"]) !!}
					<input type="hidden" name="aeropuerto_id" value="{{session('aeropuerto')->id}}"></input>
				</div><!-- /.input group -->
			</div><!-- /.form group -->		
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->

<!-- Nacionales -->
<div class="col-sm-4 invoice-col">
	<div class="box box-warning aterrizajeBox">
		<div class="box-header">
			<h5>Nacionales<small></br>Diurno y Nocturno</small></h5>
		</div>
		<div class="box-body">
			<!-- Precio Diurno-->
			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Diurno: </label><br/>
				<div class="input-group"> 
					<div class="input-group-addon">
						Equivalente: 
					</div>
					{!! Form::text('eq_diurnoNac', null, [ 'class'=>"form-control eq_diurnoNac","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->		

			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					{!! Form::text('precio_diurnoNac', null, ["id"=>"precio_diurnoNac-input", 'class'=>"form-control precio_diurnoNac","placeholder"=>"Precio Establecido", "readonly"=>"readonly"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->	

			<!-- Precio Nocturno-->
			<!-- Equivalente de la UT-->
			<div class="form-group">
				<label>Nocturno: </label><br/>
				<div class="input-group"> 
					<div class="input-group-addon">
						Equivalente: 
					</div>
					{!! Form::text('eq_nocturNac', null, [ 'class'=>"form-control eq_nocturNac","placeholder"=>"Equivalente de la UT"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->						

			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
					{!! Form::text('precio_nocturNac', null, ["id"=>"precio_nocturNac-input", 'class'=>"form-control precio_nocturNac","placeholder"=>"Precio Establecido", "readonly"=>"readonly"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->			
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->
<!-- Definicion de Partida Presupuestaria -->
<div class="col-sm-4 invoice-col">
	<div class="box box-warning aterrizajeBox">
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