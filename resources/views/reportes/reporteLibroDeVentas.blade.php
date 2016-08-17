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
										<th class="text-center" style="width: 20px" >Op. N°</th>
										<th class="text-center" style="width: 50px" >Fecha</th>
										<th class="text-center" style="width: 50px">RIF</th>
										<th class="text-center" style="width: 160px">Nombre o Razón Social</th>
										<th class="text-center" style="width: 50px">N° Comprobante</th>
										<th class="text-center" style="width: 40px">N° Factura</th>
										<th class="text-center" style="width: 40px">N° Control</th>
										<th class="text-center" style="width: 40px">N° de Nota de Débito</th>
										<th class="text-center" style="width: 40px">N° de Nota de Crédito</th>
										<th class="text-center" style="width: 40px">Tipo de Transcc</th>
										<th class="text-center" style="width: 40px">N° Factura Afectada</th>
										<th class="text-center" style="width: 40px">Total de Ventas (Incluye IVA)</th>
										<th class="text-center" style="width: 40px">Ventas Internas No Gravadas</th>
										<th class="text-center" style="width: 40px">Base Imponible</th>
										<th class="text-center" style="width: 40px">% Alicuota</th>
										<th class="text-center" style="width: 40px">Impuesto IVA</th>
										<th class="text-center" style="width: 40px">IVA Retenido por Comprador</th>
									</tr>
								<tbody>
									@if($facturas->count()>0 || $facturasCobradas->count()>0)
										@foreach($facturasCobradas as $index => $facturaCobrada)
											<tr>
												<td   style="vertical-align: middle; width: 20px" class="text-center" align="center">{{$index+1}}</td>
												<td   style="vertical-align: middle; width: 50px" class="text-center" align="center">{{$facturaCobrada->fecha}}</td>
												<td   style="vertical-align: middle; width: 50px" class="text-center formulario-bs" align="left">{{$facturaCobrada->cliente->cedRifPrefix}}-{{$facturaCobrada->cliente->cedRif}}</td>
												<td   style="vertical-align: middle; width: 160px" class="text-left aterrizaje-bs" align="left">{{$facturaCobrada->cliente->nombre}}</td>
												<td   style="vertical-align: middle; width: 50px" class="text-center aterrizaje-bs" align="left">{{($facturaCobrada->retencionComprobante == 0)?'':$facturaCobrada->retencionComprobante}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-center estacionamiento-bs" align="right">{{$facturaCobrada->nFacturaPrefix}}-{{$facturaCobrada->nFactura}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-center habilitacion-bs" align="right">{{$facturaCobrada->nControl}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-center jetway-bs" align="right"> </td>
												<td   style="vertical-align: middle; width: 40px" class="text-center carga-bs" align="right"> </td>
												<td   style="vertical-align: middle; width: 40px" class="text-center" align="right">{{ ($facturaCobrada->deleted_at == null)?'01-reg':'03-anu' }}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-right jetway-bs" align="right"> </td>
												<td   style="vertical-align: middle; width: 40px" class="text-right montoFacturado-bs" align="right">{{$traductor->format($facturaCobrada->total)}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($facturaCobrada->base == $facturaCobrada->monto)?$traductor->format($facturaCobrada->monto):''}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($facturaCobrada->base == $facturaCobrada->monto)?'':$traductor->format($facturaCobrada->base)}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($facturaCobrada->base == $facturaCobrada->monto)?'':$traductor->format($facturaCobrada->ivaDes)}} </td>
												<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($facturaCobrada->base == $facturaCobrada->monto)?'':$traductor->format($facturaCobrada->ivapercentage)}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($facturaCobrada->base == $facturaCobrada->monto)?'':$traductor->format((($facturaCobrada->total-$facturaCobrada->base)*$facturaCobrada->ivapercentage)/100)}}</td>
											</tr>
										@endforeach
										@foreach($facturas as $index => $factura)
											<tr>
												<td   style="vertical-align: middle; width: 20px" class="text-center" align="center">{{$index+$facturasCobradas->count()}}</td>
												<td   style="vertical-align: middle; width: 50px" class="text-center" align="center">{{$factura->fecha}}</td>
												<td   style="vertical-align: middle; width: 50px" class="text-center formulario-bs" align="left">{{$factura->cliente->cedRifPrefix}}-{{$factura->cliente->cedRif}}</td>
												<td   style="vertical-align: middle; width: 160px" class="text-left aterrizaje-bs" align="left">{{$factura->cliente->nombre}}</td>
												<td   style="vertical-align: middle; width: 50px" class="text-center aterrizaje-bs" align="left">{{($factura->retencionComprobante == 0)?'':$factura->retencionComprobante}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-center estacionamiento-bs" align="right">{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-center habilitacion-bs" align="right">{{$factura->nControl}}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-center jetway-bs" align="right"> </td>
												<td   style="vertical-align: middle; width: 40px" class="text-center carga-bs" align="right"> </td>
												<td   style="vertical-align: middle; width: 40px" class="text-center" align="right">{{ ($factura->deleted_at == null)?'01-reg':'03-anu' }}</td>
												<td   style="vertical-align: middle; width: 40px" class="text-right jetway-bs" align="right"> </td>
												@if($factura->deleted_at == null)
													<td   style="vertical-align: middle; width: 40px" class="text-right montoFacturado-bs" align="right">{{$traductor->format($factura->total)}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?$traductor->format($factura->monto):''}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':$traductor->format($factura->base)}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':$traductor->format($factura->ivaDes)}} </td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':$traductor->format($factura->ivapercentage)}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':$traductor->format((($factura->total-$factura->base)*$factura->ivapercentage)/100)}}</td>
												@else
													<td   style="vertical-align: middle; width: 40px" class="text-right montoFacturado-bs" align="right">0,00</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'0,00':''}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':'0,00'}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':'0,00'}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':'0,00'}}</td>
													<td   style="vertical-align: middle; width: 40px" class="text-right montoDepositado-bs" align="right">{{($factura->base == $factura->monto)?'':'0,00'}}</td>
												@endif
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
		                            <th colspan="18" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">LIBRO DE VENTAS\
		                                </br>\
										DESDE: {{$diaDesde}}/{{$mesDesde}}/{{$annoDesde}} HASTA: {{$diaHasta}}/{{$mesHasta}}/{{$annoHasta}}\
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