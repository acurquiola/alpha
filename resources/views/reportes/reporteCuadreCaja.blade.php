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
					<input type="text" class="form-control" name="diaHasta" value="{{$diaHasta}}"placeholder="Día">
                </div>
                <div class="form-group">
                      {!! Form::select('mesHasta', $meses, $mesHasta, ["class"=> "form-control"]) !!}
                </div>
                <div class="form-group">
                      {!! Form::select('annoHasta', $annos, $annoHasta, ["class"=> "form-control"]) !!}
                </div>
                <br>
                <button type="submit" class="btn btn-default">Buscar</button>
                <a class="btn btn-default" href="{{action('ReporteController@getReporteDES900')}}">Reset</a>
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
									<tr class="bg-primary" >
										<th class="text-center">Nro. Control</th>
										<th class="text-center">Nro. Dosa</th>
										<th class="text-center">Nro. Factura</th>
										<th class="text-center">Cliente</th>
										<th class="text-center">Fecha</th>
										<th class="text-center">Monto</th>
									</tr>
								<tbody>
									@foreach($facturas as $factura)
									<tr title="{{$factura->fecha}}" align="center">
										<td>{{$factura->nControl}}</td>
										<td>{{$factura->nroDosa}}</td>
										<td>{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
										<td align="left">{{$factura->cliente->nombre}}</td>
										<td>{{$factura->fecha}}</td>
										<td align="right">{{$traductor->format($factura->total)}}</td>
									</tr>
									@endforeach

			                        <tr class="bg-gray" align="center">
			                        	<td>Total Contado</td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td align="right">{{$traductor->format($facturasContado)}}</td>			                        
			                        </tr>
			                        <tr class="bg-gray" align="center">
			                        	<td>Total Crédito</td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td align="right">{{$traductor->format($facturasCredito)}}</td>			                        
			                        </tr>
			                        <tr class="bg-primary" align="center">
			                        	<td>Total</td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td> - </td>
			                        	<td align="right">{{$traductor->format($facturasTotal)}}</td>			                        
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
		    $(table).prepend('<thead>\
		    					<tr>\
									<th colspan="6" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">CUADRE DE CAJA\
									</br>\
									DESDE: {{$diaDesde}}/{{$mesDesde}}/{{$annoDesde}} HASTA: {{$diaHasta}}/{{$mesHasta}}/{{$annoHasta}} </th>\
								</tr>\
							</thead>')
		    $(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center"})
		    $(table).find('th').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center"})
		    $(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
		    var tableHtml= $(table)[0].outerHTML;
		    $('[name=table]').val(tableHtml);
		    $('#export-form').submit();
		});
	});
</script>
@endsection