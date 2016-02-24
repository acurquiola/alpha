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
                <div class="pull-right">
	                <button type="submit" class="btn btn-default">Buscar</button>
	                <a class="btn btn-default" href="{{action('ReporteController@getReporteTraficoAereo')}}">Reset</a>
	                	
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
										<th colspan="1" rowspan="3" style="vertical-align: middle" class="text-center"> </th>
										<th colspan="10" style="vertical-align: middle" class="text-center">NACIONALES</th>
										<th colspan="10" style="vertical-align: middle" class="text-center">INTERNACIONALES</th>
									</tr>
									<tr>
										<th colspan="6" class="text-center">PASAJEROS</th>
										<th colspan="2" class="text-center">CARGA</th>
										<th colspan="2" class="text-center">AERONÁVES</th>
										<th colspan="6" class="text-center">PASAJEROS</th>
										<th colspan="2" class="text-center">CARGA</th>
										<th colspan="2" class="text-center">AERONÁVES</th>
									</tr>
									<tr>
										<th colspan="2" class="text-center">Desemb.</th>
										<th colspan="2" class="text-center">Embarq</th>
										<th colspan="2" class="text-center">Trans</th>

										<th colspan="1" class="text-center">Desemb.</th>
										<th colspan="1" class="text-center">Embarq</th>

										<th colspan="1" class="text-center">Arri</th>
										<th colspan="1" class="text-center">Desp</th>

										<th colspan="2" class="text-center">Desemb.</th>
										<th colspan="2" class="text-center">Embarq</th>
										<th colspan="2" class="text-center">Trans</th>

										<th colspan="1" class="text-center">Desemb.</th>
										<th colspan="1" class="text-center">Embarq</th>

										<th colspan="1" class="text-center">Arri</th>
										<th colspan="1" class="text-center">Desp</th>
									</tr>
									<tr align="center">
										<th colspan="1"  ></th>
										<th >ADUL</th>
										<th >INF</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >ADUL</th>
										<th >INF</th>

										<th >TON</th>
										<th >TON</th>

										<th >CANT</th>
										<th >CANT</th>

										<th >ADUL</th>
										<th >INF</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >ADUL</th>
										<th >INF</th>

										<th >TON</th>
										<th >TON</th>

										<th >CANT</th>
										<th >CANT</th>
									</tr>
								</thead>
								<tbody>
									@foreach($despegues as $despegue)
									<tr title="{{$despegue->fecha}}">
										<td align="left">{{$despegue->cliente->nombre}}</td>
										<td align="center">{{$despegue->aterrizaje->desembarqueAdultos}}</td>
										<td align="center">{{$despegue->aterrizaje->desembarqueInfante}}</td>
										<td align="center">{{$despegue->embarqueAdultos}}</td>
										<td align="center">{{$despegue->embarqueInfante}}</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
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