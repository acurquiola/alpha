@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Relación de Formularios Anulados</a></li>
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
				{!! Form::open(["url" => action('ReporteController@getFormulariosAnulados'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-group" style="margin-left: 20px">
					<label>Mes:</label>
					{!! Form::select('mes', $meses, $mes, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group" style="margin-left: 20px">
					<label>Año:</label>
					{!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
				</div>
				<div class="form-group">
					<label style="width:80px">Aeropuerto:</label>
					{!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
				</div>
				<a class="btn btn-default  pull-right" href="{{action('ReporteController@getFormulariosAnulados')}}">Reset</a>
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
							<table class="table table-condensed">
								<tr  class="bg-primary" >
									<td style="vertical-align: middle;"  colspan="2" align="center" class="text-center">
										<strong>FACTURAS ANULADAS</strong>
									</td>
								</tr>
								<tr class="bg-primary">
									<td style="vertical-align: middle; " align="center" class="text-center">
										Fecha
									</td>
									<td style="vertical-align: middle; " align="center" class="text-center">
										Nro de Factura
									</td>
								</tr>
								@if($facturasAnuladas->count()>0)
									@foreach($facturasAnuladas as $factura)
										<tr >
											<td style="vertical-align: middle;" align="center">{{$factura->created_at}}</td>
											<td align="center" ">{{$factura->nFactura}}</td>
										</tr>
									@endforeach 
								@else
									<tr>
										<td colspan="2" class="text-center" align="center">No hay registros para las fechas seleccionadas</td>
									</tr>
								@endif
								<tr  class="bg-primary" >
									<td style="vertical-align: middle;" colspan="2" align="center" class="text-center">
										<strong>FORMULARIOS ANULADOS</strong>
									</td>
								</tr>
								<tr class="bg-primary">
									<td style="vertical-align: middle; " align="center" class="text-center">
										Fecha
									</td>
									<td style="vertical-align: middle; " align="center" class="text-center">
										Nro de Recibo
									</td>
								</tr>
								@if($recibosAnulados->count()>0)
									@foreach($recibosAnulados as $recibo)
									<tr>
										<td style="vertical-align: middle; " align="center">{{$recibo->created_at}}</td>
										<td align="center" ">{{$recibo->nroRecibo}}</td>
									</tr>
									@endforeach 
								@else
									<tr>
										<td colspan="2" class="text-center" align="center">No hay registros para las fechas seleccionadas</td>
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


		$('#cliente').chosen({width:'400px'});

		var metaTotal=0;
		$('.meta').each(function(index,value){
			metaTotal+=parseInt($(value).text().trim());
		});

		var recaudadoTotal=0;
		$('.recaudado').each(function(index,value){
			recaudadoTotal+=parseInt($(value).text().trim());
		});

		var diferenciaTotal=0;
		$('.diferencia').each(function(index,value){
			diferenciaTotal+=parseInt($(value).text().trim());
		});

		$('#metaTotal').text(metaTotal);
		$('#recaudadoTotal').text(recaudadoTotal);
		$('#diferenciaTotal').text(diferenciaTotal);


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
									<th colspan="2" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">RELACIÓN DE FORMULARIOS ANULADOS\
										</br>\
										MES: {{$mes}} AÑO: {{$anno}}\
									</th>\
								</tr>\
							</thead>')
			$(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
			$(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
			$(table).find('td').css({'font-size': '7px'})
			$(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
		    $(table).find('tr:last td').css({'border-bottom':'1px solid black'})
			var tableHtml= $(table)[0].outerHTML;
			$('[name=table]').val(tableHtml);
			$('#export-form').submit();
		})

	})
</script>


@endsection
