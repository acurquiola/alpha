@extends('app')

@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Relación de Ingresos Aeronáuticos Contado</a></li>
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
				{!! Form::open(["url" => action('ReporteController@getReporteRelacionIngresosAeronauticosContado'), "method" => "GET", "class"=>"form-inline"]) !!}
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
				<a class="btn btn-default  pull-right" href="{{action('ReporteController@getReporteRelacionIngresosAeronauticosContado')}}">Reset</a>
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
										<th   style="vertical-align: middle" class="text-center" align="center">
											Fecha
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Nro. Dosa
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Formulario
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Aterrizaje/Despegue
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Estacionamiento
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Habilitación
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Jetway
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Carga
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Monto Facturado
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Monto Depositado
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Diferencia
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Nro. Cobro
										</th>
									</tr>
								</thead>
								<tbody>
								@foreach($dosas as $dosa)
									{{dd($dosa)}}
								@endforeach
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

		var baseTarjetas=0;
		$('.baseTarjetas').each(function(index,value){
			baseTarjetas+=commaToNum($(value).text().trim());
		});

		var ivaTarjetas=0;
		$('.ivaTarjetas').each(function(index,value){
			ivaTarjetas+=commaToNum($(value).text().trim());
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

		$('#ticketEstacionamiento').text(ticketEstacionamiento);
		$('#baseTicketEstacionamiento').text(numToComma(baseTicketEstacionamiento));
		$('#ivaTicketEstacionamiento').text(numToComma(ivaTicketEstacionamiento));
		$('#totalTicketEstacionamiento').text(numToComma(totalTicketEstacionamiento));
		$('#ticketPernocta').text(ticketPernocta);
		$('#baseTicketPernocta').text(numToComma(baseTicketPernocta));
		$('#ivaTicketPernocta').text(numToComma(ivaTicketPernocta));
		$('#totalTicketPernocta').text(numToComma(totalTicketPernocta));
		$('#ticketExtraviado').text(ticketExtraviado);
		$('#baseTicketExtraviado').text(numToComma(baseTicketExtraviado));
		$('#ivaTicketExtraviado').text(numToComma(ivaTicketExtraviado));
		$('#totalTicketExtraviado').text(numToComma(totalTicketExtraviado));
		$('#baseTarjetas').text(numToComma(baseTarjetas));
		$('#ivaTarjetas').text(numToComma(ivaTarjetas));
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
									<th colspan="20" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">RELACIÓN DE ESTACIONAMIENTO DIARIO\
										</br>\
										MES: {{$mes}} AÑO: {{$anno}}\
										</br>\
										AEROPUERTO: {{$aeropuertoNombre}}\
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

});
</script>


@endsection

