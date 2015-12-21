<div class="col-sm-4 invoice-col">
	<!-- Precio de la UT -->
	<div class="box box-info confGeneralBox">
		<div class="box-header">
			<h5>Unidad Tributaria</h5>
		</div>
		<div class="box-body">
			<!-- Precio en BsF. -->
			<div class="form-group">
				<label>Precio: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
						{!! Form::text('unidad_tributaria', null, [ 'class'=>"form-control unidad_tributaria","placeholder"=>"Unidad Tributaria (BsF)"]) !!}
					<input type="hidden" name="aeropuerto_id" value="{{session('aeropuerto')->id}}"></input>
				</div><!-- /.input group -->
			</div><!-- /.form group -->					
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> 

<div class="col-sm-4 invoice-col">
	<!-- Precio del Dolar -->
	<div class="box box-info confGeneralBox">
		<div class="box-header">
			<h5>Dólar Oficial</h5>
		</div>
		<div class="box-body">
			<!-- Precio Diurno-->
			<div class="form-group">
				<label>Precio por Dólar: </label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i> BsF. 
					</div>
						{!! Form::text('dolar_oficial', null, [ 'class'=>"form-control dolar_oficial", "placeholder"=>"Dolar Oficial (BsF)"]) !!}
				</div><!-- /.input group -->
			</div><!-- /.form group -->					
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div> <!-- /.col -->