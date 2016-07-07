@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Relación de Cobranza</a></li>
</ol>
<div class="row" id="box-wrapper">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Filtros</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div>
			<div class="box-body">
				{!! Form::open(["url" => action('ReporteController@getReporteRelacionCobranza'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-group">
					<label style="width:80px">Modulo:</label>
					{!! Form::select('modulo', $modulos, $modulo, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group" >
					<select name="cliente" id="cliente" class="form-control cliente" >
						<option value="">--Seleccione Cliente--</option>
						@foreach ($clientes as $cliente)
						<option value="{{$cliente->id}}">{{$cliente->codigo}} | {{$cliente->nombre}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group" style="margin-left: 20px">
					<label>Mes:</label>
					{!! Form::select('mes', $meses, $mes, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group" style="margin-left: 20px">
					<label>Año:</label>
					{!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group">
					<label style="width:80px">Aeropuerto:</label>
					{!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
				</div>
				<a class="btn btn-default  pull-right" href="{{action('ReporteController@getReporteRelacionCobranza')}}">Reset</a>
				<button type="submit" class="btn btn-primary pull-right">Buscar</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				{!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
				{!! Form::hidden('table') !!}
                {!! Form::hidden('gerencia', $gerencia) !!}
                {!! Form::hidden('departamento', $departamento) !!}
				<h3 class="box-title">Reporte</h3>
				<span class="pull-right">
					<button type="button" class="btn btn-primary" id="export-btn">
						<span class="glyphicon glyphicon-file"></span> Exportar
					</button>
				</span>
				{!! Form::close() !!}
			</div>
			<div class="box-body" >
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive" style="max-height: 500px">
							<table class="table table-hover table-condensed">
								<thead  class="bg-primary">
									<tr>
										<th colspan="2" style="vertical-align: middle;" align="center" class="text-center">
											COBRO
										</th>
										<th colspan="3" style="vertical-align: middle;" align="center" class="text-center">
											CLIENTE
										</th>
										<th colspan="3" style="vertical-align: middle;" align="center" class="text-center">
											DEPÓSITO
										</th>
										<th colspan="3" style="vertical-align: middle;" align="center" class="text-center">
											COMPROBANTE DE RETENCIÓN
										</th>
										<th colspan="4" style="vertical-align: middle" align="center" class="text-center">
											TOTAL
										</th>
									</tr>
									<tr>
										<th style="vertical-align: middle; width:40px" align="center" class="text-center">
											Fecha
										</th>
										<th style="vertical-align: middle; width:30px" align="center" class="text-center">
											Nro.
										</th>
										<th  style="vertical-align: middle; width:40px" align="center" class="text-center">
											Rec. Caja
										</th>
										<th style="vertical-align: middle; width:40px" align="center" class="text-center">
											Código
										</th>
										<th style="vertical-align: middle; width:150px" align="center" class="text-center">
											Nombre o Razón Social
										</th>
										<th style="vertical-align: middle; width:30px" align="center" class="text-center">
											Tipo
										</th>
										<th style="vertical-align: middle; width:40px"  align="center" class="text-center">
											Cuenta
										</th>
										<th style="vertical-align: middle; width:40px"  align="center" class="text-center">
											Ref
										</th>
										<th style="vertical-align: middle; width:40px"  align="center" class="text-center">
											Fecha
										</th>
										<th style="vertical-align: middle; width:50px"  align="center" class="text-center">
											Número
										</th>
										<th style="vertical-align: middle; width:50px"  align="center" class="text-center">
											IVA
										</th>
										<th style="vertical-align: middle; width:50px"  align="center" class="text-center">
											ISLR
										</th>
										<th style="vertical-align: middle; width:80px"  align="center" class="text-center">
											Cobrado
										</th>
										<th style="vertical-align: middle; width:70px" align="center" class="text-center">
											Depositado
										</th>
										<th style="vertical-align: middle; width:70px" align="center" class="text-center">
											Diferencia
										</th>
									</tr>
								</thead>
								<tbody>
									@if($recibos->count()>0)
									@foreach($recibos as $recibo)
									<tr>
										<td style="vertical-align: middle; width:40px" align="center">{{$recibo->fecha}}</td>
										<td align="center"  style="width:30px">{{$recibo->id}}</td>
										<td style="vertical-align: middle; width:40px" align="center" >{{($recibo->nRecibo)?$recibo->nRecibo:'N/A'}}</td>
										<td style="vertical-align: middle; width:40px" align="center" >{{$recibo->cliente->codigo}}</td>
										<td style="vertical-align: middle; width:150px" align="left" >{{$recibo->cliente->nombre}}</td>
										<td style="vertical-align: middle; width:30px" align="center">@foreach($recibo->pagos as $pagos) {{$pagos->tipo}} @endforeach</td>
										<td style="vertical-align: middle; width:40px" align="center">@foreach($recibo->pagos as $pagos) {{substr($pagos->cuenta->descripcion, -6)}} @endforeach</td>
										<td style="vertical-align: middle; width:40px" align="center">@foreach($recibo->pagos as $pagos) {{$pagos->ncomprobante}} @endforeach</td>
										<td style="vertical-align: middle; width:40px" align="center">@foreach($recibo->facturas as $comprobante) {{$comprobante->pivot->retencionFecha}} @endforeach</td>
										<td style="vertical-align: middle; width:50px" align="center">@foreach($recibo->facturas as $comprobante) {{$comprobante->pivot->retencionComprobante}} @endforeach</td>
										<td style="vertical-align: middle; width:50px" align="center">@foreach($recibo->facturas as $comprobante) {{$traductor->format($comprobante->pivot->iva)}} @endforeach</td>
										<td style="vertical-align: middle; width:50px" align="center">@foreach($recibo->facturas as $comprobante) {{$traductor->format(($comprobante->pivot->base * $comprobante->pivot->islrpercentage)/100)}} @endforeach</td>
										<td style="vertical-align: middle; width:80px" align="right">{{$traductor->format($recibo->montofacturas)}}</td>
										<td style="vertical-align: middle; width:70px" align="right">{{$traductor->format($recibo->montodepositado)}}</td>
										<td style="vertical-align: middle; width:70px" align="right">{{$traductor->format(($recibo->montofacturas-$recibo->montodepositado))}}</td>
									</tr>
									@endforeach

									<tr class="bg-gray" align="center">
										<td>Total</td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td> - </td>
										<td style="vertical-align: middle; width:80px" align="right">{{$traductor->format($totalFacturas)}}</td>
										<td style="vertical-align: middle; width:70px" align="right">{{$traductor->format($totalDepositado)}}</td>
										<td style="vertical-align: middle; width:70px" align="right">-</td>                                   
									</tr>   
									@else
									<tr>
										<td colspan="15" class="text-center">No hay registros para las fechas seleccionadas</td>
									</tr>
									@endif
<!--                         <tr class="bg-gray">
                        <td colspan="2">Totales Recaudado</td>
                            <td class="text-right" id="metaTotal">0</td>
                            <td class="text-right" id="recaudadoTotal">0</td>
                            <td class="text-right" id="diferenciaTotal">0</td>
                        </tr> -->



                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection

@section('script')
<script>
	$(function(){


		$('#cliente').chosen({width:'400px'});

		var metaTotal=0;
		$('.meta').each(function(index,value){
			metaTotal+=parseInt($(value).text().trim());
		});

		var recaudadoTotal=0;
		$('.recaudado').each(function(index,value){
			recaudadoTotal+=parseInt($(value).text().trim());
		});

		var diferenciaTotal=0;
		$('.diferencia').each(function(index,value){
			diferenciaTotal+=parseInt($(value).text().trim());
		});

		$('#metaTotal').text(metaTotal);
		$('#recaudadoTotal').text(recaudadoTotal);
		$('#diferenciaTotal').text(diferenciaTotal);


		$('#export-btn').click(function(e){
			var table=$('table').clone();
			$(table).find('td, th').filter(function() {
				return $(this).css('display') == 'none';
			}).remove();
			$(table).find('tr').filter(function() {
				return $(this).find('td,th').length == 0;
			}).remove();
			$(table).prepend('<thead>\
								<tr>\
									<th colspan="15" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">RELACIÓN DE COBRANZA\
										</br>\
										MES: {{$mes}} AÑO: {{$anno}} | MÓDULO: {{$moduloNombre}}\
										</br>\
										CLIENTE: {{$clienteNombre}} | AEROPUERTO: {{$aeropuertoNombre}}\
									</th>\
								</tr>\
							</thead>')
			$(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
			$(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
			$(table).find('td').css({'font-size': '6px'})
			$(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
			$(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
			var tableHtml= $(table)[0].outerHTML;
			$('[name=table]').val(tableHtml);
			$('#export-form').submit();
		})

	})
</script>


@endsection
