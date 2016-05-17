@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">DES900</a></li>
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
                {!! Form::open(["url" => action('ReporteController@getReporteDES900'), "method" => "GET", "class"=>"form-inline"]) !!}
                 <label><strong>DESDE: </strong></label>
				<div class="form-group">
					<input type="text" class="form-control" name="diaDesde" placeholder="Día">
                </div>
                <div class="form-group">
                      {!! Form::select('mesDesde', $meses, $mesDesde, ["class"=> "form-control"]) !!}
                </div>
                <div class="form-group">
                      {!! Form::select('annoDesde', $annos, $annoDesde, ["class"=> "form-control"]) !!}
                </div>
                <label style="margin-left: 20px"><strong>HASTA: </strong></label>
				<div class="form-group">
					<input type="text" class="form-control" name="diaHasta" placeholder="Día">
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
							<table class="table table-condensed">
								<thead  class="bg-primary">
									<tr>
										<th colspan="4" rowspan="2" style="vertical-align: middle" class="text-center">GENERAL</th>
										<th colspan="9" style="vertical-align: middle" class="text-center">ATERRIZAJE</th>
										<th colspan="7" style="vertical-align: middle" class="text-center">DESPEGUE</th>
									</tr>
									<tr>
										<th colspan="5"></th>
										<th colspan="2" class="text-center">Desembarque</th>
										<th colspan="2" class="text-center">Tránsito</th>
										<th colspan="5"></th>
										<th colspan="2" class="text-center">Embarque</th>
									</tr>
									<tr align="center">
										<th >Día</th>
										<th >N° Dosa</th>
										<th >Modelo</th>
										<th >Matrícula</th>

										<th >Piloto</th>
										<th >N°Vuelo</th>
										<th >Fecha</th>
										<th >Hora</th>
										<th >Procedencia</th>
										<th >Pass</th>
										<th >Carga</th>
										<th >Pass</th>
										<th >Carga</th>

										<th >Piloto</th>
										<th >N°Vuelo</th>
										<th >Fecha</th>
										<th >Hora</th>
										<th >Destino</th>
										<th >Pass</th>
										<th >Carga</th>
									</tr>
								</thead>
								<tbody>
									@foreach($despegues as $despegue)
									<tr title="{{$despegue->fecha}}" align="center">
										<td>{{$despegue->fecha}}</td>
										<td>{{($despegue->factura)?$despegue->factura->nroDosa:"N/A"}}</td>
										<td>{{$despegue->aterrizaje->aeronave->modelo->modelo}}</td>
										<td>{{$despegue->aterrizaje->aeronave->matricula}}</td>

										<td>{{($despegue->aterrizaje->piloto)?$despegue->aterrizaje->piloto->nombre:"N/A"}}</td>
										<td>{{($despegue->aterrizaje->num_vuelo)?$despegue->aterrizaje->num_vuelo:"N/A"}}</td>
										<td>{{$despegue->aterrizaje->fecha}}</td>
										<td>{{$despegue->aterrizaje->hora}}</td>
										<td>{{($despegue->aterrizaje->puerto)?$despegue->aterrizaje->puerto->nombre:"N/A"}}</td>
										<td>{{$despegue->aterrizaje->desembarqueAdultos+$despegue->aterrizaje->desembarqueInfante+$despegue->aterrizaje->desembarqueTercera}}</td>
										<td>{{$despegue->peso_desembarcado}}</td>
										<td>{{$despegue->aterrizaje->desembarqueTransito}}</td>
										<td>{{$despegue->peso_embarcado}}</td>

										<td>{{($despegue->piloto)?$despegue->piloto->nombre:"N/A"}}</td>
										<td>{{($despegue->num_vuelo)?$despegue->num_vuelo:"N/A"}}</td>
										<td>{{$despegue->fecha}}</td>
										<td>{{$despegue->hora}}</td>
										<td>{{($despegue->puerto)?$despegue->puerto->nombre:"N/A"}}</td>
										<td>{{$despegue->embarqueAdultos+$despegue->embarqueInfante+$despegue->embarqueTercera}}</td>
										<td>{{$despegue->peso_embarcado}}</td>
									</tr>
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
									<th colspan="20" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">DES 900\
									</br>\
									DESDE: {{$diaDesde}}/{{$mesDesde}}/{{$annoDesde}} HASTA: {{$diaHasta}}/{{$mesHasta}}/{{$annoHasta}} </th>\
								</tr>\
							</thead>')
			$(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
			$(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
			$(table).find('td').css({'font-size': '6px'})
			$(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
			$(table).find('tr:last td').css({'border-bottom':'1px solid black'})
			var tableHtml= $(table)[0].outerHTML;
			$('[name=table]').val(tableHtml);
			$('#export-form').submit();
		});
	});
</script>
@endsection