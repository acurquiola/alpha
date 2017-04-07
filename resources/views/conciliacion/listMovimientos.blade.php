@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a href="#">Conciliación Bancaria</a></li>
	<li><a class="active">Crear</a></li>
</ol>
<div class="row" id="box-wrapper">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
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
	                      {!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
	                </div>
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
						<input class="form-control" id="referencia-input" name="ncomprobante" autocomplete="off" value="{{ $ncomprobante }}" placeholder="Nro de Referencia/Lote" />
					</div>
				</div>
				<div class="form-inline">
					<div class="form-group">
						<input class="form-control datepicker" name="fecha_inicio" id="fecha_inicio-input"  autocomplete="off" valeu="{{ $fecha_inicio }}"" placeholder="Fecha Inicio" />
					</div>
					<div class="form-group">
						<input class="form-control datepicker" name="fecha_fin" id="fecha_fin -input" autocomplete="off" value="{{ $fecha_fin }}" placeholder="Fecha Fin" />
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
						<div class="col-md-10" id="movimientos-checkbox" >
							@if($movimientos->count() > 0)
								{{-- @foreach($movimientos as $movimiento)
							<span style="margin-left: 60px" >FECHA | BANCO | CUENTA | TIPO | REFERENCIA | MONTO</span>
								<div class="checkbox" >
									<label>
										<input id="mov-checkbox" name="contratos-checkbox" type="checkbox" data-monto="{{ $movimiento->monto }} ">
										{{ $movimiento->fecha }} | {{ $movimiento->banco->nombre }} | {{ $movimiento->cuenta->descripcion }} | {{ $movimiento->tipo }} | {{ $movimiento->ncomprobante }} | {{ $traductor->format($movimiento->monto) }}
									</label>
								</div>
								@endforeach
 --}}

 								<table class="table text-center" id="movimientos-table">
									<thead>
										<tr>
											<th></th>
											<th>Fecha</th>
											<th>Nro. Cobro</th>
											<th>Banco</th>
											<th>Cuenta</th>
											<th>Tipo</th>
											<th>Referencia</th>
											<th>Monto</th>
										</tr>
									</thead>
									<tbody>
										@foreach($movimientos as $movimiento)
											<tr>
												<td>
													<input class="box" type="checkbox" name="contratos-checkbox" value="{{ $movimiento->id }} " data-monto="{{ $movimiento->monto }}" data-bancoid="{{ $movimiento->banco_id }}" data-cuentaid="{{ $movimiento->cuenta_id }}" data-banco="{{ $movimiento->banco->nombre }}" data-cuenta="{{ $movimiento->cuenta->descripcion }}" data-cobro="{{ $movimiento->cobro->id }}" data-movimiento="{{ $movimiento->id }}"/>
												</td>
												<td>
													{{ $movimiento->fecha }}
												</td>
												<td>
													{{ $movimiento->cobro->id }}
												</td>
												<td>
													{{ $movimiento->banco->nombre }}
												</td>
												<td>
													{{ $movimiento->cuenta->descripcion }}
												</td>
												<td>
													{{ $movimiento->tipo }}
												</td>
												<td>
													{{ $movimiento->ncomprobante }}
												</td>
												<td>
													<span class="amount">{{ $traductor->format($movimiento->monto) }}</span>
												</td>
											</tr>
										@endforeach
											<tfooter>
												<td colspan="8" class="text-right">
													<button  class="btn btn-primary pull-right" id="aplicar-btn">Calcular</button>
												</td>
											</tfooter>
									</tbody>
								</table>
							@else
								<span>No hay registros disponibles para los datos suministrados</span>
							@endif
						</div>


						<div class="row">
						     <div class="col-xs-12 text-center">
						          {!! $movimientos->appends(Input::except('page'))->render() !!}
						     </div>
						</div>

						<div class="col-md-8" style="margin-top: 20px">
							<label>
								<b>INFORMACIÓN A APLICAR</b>
							</label>
						</div>
						<div class="col-md-8" style="margin-top: 20px; margin-left: 25px">

							<div class="form-inline">
								<label for="active-input">Fecha de Conciliación</label>
								<div class="form-group">
	                                <div class="input-group">
										    <input class='form-control datepicker today text-center' id="today-input" value="{{$today->format('d/m/Y')}}" /></td>
	                                </div>
								</div>
								</br>
								<div class="form-group">
									<input class="form-control datepicker today text-center" type="text" name="fecha_banco-input" id="fecha_banco-input" placeholder="Fecha">
									<input class="form-control datepicker today text-center" type="hidden" name="referencia" id="referencia">
									<input class="form-control text-right" type="hidden" id="banco_id" >
									<input class="form-control text-right" type="hidden" id="cuenta_id" >
									<input class="form-control text-right" type="hidden" id="banco" >
									<input class="form-control text-right" type="hidden" id="cuenta" >
									<input class="form-control text-right" type="hidden" id="cobros" >
									<input class="form-control text-right" type="hidden" id="movimientos" >
								</div>
								<div class="form-group">
									<input class="form-control text-right" type="text" name="monto_lote" id="monto_lote-input" placeholder="Monto Actual">
								</div>
								<div class="form-group">
									<input class="form-control text-right" type="text" name="monto_banco" id="monto_banco-input" placeholder="Monto en Banco">
								</div>
								<div class="form-group">
									<input class="form-control text-right" type="text" name="comision_bancaria" id="comision_bancaria-input" placeholder="Comisión Bancaria">
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
						<table class="table" id="conciliacion-table">
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
			if($unCheckedChecks.length==0)
				$('#movimientos-checkbox [type=checkbox]:not(:disabled)').iCheck('uncheck');
			else
				$('#movimientos-checkbox [type=checkbox]:not(:disabled)').iCheck('check');

		});

		$('#aplicar-btn').click(function(event) {
		   var total = 0;
		   var cobros = [];
		   var movimientos = [];
	       $('input[type=checkbox]:checked').each(function(i){
				total          +=$(this).data('monto');
				cobros[i]      =$(this).data('cobro');
				movimientos[i] =$(this).data('movimiento');
	       });
	       $('#monto_lote-input').val(numToComma(total));

	       referencia = $('#referencia-input').val();
	       $('#referencia').val(referencia);

			cuenta        = $('input[type=checkbox]:checked:first').data('cuenta');
			cuenta_id     = $('input[type=checkbox]:checked:first').data('cuentaid');
			banco_id      = $('input[type=checkbox]:checked:first').data('bancoid');
			banco         = $('input[type=checkbox]:checked').data('banco');
	       $('#cobros').val(cobros);
	       $('#movimientos').val(movimientos);
	       $('#banco_id').val(banco_id);
	       $('#cuenta_id').val(cuenta_id);
	       $('#banco').val(banco);
	       $('#cuenta').val(cuenta);
		});


		$('#monto_banco-input').keyup(function(event) {
			var diferencia        = 0;
			var monto             = commaToNum($('#monto_lote-input').val());
			var monto_banco       = commaToNum($('#monto_banco-input').val());
			var comision_bancaria = monto - monto_banco;
	       $('#comision_bancaria-input').val(numToComma(comision_bancaria));
		});


		$('#generar-btn').click(function() {
             var table ="";
				var fecha_banco        = $('#fecha_banco-input').val();
				var monto_lote         = $('#monto_lote-input').val();
				var monto_banco        = $('#monto_banco-input').val();
				var referencia         = $('#referencia').val();
				var banco_id           = $('#banco_id').val();
				var cuenta_id          = $('#cuenta_id').val();
				var banco              = $('#banco').val();
				var cuenta             = $('#cuenta').val();
				var comision_bancaria  = $('#comision_bancaria-input').val();
				var fecha_conciliacion = $('#today-input').val();
				var cobros             = $('#cobros').val();
				var movimientos        = $('#movimientos').val();

 				table="<table class='table' id='conciliacion-table'>" +

						"<thead>" +
							"<th>Fecha</th>" +
							"<th>Banco</th>" +
							"<th>Nro. Cuenta</th>" +
							"<th>Nro. Ref/Lote</th>" +
							"<th>Monto Lote</th>" +
							"<th>Monto Banco</th>" +
							"<th>Comisión</th>" +
						"</thead>" +
						"<tbody>" +
						" <tr " +
			 				 "data-fecha_conciliacion='" + fecha_conciliacion+"' "+
			 				 "data-fecha_banco='" + fecha_banco+"' "+
			 				 "data-banco_id='" + banco_id+"' "+
			 				 "data-cuenta_id='" + cuenta_id+"' "+
			 				 "data-referencia='" + referencia+"' "+
			 				 "data-monto_lote='" + monto_lote+"' "+
			 				 "data-monto_banco='" + monto_banco+"' "+
			 				 "data-comision_bancaria='" + comision_bancaria+"' "+
			 				 "data-cobros='" + cobros+"' "+
			 				 "data-movimientos='" + movimientos+"' "+
			 			">" +
		                        "<td class='text-center'><input class='form-control ' id='fecha_conciliacion-td' type='hidden' value='"+fecha_conciliacion+"' /><input class='form-control ' id='fecha_banco-td' readonly value='"+fecha_banco+"' /></td>" +
		                        "<td class='text-center'><input class='form-control ' id='banco_id-td' type='hidden' value='"+banco_id+"' /><input class='form-control' readonly value='"+banco+"' /></td>" +
		                        "<td class='text-center'><input class='form-control ' id='cuenta_id-td' type='hidden' value='"+cuenta_id+"' /><input class='form-control' readonly value='"+ cuenta+"' /></td>" +
		                        "<td class='text-center'><input class='form-control ' id='movimientos-td' type='hidden' value='"+movimientos+"' /><input class='form-control ' id='cobros-td' type='hidden' value='"+cobros+"' /><input class='form-control ' id='referencia-td' readonly value='"+referencia+"' /></td>" +
		                        "<td class='text-right'><input class='form-control ' id='monto_lote-td' readonly value='"+monto_lote+"' /></td>" +
		                        "<td class='text-right'><input class='form-control ' id='monto_banco-td' readonly value='"+numToComma(monto_banco)+"' /></td>" +
		                        "<td class='text-right'><input class='form-control ' id='comision_bancaria-td' readonly value='"+comision_bancaria+"' /></td>" +
		                    " </tr>"+
		                "</tbody>"+
						"<tfooter>" +
								"<td colspan='8' class='text-right'>" +
									"<button  class='btn btn-primary pull-right' id='confirmar-btn'>Confirmar</button>" +
								"</td>" +
							"</tfooter>" +
						"</table>";
 			$('#conciliacion-table').html(table);
 			$('[data-toggle="tooltip"]').tooltip()
 		});


 		$('body').delegate('#confirmar-btn', 'click', function(){
 		    var $trs =$('#conciliacion-table tbody tr:first');
 		    
            var movimientos=[];
            $trs.each(function(index, value){
                $(value).data('fecha_banco', $(value).find('#fecha_banco-td').val());
                $(value).data('fecha_conciliacion', $(value).find('#fecha_conciliacion-td').val());
                $(value).data('banco_id', $(value).find('#banco_id-td').val());
                $(value).data('cuenta_id', $(value).find('#cuenta_id-td').val());
                $(value).data('referencia', $(value).find('#referencia-td').val());
                $(value).data('monto_lote', $(value).find('#monto_lote-td').val());
                $(value).data('monto_banco', $(value).find('#monto_banco-td').val());
                $(value).data('comision_bancaria', $(value).find('#comision_bancaria-td').val());
                $(value).data('cobros', $(value).find('#cobros-td').val());
                $(value).data('movimientos', $(value).find('#movimientos-td').val());
                movimientos.push($(value).data());
            })
            alertify.confirm("¿Está seguro que desea guardar la información?", function (e) {
                if (e) {
                    $.ajax({
                    method:'POST',
                    url:"{{action('ConciliacionController@store')}}",
                    data:{movimientos:movimientos}
                    }).always(function(response, status, responseObject){
                    	var respuesta=JSON.parse(responseObject.responseText);
                        if(status!="error"){
							alertify.success(respuesta.text);
							window.location="{{action('ConciliacionController@index')}}";
                        }
                        else{
                            alertify.error("Se produjo un error en el servidor.");
                            console.log(data, status);
                        }
                    })
                }
            });
 		});






//		$('.datepicker').inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

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
			var seleccione = "<option value=''>-- Seleccione cuenta Bancaria --</option>\ ";
			options=seleccione+options;
			$('#cuenta-modal-input').html(options);
		}).trigger('change');
	})
</script>
@endsection