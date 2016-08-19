@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Cuadre de Caja</a></li>
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
            <div class="box-body text-right">
                {!! Form::open(["url" => action('ReporteController@getReporteCuadreCaja'), "method" => "GET", "class"=>"form-inline"]) !!}
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
                <label style="margin-left: 20px"><strong>HASTA: </strong></label>
				<div class="form-group">
					<input type="text" class="form-control" name="diaHasta" value="{{$diaHasta}}" placeholder="Día">
                </div>
                <div class="form-group">
                      {!! Form::select('mesHasta', $meses, $mesHasta, ["class"=> "form-control"]) !!}
                </div>
                <div class="form-group">
                      {!! Form::select('annoHasta', $annos, $annoHasta, ["class"=> "form-control"]) !!}
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a class="btn btn-default" href="{{action('ReporteController@getReporteCuadreCaja')}}">Reset</a>
                {!! Form::close() !!}
            </div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary">
            <div class="box-header">
                {!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
                {!! Form::hidden('table') !!}
                {!! Form::hidden('departamento', $departamento) !!}
                {!! Form::hidden('gerencia', $gerencia) !!}
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
							<table  class="table table-condensed">
								<thead>
									<tr class="bg-primary" >
										<th class="text-center" colspan="8" >
											FACTURAS EMITIDAS
										</th>
									</tr>
									<tr class="bg-primary" >
										<th class="text-center" align="center" style="width: 60px">Fecha</th>
										<th class="text-center" align="center" style="width: 60px">Nro. Control</th>
										<th class="text-center" align="center" style="width: 60px">Nro. Dosa</th>
										<th class="text-center" align="center" style="width: 60px">Nro. Factura</th>
										<th class="text-center" align="center" style="width: 280px">Cliente</th>
										<th class="text-center">Cond. Pago</th>
										<th class="text-center">Nro. Cobro</th>
										<th class="text-center">Monto</th>
									</tr>
								</thead>
								<tbody>
									@foreach($facturas as $factura)
									<tr title="{{$factura->fecha}}" align="center">
										<td class="text-center" align="center" style="width: 60px">{{$factura->fecha}}</td>
										<td class="text-center" align="center" style="width: 60px">{{$factura->nControlPrefix}}-{{$factura->nControl}}</td>
										<td class="text-center" align="center" style="width: 60px">{{$factura->nroDosa}}</td>
										<td class="text-center" align="center" style="width: 60px">{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
										<td class="text-left" align="left" style="width: 280px">{{$factura->cliente->nombre}}</td>
										<td class="text-center" align="center" >{{$factura->condicionPago}}</td>
										<td class="text-center" align="center" >@foreach($factura->cobros as $cobro) {{($cobro->id)?$cobro->id:''}} @endforeach</td>
										<td class="text-right" align="right">{{$traductor->format($factura->total)}}</td>
									</tr>
									@endforeach
									@if($facturasAnuladasTotal>0)
										<tr class="bg-primary" >
											<th class="text-center" colspan="8" >
												FACTURAS ANULADAS
											</th>
										</tr>
										<tr class="bg-primary" >
											<th class="text-center" align="center" style="width: 60px">Fecha</th>
											<th class="text-center" align="center" style="width: 60px">Nro. Control</th>
											<th class="text-center" align="center" style="width: 60px">Nro. Dosa</th>
											<th class="text-center" align="center" style="width: 280px">Nro. Factura</th>
											<th class="text-center" align="center">Cliente</th>
											<th class="text-center" align="center" >Cond. Pago</th>
											<th class="text-center" align="center" >Nro. Cobro</th>
											<th class="text-center" align="center" >Monto</th>
										</tr>
										<tbody>
											@foreach($facturasAnuladas as $facturaAnulada)
											<tr title="{{$facturaAnulada->fecha}}" align="center">
												<td class="text-center" align="center" style="width: 60px">{{$facturaAnulada->fecha}}</td>
												<td class="text-center" align="center" style="width: 60px">{{$facturaAnulada->nControlPrefix}}-{{$facturaAnulada->nControl}}</td>
												<td class="text-center" align="center" style="width: 60px">{{$facturaAnulada->nroDosa}}</td>
												<td class="text-center" align="center" style="width: 280px">{{$facturaAnulada->nFacturaPrefix}}-{{$facturaAnulada->nFactura}}</td>
												<td align="left" class="text-left">{{$facturaAnulada->cliente->nombre}}</td>
												<td class="text-center" align="center">{{$facturaAnulada->condicionPago}}</td>
												<td class="text-center" align="center">@foreach($factura->cobros as $cobro) {{($cobro->id)?$cobro->id:''}} @endforeach</td>
												<td class="text-right" align="right">{{$traductor->format($facturaAnulada->total)}}</td>
											</tr>
											@endforeach
					                        <tr class="bg-gray" align="center">
					                        	<td colspan="7" align="right" class="text-right"><strong>TOTAL ANULADO</strong></td>
					                        	<td align="right"><strong>{{$traductor->format($facturasAnuladasTotal)}}</strong></td>			                        
					                        </tr>
										</tbody>
									@endif
			                        <tr class="bg-gray" align="center">
			                        	<td colspan="7" align="right" class="text-right"><strong>TOTAL CONTADO</strong></td>
			                        	<td align="right"><strong>{{$traductor->format($facturasContado)}}</strong></td>			                        
			                        </tr>
			                        <tr class="bg-gray" align="center">
			                        	<td colspan="7" align="right" class="text-right"><strong>TOTAL CRÉDITO</strong></td>
			                        	<td align="right"><strong>{{$traductor->format($facturasCredito)}}</strong></td>			                        
			                        </tr>
									@if($tasasVendidas->count()>0)
										<tr class="bg-primary" >
											<th class="text-center" colspan="8" >
												TASAS VENDIDAS
											</th>
										</tr>
											<tr class="bg-primary" >
												<th class="text-center">Fecha</th>
												<th class="text-center">Serie</th>
												<th class="text-center">Tipo</th>
												<th class="text-center">Inicio</th>
												<th class="text-center">Fin</th>
												<th class="text-center">Cantidad</th>
												<th class="text-center">Monto</th>
												<th class="text-center">Total</th>
											</tr>
										<tbody>
											@foreach($tasasVendidas as $tasas)
											<tr title="{{$tasas->fecha}}" align="center">
												<td class="text-center" align="center">{{$tasas->fecha}}</td>
												<td class="text-center" align="center">{{($tasas->serie)?$tasas->serie:'-'}}</td>
												<td class="text-center" align="center">{{($tasas->internacional==1)?'Internacional':'Nacional'}}</td>
												<td class="text-center" align="center">{{($tasas->inicio)?$tasas->inicio:'-'}}</td>
												<td class="text-center" align="center">{{($tasas->fin)?$tasas->fin:'-'}}</td>
												<td class="text-center" align="center">{{ ($tasas->cantidad)?$tasas->cantidad:'0' }}</td>
												<td class="text-right" align="right">{{($tasas->costo)?$traductor->format($tasas->costo):'0'}}</td>
												<td class="text-right" align="right" >{{($tasas->total)?$traductor->format($tasas->total):'0'}}</td>
											</tr>
											@endforeach
					                        <tr class="bg-gray" align="center">
					                        	<td colspan="7" align="right" class="text-right"><strong>TOTAL TASAS</strong></td>
					                        	<td align="right"><strong>{{$traductor->format($totalTasas)}}</strong></td>			                        
					                        </tr>
										</tbody>
									@endif
									

			                        <tr class="bg-primary" align="center">
			                        	<td colspan="7" align="right" class="text-right"><strong>TOTAL RECAUDADO</strong></td>
			                        	<td align="right" class="text-right"><strong>{{$traductor->format($facturasTotal+$totalTasas)}}</strong></td>			                        
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
									<th colspan="8" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">CUADRE DE CAJA\
									</br>\
									DESDE: {{$diaDesde}}/{{$mesDesde}}/{{$annoDesde}} HASTA: {{$diaHasta}}/{{$mesHasta}}/{{$annoHasta}} </th>\
								</tr>\
							</thead>')
			$(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
			$(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
			$(table).find('td').css({'font-size': '7px'})
			$(table).find('tr:nth-child(even)').css({'border-bottom':'1px solid black'})
			$(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
			var tableHtml= $(table)[0].outerHTML;
			$('[name=table]').val(tableHtml);
			$('#export-form').submit();
		});
	});
</script>
@endsection