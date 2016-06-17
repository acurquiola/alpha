@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Libro de Ventas</a></li>
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
                {!! Form::open(["url" => action('ReporteController@getReporteLibroDeVentas'), "method" => "GET", "class"=>"form-inline"]) !!}
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
                <a class="btn btn-default" href="{{action('ReporteController@getReporteLibroDeVentas')}}">Reset</a>
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
									<tr class="bg-primary" >
										<th class="text-center" >Op. N°</th>
										<th class="text-center">Fecha</th>
										<th class="text-center">RIF</th>
										<th class="text-center">Nombre o Razón Social</th>
										<th class="text-center">Nro. Comprobante</th>
										<th class="text-center">Nro. Factura</th>
										<th class="text-center">Nro. Control</th>
										<th class="text-center">Nro. de Nota de Débito</th>
										<th class="text-center">Nro. de Nota de Crédito</th>
										<th class="text-center">Tipo de Transcc</th>
										<th class="text-center">Nro. Factura Afectada</th>
										<th class="text-center">Total de Ventas (Incluye IVA)</th>
										<th class="text-center">Ventas Internas No Gravadas</th>
										<th class="text-center">Base Imponible</th>
										<th class="text-center">% Alicuota</th>
										<th class="text-center">Impuesto IVA</th>
										<th class="text-center">IVA Retenido por Comprador</th>
									</tr>
								<tbody>
									@if($facturas->count()>0)
										@foreach($facturas as $index => $factura)
											<tr>
												<td   style="vertical-align: middle" class="text-center" align="center">{{$index+1}}</td>
												<td   style="vertical-align: middle" class="text-center" align="center">{{$factura->fecha}}</td>
												<td   style="vertical-align: middle" class="text-left formulario-bs" align="left">{{$factura->cliente->cedRifPrefix}}-{{$factura->cliente->cedRif}}</td>
												<td   style="vertical-align: middle" class="text-left aterrizaje-bs" align="left">{{$factura->cliente->nombre}}</td>
												<td   style="vertical-align: middle" class="text-left aterrizaje-bs" align="left">{{($factura->retencionComprobante == 0)?'':$factura->retencionComprobante}}</td>
												<td   style="vertical-align: middle" class="text-right estacionamiento-bs" align="right">{{$factura->nFactura}}</td>
												<td   style="vertical-align: middle" class="text-right habilitacion-bs" align="right">{{$factura->nControl}}</td>
												<td   style="vertical-align: middle" class="text-right jetway-bs" align="right"> </td>
												<td   style="vertical-align: middle" class="text-right carga-bs" align="right"> </td>
												<td   style="vertical-align: middle" class="text-right" align="right">01-reg</td>
												<td   style="vertical-align: middle" class="text-right jetway-bs" align="right"> </td>
												<td   style="vertical-align: middle" class="text-right montoFacturado-bs" align="right">{{$factura->monto}}</td>
												<td   style="vertical-align: middle" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?$factura->monto:''}}</td>
												<td   style="vertical-align: middle" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':$factura->base}}</td>
												<td   style="vertical-align: middle" class="text-right montoDepositado-bs" align="right"> </td>
												<td   style="vertical-align: middle" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':$factura->ivapercentage}}</td>
												<td   style="vertical-align: middle" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':(($factura->monto-$factura->base)*$factura->ivapercentage)/100}}</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="18" class="text-center">No hay registros para los datos suministrados.</td>
										</tr>
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
									<th colspan="18" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">CUADRE DE CAJA\
									</br>\
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
		});
	});
</script>
@endsection