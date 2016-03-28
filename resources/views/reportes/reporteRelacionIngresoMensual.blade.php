@extends('app')

@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Relación de Ingreso Mensual</a></li>
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
				{!! Form::open(["url" => action('ReporteController@getReporteRelacionIngresoMensual'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-group">
					<label>Seleccione un año:</label>
					{!! Form::select('anno', $annos, null, ["class"=> "form-control"]) !!}
				</div>
				<button type="submit" class="btn btn-default">Buscar</button>
				<a class="btn btn-default" href="{{action('ReporteController@getReporteRelacionIngresoMensual')}}">Reset</a>
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
										<th style="vertical-align: middle" class="text-center">
											Aeropuerto/Mes
										</th>
										<th style="vertical-align: middle" class="text-center">
											Manuel Carlos Piar
										</th>
										<th style="vertical-align: middle" class="text-center">
											Gral. Tomás de Heres
										</th>
										<th style="vertical-align: middle" class="text-center">
											Santa Elena de Uairén
										</th>
										<th style="vertical-align: middle" class="text-center">
											Total
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach($montosMeses as $mes => $montos)
										<tr>
											<td>{{$mes}}</td>
											<td class="text-right cobradoPZO">{{$traductor->format($montos["cobradoPZO"])}}</td>
											<td class="text-right cobradoCBL">{{$traductor->format($montos["cobradoCBL"])}}</td>
											<td class="text-right cobradoSNV">{{$traductor->format($montos["cobradoSNV"])}}</td>
											<td class="text-right cobradoTotal">{{$traductor->format($montos["cobradoTotal"])}}</td>
										</tr>
									@endforeach
										<tr class="bg-gray">
											<td>Totales</td>
											<td class="text-right" id="cobradoTotalPZO">0</td>
											<td class="text-right" id="cobradoTotalCBL">0</td>
											<td class="text-right" id="cobradoTotalSNV">0</td>
											<td class="text-right cobradoTotalTotal">0</td>
										</tr>
										<tr>
											<td >Monto Recaudado al mes: {{$mesActual}}</td>
											<td class="text-right cobradoTotalTotal" id="totalRecaudado">0</td>
										</tr>
										<tr>
											<td>Meta anual asignada: </td>
											<td class="text-right" id="meta">5.000,00</td>
										</tr>
										<tr>
											<td>Diferencia:</td>
											<td class="text-right" id="diferencia" >{{$traductor->format($montos["cobradoTotal"])}}</td>
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

		var cobradoTotalCBL=0;
		$('.cobradoCBL').each(function(index,value){
			cobradoTotalCBL+=commaToNum($(value).text().trim());
		});


		var cobradoTotalSNV=0;
		$('.cobradoSNV').each(function(index,value){
			cobradoTotalSNV+=commaToNum($(value).text().trim());
		});



		var cobradoTotalTotal=0;
		$('.cobradoTotal').each(function(index,value){
			cobradoTotalTotal+=commaToNum($(value).text().trim());
		});

		var meta=0;
		$('#meta').each(function(index,value){
			meta+=commaToNum($(value).text().trim());
		});

		diferencia=cobradoTotalTotal-meta;

		$('#cobradoTotalPZO').text(numToComma(cobradoTotalPZO));
		$('#cobradoTotalCBL').text(numToComma(cobradoTotalCBL));
		$('#cobradoTotalSNV').text(numToComma(cobradoTotalSNV));
		$('.cobradoTotalTotal').text(numToComma(cobradoTotalTotal));
		$('#diferencia').text(numToComma(diferencia));

		
	})
</script>


@endsection