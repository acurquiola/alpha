@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Conciliación Bancaria</a></li>
</ol>
<div class="row" id="box-wrapper">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Filtros</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div><!-- /.box-tools -->
			</div>
			<div class="box-body">
				{!! Form::open(["url" => action('ConciliacionController@getMovimientos'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-inline">
					<div class="form-group">
						<select id="banco-select" name="banco_id" class="form-control" >
							<option value="">-- Seleccione Banco --</option>
							@foreach($bancos as $banco)
							<option value="{{$banco->id}}" data-cuentas='{!!$banco->cuentas!!}'  data-nombre="{{$banco->nombre}}">{{$banco->nombre}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<select id="cuenta-modal-input" name="cuenta_id" class="form-control">
							<option value="">-- Seleccione Cuenta Bancaria --</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control search-parm-select" name="tipo" id="formaPago-select" autocomplete="off">
							<option value="">-- Seleccione Forma de Pago --</option>
							<option value="T">Transferencia Bancario</option>
							<option value="D">Depósito Bancario</option>
							<option value="NC">Nota de Crédito</option>
						</select>
					</div>
					<div class="form-group">
						<input class="form-control" id="referencia-input" name="ncomprobante" autocomplete="off"  placeholder="Nro de Referencia/Lote" />
					</div>
				</div>
				<div class="form-inline">
					<div class="form-group">
						<input class="form-control datepicker" name="fecha_inicio" id="fecha_inicio-input"  autocomplete="off" placeholder="Fecha Inicio" />
					</div>
					<div class="form-group">
						<input class="form-control datepicker" name="fecha_fin" id="fecha_fin -input" autocomplete="off" placeholder="Fecha Fin" />
					</div>
					<div class="form-group">
						<input class="form-control " name="cobro_id" id="cobro-input" autocomplete="off"  placeholder="Nro de Cobro" />
					</div>
				</div>
				<div class="form-inline text-right">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body" >
				<div class="row">
					<div class="col-xs-12">
						<div class="col-md-8">
							<label for="Femision-input"><b>SELECCIONE LOS MOVIMIENTOS A CONCILIAR</b></label>
						</div>
						<div class="col-md-12 text-right">
							<button type="button" class="btn btn-success" id="select-all-btn">Seleccionar todos</button>
						</div>
						<div class="col-md-8" id="movimientos-checkbox" >

							@if($movimientos->count() > 0)
								@foreach($movimientos as $movimiento)
								<div class="checkbox">
									<label>
										<input name="contratos-checkbox" type="checkbox">
										{{ $movimiento->fecha }} | {{ $movimiento->banco->nombre }} | {{ $movimiento->cuenta->descripcion }} | {{ $movimiento->tipo }} | {{ $movimiento->ncomprobante }} | {{ $movimiento->monto }} 
									</label>
								</div>
								@endforeach
							@else
								<span>No hay registros disponibles para los datos suministrados</span> 
							@endif
						</div>

						<div class="col-md-8" style="margin-top: 20px">
							<label>
								<b>INFORMACIÓN A APLICAR</b>
							</label>
						</div>
						<div class="col-md-8" style="margin-top: 20px; margin-left: 25px">

							<div class="form-inline">
								<div class="form-group">
									<input class="form-control" type="text" name="fecha" id="fecha" placeholder="Fecha">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="porcentaje_deducido" id="fecha" placeholder="% deducido">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary pull-right" id="generar-btn">Generar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body" >
				<div class="row">

					<div class="col-xs-12">

						<table class="table" >
							<thead>
								<th>Fecha</th>
								<th>Banco</th>
								<th>Nro. Cuenta</th>
								<th>Nro. Ref/Lote</th>
								<th>Porc. Deducido</th>
								<th>Deducción</th>
								<th>Monto Mov.</th>
								<th>Monto final</th>
								<th>Acción</th>
							</thead>
							<tbody>
							</tbody>



						</table>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>

	$(document).ready(function(){


		$('#select-all-btn').click(function(){
			var $unCheckedChecks=$('#movimientos-checkbox [type=checkbox]:not(:disabled):not(:checked)');
			console.log($unCheckedChecks);
			if($unCheckedChecks.length==0)
				$('#movimientos-checkbox [type=checkbox]:not(:disabled)').iCheck('uncheck');
			else
				$('#movimientos-checkbox [type=checkbox]:not(:disabled)').iCheck('check');

		});

		$('.datepicker').inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});



		$('.datepicker').datepicker({
			closeText: 'Cerrar',
			prevText: '&#x3C;Ant',
			nextText: 'Sig&#x3E;',
			currentText: 'Hoy',
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
			'Jul','Ago','Sep','Oct','Nov','Dic'],
			dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
			dayNamesMin: ['D','L','M','M','J','V','S'],
			weekHeader: 'Sm',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: '',
			dateFormat: 'yy-mm-dd'});



		$('#banco-select').change(function(){
			var cuentas=$(this).find(':selected').data('cuentas');
			cuentas=eval(cuentas);
			var options="";
			$.each(cuentas,function(index,value){
				options+="<option value='"+value.id+"'>"+value.descripcion+"</option>";
			})
			var seleccione = "<option>-- Seleccione cuenta Bancaria --</option>\ ";
			options=seleccione+options;
			$('#cuenta-modal-input').html(options);
		}).trigger('change');


	})
</script>
@endsection