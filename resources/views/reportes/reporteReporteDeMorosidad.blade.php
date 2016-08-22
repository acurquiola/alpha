@extends('app')

@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Reporte de Morosidad</a></li>
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
			<div class="box-body text-right">
				{!! Form::open(["url" => action('ReporteController@getReporteDeMorosidad'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-group" style="margin-left: 20px">
					<label><strong>AÑO:</strong></label>
					{!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group">
					<label><strong>AEROPUERTO: </strong></label>
					{!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
				</div>
				<button type="submit" class="btn btn-primary">Buscar</button>
				<a class="btn btn-default" href="{{action('ReporteController@getReporteDeMorosidad')}}">RESET</a>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				{!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
				{!! Form::hidden('table') !!}
				<h3 class="box-title">Reporte</h3>
				<span class="pull-right"><button type="button" class="btn btn-primary" id="export-btn"><span class="glyphicon glyphicon-file"></span> Exportar</button></span>
				{!! Form::close() !!}
			</div>
			<div class="box-body" >
				<div class="row">
					<div class="col-xs-12">

						<div class="table-responsive" style="max-height: 500px">
							<table class="table table-hover table-condensed">
								<thead  class="bg-primary">
									<tr>
										<th id="cliente-col" rowspan="2" style="vertical-align: middle; " class="text-center" align="center">
											CLIENTE
										</th>
										<th id="cliente-col" colspan="12" style="vertical-align: middle;" class="text-center" align="center">
											MES
										</th>
										<th id="cliente-col" rowspan="2" style="vertical-align: middle; " class="text-center" align="center">
											TOTAL
										</th>
									</tr>
									<tr>
										@foreach($meses as $index=>$mes)
											<th style="vertical-align: middle;" class="text-center" align="center">
												{{ $mes }}
											</th>
										@endforeach
									</tr>
								</thead>
								<tbody>
									@foreach($clientesMod as $modulo=>$cantCliente)
										@if(count($cantCliente)>0)
											<tr id="NombreModulo">
												<td  colspan="14" style="vertical-align: middle;" class="text-center bg-gray" align="center" >
													<strong>{{ $modulo }}</strong>
												</td>
											</tr>
											@foreach($cantCliente as $index => $cliente_id)
												<tr>
													<td  class="text-left" align="left" style="width: 200px">
														{{ $cliente_id }}
													</td>
													@foreach($facturasPendientesModulo as $mod => $facturasPendientes)
														@if($mod == $modulo)
															@foreach($facturasPendientes as $mes => $clientesPendientes)
																@foreach($clientesPendientes as $id => $montoMensual)
																	@if($cliente_id == $id)
																		<td class="text-right" align="right" style="width: 80px">
																			{{ $traductor->format($montoMensual) }}
																		</td>
																	@endif
																@endforeach
															@endforeach
														@endif
													@endforeach
													@foreach($totalClientes as $m => $c)
														@if($m == $modulo)
															@foreach($c as $nombre => $monto)
																@if($nombre == $cliente_id)
																	<td  class="text-right" align="right" style="width: 80px">
																		{{ $traductor->format($monto["total"]) }}
																	</td>
																@endif
															@endforeach
														@endif
													@endforeach
												</tr>
											@endforeach
										<tr class="bg-gray">
											<td>
												<strong>TOTAL</strong>
											</td>
											@foreach($ModTotales as $mod=>$monto)
												@if($mod == $modulo)
													<td class="text-right  totalModulos" align="right" colspan="13">
														<strong>{{ $traductor->format($monto) }}</strong>
													</td>
												@endif
											@endforeach
										</tr>
										@endif
									@endforeach
								</tbody>
								<tfoot class="bg-primary">
									<tr >
										<th  align="left" class="text-left">
											TOTALES
										</th>
										@foreach($totalMes as $mes => $monto)
											<td  class="text-right" align="right" style="width: 80px">
												<strong>{{ $traductor->format($monto) }}</strong>
											</td>
										@endforeach
										<th class="text-right totalTotal" align="right">
											0,00
										</th>
									</tr>
								</tfoot>
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

	$(document).ready(function(){


		var totalTotal=0;
		$('.totalModulos').each(function(index,value){
			totalTotal+=commaToNum($(value).text().trim());
		});


		$('.totalTotal').text(numToComma(totalTotal));



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
										<th colspan="14" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">REPORTE DE MOROSIDAD\
										</br>\
										AÑO: {{ $anno }} | AEROPUERTO: {{ $aeropuerto }}\
									</th>\
								</tr>\
							</thead>')
			$(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '12px'})
			$(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '12px'})
			$(table).find('td').css({'font-size': '10px'})
			$(table).find('#NombreModulo').css({'font-size': '80px'})
			$(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
			$(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
			var tableHtml= $(table)[0].outerHTML;
			$('[name=table]').val(tableHtml);
			$('#export-form').submit();
		})


	})


</script>


@endsection