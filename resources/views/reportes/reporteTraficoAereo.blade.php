@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Tráfico Aereo por Aerolínea</a></li>
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
            <div class="box-body">
                {!! Form::open(["url" => action('ReporteController@getReporteTraficoAereo'), "method" => "GET", "class"=>"form-inline"]) !!}
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
                <div class="pull-right">
	                <button type="submit" class="btn btn-default">Buscar</button>
	                <a class="btn btn-default" href="{{action('ReporteController@getReporteTraficoAereo')}}">Reset</a>
                </div>
                <div class="form-group" style="margin-top:20px">
                <label style="width:100px"><strong>PROCEDENCIA: </strong></label>
                    <select name="procedencia" id="procedencia" class="form-control  select-flt" >
                        <option value="">TODOS</option>
                            @foreach ($puertos as $index=>$puerto)
                            <option value="{{$index}}">{{$puerto}}</option>
                        @endforeach
                    </select>               
                </div><br>
                <div class="form-group" style="margin-top:20px">
                <label style="width:100px"><strong>DESTINO: </strong></label>
                    <select name="destino" id="destino" class="form-control  select-flt" >
                        <option value="">TODOS</option>
                            @foreach ($puertos as $index=>$puerto)
                            <option value="{{$index}}">{{$puerto}}</option>
                        @endforeach
                    </select>               
                </div><br>
                <div class="form-group" style="margin-top:20px">
                <label style="width:100px"><strong>CLIENTE: </strong></label>
                    <select name="cliente" id="cliente" class="form-control select-flt" >
                        <option value="">TODOS</option>
                            @foreach ($clientes as $index=>$cliente)
                            <option value="{{$index}}">{{$cliente}}</option>
                        @endforeach
                    </select>               
                </div>
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
							<table class="table table-condensed">
								<thead  class="bg-primary">
									<tr>
										<th colspan="2" rowspan="4" style="vertical-align: middle" class="text-center"> CLIENTE </th>
										<th colspan="13" style="vertical-align: middle" class="text-center">NACIONALES</th>
										<th colspan="13" style="vertical-align: middle" class="text-center">INTERNACIONALES</th>
									</tr>
									<tr>
										<th colspan="9" class="text-center">PASAJEROS</th>
										<th colspan="2" class="text-center">CARGA</th>
										<th colspan="2" class="text-center">AERONAVES</th>
										<th colspan="9" class="text-center">PASAJEROS</th>
										<th colspan="2" class="text-center">CARGA</th>
										<th colspan="2" class="text-center">AERONÁVES</th>
									</tr>
									<tr>
										<th colspan="3" class="text-center">Desemb.</th>
										<th colspan="3" class="text-center">Embarq</th>
										<th colspan="3" class="text-center">Trans</th>

										<th colspan="1" class="text-center">Desemb.</th>
										<th colspan="1" class="text-center">Embarq</th>

										<th colspan="1" class="text-center">Arri</th>
										<th colspan="1" class="text-center">Desp</th>

										<th colspan="3" class="text-center">Desemb.</th>
										<th colspan="3" class="text-center">Embarq</th>
										<th colspan="3" class="text-center">Trans</th>

										<th colspan="1" class="text-center">Desemb.</th>
										<th colspan="1" class="text-center">Embarq</th>

										<th colspan="1" class="text-center">Arri</th>
										<th colspan="1" class="text-center">Desp</th>
									</tr>
									<tr align="center">
										<th >ADUL</th>
										<th >INF</th>
										<th >3era EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3era EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3era EDAD</th>

										<th >TON</th>
										<th >TON</th>

										<th >CANT</th>
										<th >CANT</th>

										<th >ADUL</th>
										<th >INF</th>
										<th >3era EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3era EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3era EDAD</th>

										<th >TON</th>
										<th >TON</th>

										<th >CANT</th>
										<th >CANT</th>
									</tr>
								</thead>
								<tbody>
									@foreach($datosCliente as $index => $cliente)
									<tr>
										<td colspan="2" align="left">{{$index}}</td>
										<td class="text-center" align="center">{{$cliente['desAdulNac']}}</td>
										<td class="text-center" align="center">{{$cliente['desInfNac']}}</td>
										<td class="text-center" align="center">{{$cliente['desTercNac']}}</td>
										<td class="text-center" align="center">{{$cliente['EmbAdulNac']}}</td>
										<td class="text-center" align="center">{{$cliente['EmbInfNac']}}</td>
										<td class="text-center" align="center">{{$cliente['EmbTercNac']}}</td>
										<td class="text-center" align="center">{{$cliente['TranAdulNac']}}</td>
										<td class="text-center" align="center">{{$cliente['TranInfNac']}}</td>
										<td class="text-center" align="center">{{$cliente['TranTercNac']}}</td>
										<td class="text-center" align="center">{{$cliente['cargaEmbNac']}}</td>
										<td class="text-center" align="center">{{$cliente['cargaDesNac']}}</td>
										<td class="text-center" align="center">{{$cliente['aeroAterrizaNac']}}</td>
										<td class="text-center" align="center">{{$cliente['aeroDespegueNac']}}</td>
										<td class="text-center" align="center">{{$cliente['desAdulInt']}}</td>
										<td class="text-center" align="center">{{$cliente['desInfInt']}}</td>
										<td class="text-center" align="center">{{$cliente['desTercInt']}}</td>
										<td class="text-center" align="center">{{$cliente['EmbAdulInt']}}</td>
										<td class="text-center" align="center">{{$cliente['EmbInfInt']}}</td>
										<td class="text-center" align="center">{{$cliente['EmbTercInt']}}</td>
										<td class="text-center" align="center">{{$cliente['TranAdulInt']}}</td>
										<td class="text-center" align="center">{{$cliente['TranInfInt']}}</td>
										<td class="text-center" align="center">{{$cliente['TranTercInt']}}</td>
										<td class="text-center" align="center">{{$cliente['cargaEmbInt']}}</td>
										<td class="text-center" align="center">{{$cliente['cargaDesInt']}}</td>
										<td class="text-center" align="center">{{$cliente['aeroAterrizaInt']}}</td>
										<td class="text-center" align="center">{{$cliente['aeroDespegueInt']}}</td>
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
		    $(table).find('th').css({'border-bottom':'1px solid black','border-right':'1px solid black','border-left':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center"})
		    var tableHtml= $(table)[0].outerHTML;
		    $('[name=table]').val(tableHtml);
		    $('#export-form').submit();
		});

    $('.select-flt').chosen({width:'400px'});
	});
</script>
@endsection