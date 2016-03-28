@extends('app')

@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Relación Mensual de Ingresos Y Recaudación Pendiente</a></li>
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
				{!! Form::open(["url" => action('ReporteController@getReporteRelacionMensualDeIngresosRecaudacionPendiente'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-group">
					<label>Seleccione un año:</label>
					{!! Form::select('anno', $annos, null, ["class"=> "form-control"]) !!}
				</div>
				<button type="submit" class="btn btn-default">Buscar</button>
				<a class="btn btn-default" href="{{action('ReporteController@getReporteRelacionMensualDeIngresosRecaudacionPendiente')}}">Reset</a>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Reporte</h3>
				<span class="pull-right"><button class="btn btn-primary"><span class="glyphicon glyphicon-file"></span> Exportar</button></span>
			</div>
			<div class="box-body" >
				<div class="row">
					<div class="col-xs-12">

						<div class="table-responsive">
							<table class="table table-hover table-condensed">
								<thead  class="bg-primary">
									<tr>
										<th colspan="1"></th>
										<th colspan="2" style="vertical-align: middle" class="text-center">
											MANUEL CARLOS PIAR
										</th>
										<th colspan="2" style="vertical-align: middle" class="text-center">
											GRAL. TOMÁS DE HERES
										</th>
										<th colspan="2" style="vertical-align: middle" class="text-center">
											SANTA ELENA DE UAIRÉN
										</th>
										<th colspan="2" style="vertical-align: middle" class="text-center">
											TOTAL
										</th>
									</tr>
									<tr>
										<th style="vertical-align: middle" class="text-center">
											Mes
										</th>
										<th style="vertical-align: middle" class="text-center">
											Recaudado
										</th>
										<th style="vertical-align: middle" class="text-center">
											Por Recaudar
										</th>
										<th style="vertical-align: middle" class="text-center">
											Recaudado
										</th>
										<th style="vertical-align: middle" class="text-center">
											Por Recaudar
										</th>
										<th style="vertical-align: middle" class="text-center">
											Recaudado
										</th>
										<th style="vertical-align: middle" class="text-center">
											Por Recaudar
										</th>
										<th style="vertical-align: middle" class="text-center">
											Recaudado
										</th>
										<th style="vertical-align: middle" class="text-center">
											Por Recaudar
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach($montosMeses as $mes => $montos)
										<tr>
											<td>{{$mes}}</td>
											<td class="text-right cobradoPZO">{{$traductor->format($montos["cobradoPZO"])}}</td>
											<td class="text-right porCobrarPZO">{{$traductor->format($montos["porCobrarPZO"])}}</td>
											<td class="text-right cobradoCBL">{{$traductor->format($montos["cobradoCBL"])}}</td>
											<td class="text-right porCobrarCBL">{{$traductor->format($montos["porCobrarCBL"])}}</td>
											<td class="text-right cobradoSNV">{{$traductor->format($montos["cobradoSNV"])}}</td>
											<td class="text-right porCobrarSNV">{{$traductor->format($montos["porCobrarSNV"])}}</td>
											<td class="text-right cobradoTotal">{{$traductor->format($montos["cobradoTotal"])}}</td>
											<td class="text-right porCobrarTotal">{{$traductor->format($montos["porCobrarTotal"])}}</td>
										</tr>
									@endforeach
										<tr class="bg-gray">
											<td>Totales</td>
											<td class="text-right" id="cobradoTotalPZO">0</td>
											<td class="text-right" id="porCobrarTotalPZO">0</td>
											<td class="text-right" id="cobradoTotalCBL">0</td>
											<td class="text-right" id="porCobrarTotalCBL">0</td>
											<td class="text-right" id="cobradoTotalSNV">0</td>
											<td class="text-right" id="porCobrarTotalSNV">0</td>
											<td class="text-right" id="cobradoTotalTotal">0</td>
											<td class="text-right" id="porCobrarTotalTotal">0</td>
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

		//Por Aeropuerto
		var cobradoTotalPZO=0;
		$('.cobradoPZO').each(function(index,value){
			cobradoTotalPZO+=commaToNum($(value).text().trim());
		});

		var porCobrarTotalPZO=0;
		$('.porCobrarPZO').each(function(index,value){
			porCobrarTotalPZO+=commaToNum($(value).text().trim());
		});

		var cobradoTotalCBL=0;
		$('.cobradoCBL').each(function(index,value){
			cobradoTotalCBL+=commaToNum($(value).text().trim());
		});

		var porCobrarTotalCBL=0;
		$('.porCobrarCBL').each(function(index,value){
			porCobrarTotalCBL+=commaToNum($(value).text().trim());
		});

		var cobradoTotalSNV=0;
		$('.cobradoSNV').each(function(index,value){
			cobradoTotalSNV+=commaToNum($(value).text().trim());
		});

		var porCobrarTotalSNV=0;
		$('.porCobrarSNV').each(function(index,value){
			porCobrarTotalSNV+=commaToNum($(value).text().trim());
		});


		var cobradoTotalTotal=0;
		$('.cobradoTotal').each(function(index,value){
			cobradoTotalTotal+=commaToNum($(value).text().trim());
		});

		var porCobrarTotalTotal=0;
		$('.porCobrarTotal').each(function(index,value){
			porCobrarTotalTotal+=commaToNum($(value).text().trim());
		});



		$('#cobradoTotalPZO').text(numToComma(cobradoTotalPZO));
		$('#porCobrarTotalPZO').text(numToComma(porCobrarTotalPZO));
		$('#cobradoTotalCBL').text(numToComma(cobradoTotalCBL));
		$('#porCobrarTotalCBL').text(numToComma(porCobrarTotalCBL));
		$('#cobradoTotalSNV').text(numToComma(cobradoTotalSNV));
		$('#porCobrarTotalSNV').text(numToComma(porCobrarTotalSNV));
		$('#cobradoTotalTotal').text(numToComma(cobradoTotalTotal));
		$('#porCobrarTotalTotal').text(numToComma(porCobrarTotalTotal));

		
	})
</script>


@endsection