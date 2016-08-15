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
				<label><strong>DESDE: </strong></label>
				<div class="form-group">
					<input type="text" class="form-control" name="diaDesde" value="{{$diaDesde}}" placeholder="Día">
                </div>
                <div class="form-group">
                      {!! Form::select('mesDesde', $meses, $mesDesde, ["class"=> "form-control"]) !!}
                </div>
                <div class="form-group">
                      {!! Form::select('annoDesde', $annos, $annoDesde, ["class"=> "form-control"]) !!}
                </div>
                <label style="margin-left: 30px"><strong>HASTA: </strong></label>
				<div class="form-group">
					<input type="text" class="form-control" name="diaHasta" value="{{$diaHasta}}" placeholder="Día">
                </div>
                <div class="form-group">
                      {!! Form::select('mesHasta', $meses, $mesHasta, ["class"=> "form-control"]) !!}
                </div>
                <div class="form-group">
                      {!! Form::select('annoHasta', $annos, $annoHasta, ["class"=> "form-control"]) !!}
                </div>
				<div class="form-group">
					<label style="margin-left: 30px"><strong>AEROPUERTO: </strong></label>
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
										<th   style="vertical-align: middle; width: 40px" class="text-center" align="center">
											FECHA
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Nro. FACTURA
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Nro. CONTROL
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Nro. DOSA
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											FORMULARIO
										</th>
										<th   style="vertical-align: middle; width: 70px" class="text-center" align="center">
											ATERRIZAJE
										</th>
										<th   style="vertical-align: middle; width: 80px" class="text-center" align="center">
											ESTACIONAMIENTO
										</th>
										<th   style="vertical-align: middle; width: 70px; " class="text-center" align="center">
											HABILITACIÓN
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											JETWAY
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											CARGA
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											Nro. COBRO
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											FACTURADO
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											DEPOSITADO
										</th>
										<th   style="vertical-align: middle" class="text-center" align="center">
											DIFERENCIA
										</th>
									</tr>
								</thead>
								<tbody>
								@if($dosaFactura == [])
									<tr>
										<td colspan="15" class="text-center">No hay registros para los datos suministrados.</td>
									</tr>
								@else
									@foreach($dosaFactura as $nroDosa => $dosaFactura)
										<tr>
											<td   style="vertical-align: middle; width:40px" class="text-center" align="center">
												{{$dosaFactura['fecha']}}
											</td>
											<td   style="vertical-align: middle" class="text-center" align="center">
												{{$dosaFactura['nFactura']}}
											</td>
											<td   style="vertical-align: middle" class="text-center" align="center">
												{{$dosaFactura['nControl']}}
											</td>
											<td   style="vertical-align: middle" class="text-center" align="center">
												{{$nroDosa}}
											</td>
											<td   style="vertical-align: middle" class="text-right formulario-bs" align="right">
												{{$traductor->format($dosaFactura['formulario'])}}
											</td>
											<td   style="vertical-align: middle; width: 70px; " class="text-right aterrizaje-bs" align="right">
												{{$traductor->format($dosaFactura['aterrizaje'])}}
											</td>
											<td   style="vertical-align: middle; width: 80px; " class="text-right estacionamiento-bs" align="right">
												{{$traductor->format($dosaFactura['estacionamiento'])}}
											</td>
											<td   style="vertical-align: middle; width: 70px; " class="text-right habilitacion-bs" align="right">
												{{$traductor->format($dosaFactura['habilitacion'])}}
											</td>
											<td   style="vertical-align: middle" class="text-right jetway-bs" align="right">
												{{$traductor->format($dosaFactura['jetway'])}}
											</td>
											<td   style="vertical-align: middle" class="text-right carga-bs" align="right">
												{{$traductor->format($dosaFactura['carga'])}}
											</td>
											<td   style="vertical-align: middle" class="text-right" align="right">
												{{$dosaFactura['nroCobro']}}
											</td>
											<td   style="vertical-align: middle" class="text-right montoFacturado-bs" align="right">
												{{$traductor->format($dosaFactura['montoFacturado'])}}
											</td>
											<td   style="vertical-align: middle" class="text-right montoDepositado-bs" align="right">
												{{$traductor->format($dosaFactura['montoDepositado'])}}
											</td>
											<td   style="vertical-align: middle" class="text-right diferencia-bs" align="right">
												{{$traductor->format($dosaFactura['montoFacturado']-$dosaFactura['montoDepositado'])}}
											</td>
										</tr>
									@endforeach
										<tr class="bg-gray">
											<td align="center" class="text-center" style="font-weight: bold;">TOTALES</td>
											<td align="center" class="text-center">-</td>
											<td align="center" class="text-center">-</td>
											<td align="center" class="text-center">-</td>
											<td align="right" class="text-right" id="formularioTotal" style="font-weight: bold;" align="right">0</td>
											<td align="right" class="text-right" id="aterrizajeTotal" style="font-weight: bold;" align="right">0</td>
											<td align="right" class="text-right" id="estacionamientoTotal" style="font-weight: bold;" align="right">0</td>
											<td align="right" class="text-right" id="habilitacionTotal" style="font-weight: bold;" align="right">0</td>
											<td align="right" class="text-right" id="jetwayTotal" style="font-weight: bold;" align="right">0</td>
											<td align="right" class="text-right" id="cargaTotal" style="font-weight: bold;" align="right">0</td>
											<td align="center" class="text-center">-</td>
											<td align="right" class="text-right" id="montoFacturadoTotal" style="font-weight: bold;" align="right">0</td>
											<td align="right" class="text-right" id="montoDepositadoTotal" style="font-weight: bold;" align="right">0</td>
											<td align="right" class="text-right" id="montoDiferenciaTotal" style="font-weight: bold;" align="right">0</td>
										</tr>
									@endif
									@if($tasasVendidas->count()>0)
										<tr class="bg-primary" >
											<th class="text-center" colspan="14" >
												TASAS VENDIDAS
											</th>
										</tr>
											<tr class="bg-primary" >
												<th colspan="2" class="text-center">Fecha</th>
												<th colspan="2" class="text-center">Serie</th>
												<th colspan="2" class="text-center">Inicio</th>
												<th colspan="2" class="text-center">Fin</th>
												<th colspan="2" class="text-center">Cantidad</th>
												<th colspan="2" class="text-center">Monto</th>
												<th colspan="2" class="text-center">Total</th>
											</tr>
										<tbody>
											@foreach($tasasVendidas as $tasas)
											<tr title="{{$tasas->fecha}}" align="center">
												<td colspan="2" class="text-center" align="center">{{$tasas->fecha}}</td>
												<td colspan="2" class="text-center" align="center">{{($tasas->serie)?$tasas->serie:'-'}}</td>
												<td colspan="2" class="text-center" align="center">{{($tasas->inicio)?$tasas->inicio:'-'}}</td>
												<td colspan="2" class="text-center" align="center">{{($tasas->fin)?$tasas->fin:'-'}}</td>
												<td colspan="2" class="text-center" align="center">{{ ($tasas->cantidad)?$tasas->cantidad:'0' }}</td>
												<td colspan="2" class="text-right" align="right">{{($tasas->costo)?$traductor->format($tasas->costo):'0'}}</td>
												<td colspan="2" class="text-right" align="right" >{{($tasas->total)?$traductor->format($tasas->total):'0'}}</td>
											</tr>
											@endforeach
					                        <tr class="bg-gray" align="center">
					                        	<td colspan="13" align="right" class="text-right"><strong>TOTAL TASAS</strong></td>
					                        	<td align="right"><strong>{{$traductor->format($totalTasas)}}</strong></td>			                        
					                        </tr>
										</tbody>
									@endif
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

		var formularioTotal=0;
		$('.formulario-bs').each(function(index,value){
			formularioTotal+=commaToNum($(value).text().trim());
		});
		var aterrizajeTotal=0;
		$('.aterrizaje-bs').each(function(index,value){
			aterrizajeTotal+=commaToNum($(value).text().trim());
		});
		var estacionamientoTotal=0;
		$('.estacionamiento-bs').each(function(index,value){
			estacionamientoTotal+=commaToNum($(value).text().trim());
		});
		var habilitacionTotal=0;
		$('.habilitacion-bs').each(function(index,value){
			habilitacionTotal+=commaToNum($(value).text().trim());
		});
		var jetwayTotal=0;
		$('.jetway-bs').each(function(index,value){
			jetwayTotal+=commaToNum($(value).text().trim());
		});
		var cargaTotal=0;
		$('.carga-bs').each(function(index,value){
			cargaTotal+=commaToNum($(value).text().trim());
		});
		var montoFacturadoTotal=0;
		$('.montoFacturado-bs').each(function(index,value){
			montoFacturadoTotal+=commaToNum($(value).text().trim());
		});
		var montoDepositadoTotal=0;
		$('.montoDepositado-bs').each(function(index,value){
			montoDepositadoTotal+=commaToNum($(value).text().trim());
		});
		var montoDiferenciaTotal=0;
		$('.diferencia-bs').each(function(index,value){
			montoDiferenciaTotal+=commaToNum($(value).text().trim());
		});


		$('#formularioTotal').text(numToComma(formularioTotal));
		$('#aterrizajeTotal').text(numToComma(aterrizajeTotal));
		$('#estacionamientoTotal').text(numToComma(estacionamientoTotal));
		$('#habilitacionTotal').text(numToComma(habilitacionTotal));
		$('#jetwayTotal').text(numToComma(jetwayTotal));
		$('#cargaTotal').text(numToComma(cargaTotal));
		$('#montoFacturadoTotal').text(numToComma(montoFacturadoTotal));
		$('#montoDepositadoTotal').text(numToComma(montoDepositadoTotal));
		$('#montoDiferenciaTotal').text(numToComma(montoDiferenciaTotal));


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
									<th colspan="15" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">RELACIÓN DE INGRESOS AERONÁUTICOS CONTADO\
										</br>\
										DESDE: {{$diaDesde}}/{{$mesDesde}}/{{$annoDesde}} HASTA: {{$diaHasta}}/{{$mesHasta}}/{{$annoHasta}} </th>\
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

