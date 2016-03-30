@extends('app')

@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Relación de Estacionamiento Diario</a></li>
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
				{!! Form::open(["url" => action('ReporteController@getReporteRelacionEstacionamientoDiario'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-group" style="margin-left: 20px">
					<label>Mes:</label>
					{!! Form::select('mes', $meses, $mes, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group" style="margin-left: 20px">
					<label>Año:</label>
					{!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group">
					<label style="width:80px; margin-left: 20px">Aeropuerto:</label>
					{!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
				</div>
				<a class="btn btn-default  pull-right" href="{{action('ReporteController@getReporteRelacionEstacionamientoDiario')}}">Reset</a>
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
				{!! Form::hidden('departamento', 'Departamento de Recaudación') !!}
				{!! Form::hidden('gerencia', 'Gerencia de Administración') !!}
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
										<th style="vertical-align: middle" class="text-center" colspan="1"></th>
										<th style="vertical-align: middle" class="text-center" colspan="4">TICKETS DE ESTACIONAMIENTO</th>
										<th style="vertical-align: middle" class="text-center" colspan="4">TICKETS DE PERNOCTA</th>
										<th style="vertical-align: middle" class="text-center" colspan="4">TICKETS EXTRAVIADOS</th>
										<th style="vertical-align: middle" class="text-center" colspan="10">TARJETAS ELECTRÓNICAS</th>
										<th style="vertical-align: middle" class="text-center" colspan="3">RECAUDADO</th>
										<th style="vertical-align: middle" class="text-center" colspan="1">DEP.</th>
									</tr>
									<tr>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Fecha
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Cant
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Base
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											IVA
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Total
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Cant
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Base
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											IVA
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Total
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Cant
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Base
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											IVA
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Total
										</th>

										<th colspan="3" style="vertical-align: middle" class="text-center">
											Monto
										</th>
										<th colspan="3" style="vertical-align: middle" class="text-center">
											Monto
										</th>
										<th colspan="3" style="vertical-align: middle" class="text-center">
											Monto
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Total
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Base
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											IVA
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Total
										</th>
										<th rowspan="2" style="vertical-align: middle" class="text-center">
											Ref
										</th>
									</tr>

									<tr> 
										<th style="vertical-align: middle" class="text-center">Base</th>
										<th style="vertical-align: middle" class="text-center">IVA</th>
										<th style="vertical-align: middle" class="text-center">Total</th>
										<th style="vertical-align: middle" class="text-center">Base</th>
										<th style="vertical-align: middle" class="text-center">IVA</th>
										<th style="vertical-align: middle" class="text-center">Total</th>
										<th style="vertical-align: middle" class="text-center">Base</th>
										<th style="vertical-align: middle" class="text-center">IVA</th>
										<th style="vertical-align: middle" class="text-center">Total</th>
									</tr>
								</thead>
								<tbody>
								@foreach($estacionamientoDiario as $dia => $estacionamiento)
									<tr>
										<td class="text-center dia" align="center">{{$dia}}</td>
										<td class="text-center ticketEstacionamiento" align="center">{{$estacionamiento["ticketEstacionamiento"]}}</td>
										<td class="text-right baseTicketEstacionamiento" align="right">{{$traductor->format($estacionamiento["baseTicketEstacionamiento"])}}</td>
										<td class="text-right ivaTicketEstacionamiento" align="right">{{$traductor->format($estacionamiento["ivaTicketEstacionamiento"])}}</td>
										<td class="text-right totalTicketEstacionamiento" align="right">{{$traductor->format($estacionamiento["totalTicketEstacionamiento"])}}</td>
										<td class="text-center ticketPernocta" align="center">{{$estacionamiento["ticketPernocta"]}}</td>
										<td class="text-right baseTicketPernocta" align="right">{{$traductor->format($estacionamiento["baseTicketPernocta"])}}</td>
										<td class="text-right ivaTicketPernocta" align="right">{{$traductor->format($estacionamiento["ivaTicketPernocta"])}}</td>
										<td class="text-right totalTicketPernocta" align="right">{{$traductor->format($estacionamiento["totalTicketPernocta"])}}</td>
										<td class="text-center ticketExtraviado"  align="center">{{$estacionamiento["ticketExtraviado"]}}</td>
										<td class="text-right baseTicketExtraviado" align="right">{{$traductor->format($estacionamiento["baseTicketExtraviado"])}}</td>
										<td class="text-right ivaTicketExtraviado" align="right">{{$traductor->format($estacionamiento["ivaTicketExtraviado"])}}</td>
										<td class="text-right totalTicketExtraviado" align="right">{{$traductor->format($estacionamiento["totalTicketExtraviado"])}}</td>
										<td class="text-right baseMontoA" align="right">0,00</td>
										<td class="text-right ivaMontoA" align="right">0,00</td>
										<td class="text-right totalMontoA" align="right">0,00</td>
										<td class="text-right baseMontoB" align="right">0,00</td>
										<td class="text-right ivaMontoB" align="right">0,00</td>
										<td class="text-right totalMontoB" align="right">0,00</td>
										<td class="text-right baseMontoC" align="right">0,00</td>
										<td class="text-right ivaMontoC" align="right">0,00</td>
										<td class="text-right totalMontoC" align="right">0,00</td>
										<td class="text-right totalTarjetas" align="right">0,00</td>
										<td class="text-right baseTotal" align="right">{{$traductor->format($estacionamiento["baseTotal"])}}</td>
										<td class="text-right ivaTotal" align="right">{{$traductor->format($estacionamiento["ivaTotal"])}}</td>
										<td class="text-right montoTotal" align="right">{{$traductor->format($estacionamiento["montoTotal"])}}</td>
										<td class="text-center deposito" align="center">{{$estacionamiento["deposito"]}}</td>
									</tr>
									@endforeach
									<tr>
										<td style="font-weight: bold">TOTALES BS.) </td>
										<td class="text-right" style="font-weight: bold" align="right" id="ticketEstacionamiento">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="baseTicketEstacionamiento">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ivaTicketEstacionamiento">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="totalTicketEstacionamiento">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ticketPernocta">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="baseTicketPernocta">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ivaTicketPernocta">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="totalTicketPernocta">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ticketExtraviado">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="baseTicketExtraviado">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ivaTicketExtraviado">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="totalTicketExtraviado">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="baseMontoA">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ivaMontoA">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="totalMontoA">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="baseMontoB">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ivaMontoB">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="totalMontoB">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="baseMontoC">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ivaMontoC">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="totalMontoC">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="totalTarjetas">-</td>
										<td class="text-right" style="font-weight: bold" align="right" id="baseTotal">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="ivaTotal">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="montoTotal">0</td>
										<td class="text-right" style="font-weight: bold" align="right" id="deposito"></td>
									</tr>
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

		var ticketEstacionamiento=0;
		$('.ticketEstacionamiento').each(function(index,value){
			ticketEstacionamiento+=commaToNum($(value).text().trim());
		});

		var baseTicketEstacionamiento=0;
		$('.baseTicketEstacionamiento').each(function(index,value){
			baseTicketEstacionamiento+=commaToNum($(value).text().trim());
		});

		var ivaTicketEstacionamiento=0;
		$('.ivaTicketEstacionamiento').each(function(index,value){
			ivaTicketEstacionamiento+=commaToNum($(value).text().trim());
		});

		var totalTicketEstacionamiento=0;
		$('.totalTicketEstacionamiento').each(function(index,value){
			totalTicketEstacionamiento+=commaToNum($(value).text().trim());
		});

		var ticketPernocta=0;
		$('.ticketPernocta').each(function(index,value){
			ticketPernocta+=commaToNum($(value).text().trim());
		});

		var baseTicketPernocta=0;
		$('.baseTicketPernocta').each(function(index,value){
			baseTicketPernocta+=commaToNum($(value).text().trim());
		});

		var ivaTicketPernocta=0;
		$('.ivaTicketPernocta').each(function(index,value){
			ivaTicketPernocta+=commaToNum($(value).text().trim());
		});

		var totalTicketPernocta=0;
		$('.totalTicketPernocta').each(function(index,value){
			totalTicketPernocta+=commaToNum($(value).text().trim());
		});

		var ticketExtraviado=0;
		$('.ticketExtraviado').each(function(index,value){
			ticketExtraviado+=commaToNum($(value).text().trim());
		});

		var baseTicketExtraviado=0;
		$('.baseTicketExtraviado').each(function(index,value){
			baseTicketExtraviado+=commaToNum($(value).text().trim());
		});

		var ivaTicketExtraviado=0;
		$('.ivaTicketExtraviado').each(function(index,value){
			ivaTicketExtraviado+=commaToNum($(value).text().trim());
		});

		var totalTicketExtraviado=0;
		$('.totalTicketExtraviado').each(function(index,value){
			totalTicketExtraviado+=commaToNum($(value).text().trim());
		});

		var baseMontoA=0;
		$('.baseMontoA').each(function(index,value){
			baseMontoA+=commaToNum($(value).text().trim());
		});

		var ivaMontoA=0;
		$('.ivaMontoA').each(function(index,value){
			ivaMontoA+=commaToNum($(value).text().trim());
		});

		var totalMontoA=0;
		$('.totalMontoA').each(function(index,value){
			totalMontoA+=commaToNum($(value).text().trim());
		});

		var baseMontoB=0;
		$('.baseMontoB').each(function(index,value){
			baseMontoB+=commaToNum($(value).text().trim());
		});

		var ivaMontoB=0;
		$('.ivaMontoB').each(function(index,value){
			ivaMontoB+=commaToNum($(value).text().trim());
		});

		var totalMontoB=0;
		$('.totalMontoB').each(function(index,value){
			totalMontoB+=commaToNum($(value).text().trim());
		});

		var baseMontoC=0;
		$('.baseMontoC').each(function(index,value){
			baseMontoC+=commaToNum($(value).text().trim());
		});

		var ivaMontoC=0;
		$('.ivaMontoC').each(function(index,value){
			ivaMontoC+=commaToNum($(value).text().trim());
		});

		var totalMontoC=0;
		$('.totalMontoC').each(function(index,value){
			totalMontoC+=commaToNum($(value).text().trim());
		});

		var totalTarjetas=0;
		$('.totalTarjetas').each(function(index,value){
			totalTarjetas+=commaToNum($(value).text().trim());
		});

		var baseTotal=0;
		$('.baseTotal').each(function(index,value){
			baseTotal+=commaToNum($(value).text().trim());
		});

		var ivaTotal=0;
		$('.ivaTotal').each(function(index,value){
			ivaTotal+=commaToNum($(value).text().trim());
		});

		var montoTotal=0;
		$('.montoTotal').each(function(index,value){
			montoTotal+=commaToNum($(value).text().trim());
		});

		$('#ticketEstacionamiento').text(numToComma(ticketEstacionamiento));
		$('#baseTicketEstacionamiento').text(numToComma(baseTicketEstacionamiento));
		$('#ivaTicketEstacionamiento').text(numToComma(ivaTicketEstacionamiento));
		$('#totalTicketEstacionamiento').text(numToComma(totalTicketEstacionamiento));
		$('#ticketPernocta').text(numToComma(ticketPernocta));
		$('#baseTicketPernocta').text(numToComma(baseTicketPernocta));
		$('#ivaTicketPernocta').text(numToComma(ivaTicketPernocta));
		$('#totalTicketPernocta').text(numToComma(totalTicketPernocta));
		$('#ticketExtraviado').text(numToComma(ticketExtraviado));
		$('#baseTicketExtraviado').text(numToComma(baseTicketExtraviado));
		$('#ivaTicketExtraviado').text(numToComma(ivaTicketExtraviado));
		$('#totalTicketExtraviado').text(numToComma(totalTicketExtraviado));
		$('#baseMontoA').text(numToComma(baseMontoA));
		$('#ivaMontoA').text(numToComma(ivaMontoA));
		$('#totalMontoA').text(numToComma(totalMontoA));
		$('#baseMontoB').text(numToComma(baseMontoB));
		$('#ivaMontoB').text(numToComma(ivaMontoB));
		$('#totalMontoB').text(numToComma(totalMontoB));
		$('#baseMontoC').text(numToComma(baseMontoC));
		$('#ivaMontoC').text(numToComma(ivaMontoC));
		$('#totalMontoC').text(numToComma(totalMontoC));
		$('#totalTarjetas').text(numToComma(totalTarjetas));
		$('#baseTotal').text(numToComma(baseTotal));
		$('#ivaTotal').text(numToComma(ivaTotal));
		$('#montoTotal').text(numToComma(montoTotal));



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
									<th colspan="27" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">RELACIÓN DE ESTACIONAMIENTO DIARIO\
										</br>\
										MES: {{$mes}} AÑO: {{$anno}}\
										</br>\
										AEROPUERTO: {{$aeropuertoNombre}}\
									</th>\
								</tr>\
							</thead>')
			$(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '6px'})
			$(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '6px'})
			$(table).find('td').css({'font-size': '5px'})
			$(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
			$(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
			var tableHtml= $(table)[0].outerHTML;
			$('[name=table]').val(tableHtml);
			$('#export-form').submit();
		})

});
</script>


@endsection

