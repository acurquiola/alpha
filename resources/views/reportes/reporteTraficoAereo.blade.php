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
                <div class="form-group" style="margin-top:20px">
                <label style="width:100px"><strong>PROCEDENCIA: </strong></label>
                	{!! Form::select('procedencia', $puertos, $procedencia, ["class"=> "form-control select-flt"]) !!}               
                </div><br>
                <div class="form-group" style="margin-top:20px">
                <label style="width:100px"><strong>DESTINO: </strong></label>
                	{!! Form::select('destino', $puertos, $destino, ["class"=> "form-control select-flt"]) !!}              
                </div><br>
                <div class="form-group" style="margin-top:20px">
                <label style="width:100px"><strong>CLIENTE: </strong></label>                      
                	{!! Form::select('cliente_id', $clientes, $cliente, ["class"=> "form-control select-flt"]) !!}
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
										<th colspan="3" rowspan="4" style="vertical-align: middle" class="text-center"> CLIENTE </th>
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
										<th colspan="3" class="text-center">Desemb</th>
										<th colspan="3" class="text-center">Emb</th>
										<th colspan="3" class="text-center">Trans</th>

										<th colspan="1" class="text-center">Desemb</th>
										<th colspan="1" class="text-center">Emb</th>

										<th colspan="1" class="text-center">Arri</th>
										<th colspan="1" class="text-center">Desp</th>

										<th colspan="3" class="text-center">Desemb</th>
										<th colspan="3" class="text-center">Emb</th>
										<th colspan="3" class="text-center">Trans</th>

										<th colspan="1" class="text-center">Desemb</th>
										<th colspan="1" class="text-center">Emb</th>

										<th colspan="1" class="text-center">Arri</th>
										<th colspan="1" class="text-center">Desp</th>
									</tr>
									<tr align="center">
										<th >ADUL</th>
										<th >INF</th>
										<th >3ra EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3ra EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3ra EDAD</th>

										<th >TON</th>
										<th >TON</th>

										<th >CANT</th>
										<th >CANT</th>

										<th >ADUL</th>
										<th >INF</th>
										<th >3ra EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3ra EDAD</th>
										<th >ADUL</th>
										<th >INF</th>
										<th >3ra EDAD</th>

										<th >TON</th>
										<th >TON</th>

										<th >CANT</th>
										<th >CANT</th>
									</tr>
								</thead>
								<tbody>
									@foreach($datosCliente as $index => $cliente)
									<tr>
										<td colspan="3" align="left">{{$index}}</td>
										<td class="text-center desAdulNac" align="center">{{$cliente['desAdulNac']}}</td>
										<td class="text-center desInfNac" align="center">{{$cliente['desInfNac']}}</td>
										<td class="text-center desTercNac" align="center">{{$cliente['desTercNac']}}</td>
										<td class="text-center EmbAdulNac" align="center">{{$cliente['EmbAdulNac']}}</td>
										<td class="text-center EmbInfNac" align="center">{{$cliente['EmbInfNac']}}</td>
										<td class="text-center EmbTercNac" align="center">{{$cliente['EmbTercNac']}}</td>
										<td class="text-center TranAdulNac" align="center">{{$cliente['TranAdulNac']}}</td>
										<td class="text-center TranInfNac" align="center">{{$cliente['TranInfNac']}}</td>
										<td class="text-center TranTercNac" align="center">{{$cliente['TranTercNac']}}</td>
										<td class="text-center cargaEmbNac" align="center">{{$cliente['cargaEmbNac']}}</td>
										<td class="text-center cargaDesNac" align="center">{{$cliente['cargaDesNac']}}</td>
										<td class="text-center aeroAterrizaNac" align="center">{{$cliente['aeroAterrizaNac']}}</td>
										<td class="text-center aeroDespegueNac" align="center">{{$cliente['aeroDespegueNac']}}</td>
										<td class="text-center desAdulInt" align="center">{{$cliente['desAdulInt']}}</td>
										<td class="text-center desInfInt" align="center">{{$cliente['desInfInt']}}</td>
										<td class="text-center desTercInt" align="center">{{$cliente['desTercInt']}}</td>
										<td class="text-center EmbAdulInt" align="center">{{$cliente['EmbAdulInt']}}</td>
										<td class="text-center EmbInfInt" align="center">{{$cliente['EmbInfInt']}}</td>
										<td class="text-center EmbTercInt" align="center">{{$cliente['EmbTercInt']}}</td>
										<td class="text-center TranAdulInt" align="center">{{$cliente['TranAdulInt']}}</td>
										<td class="text-center TranInfInt" align="center">{{$cliente['TranInfInt']}}</td>
										<td class="text-center TranTercInt" align="center">{{$cliente['TranTercInt']}}</td>
										<td class="text-center cargaEmbInt" align="center">{{$cliente['cargaEmbInt']}}</td>
										<td class="text-center cargaDesInt" align="center">{{$cliente['cargaDesInt']}}</td>
										<td class="text-center aeroAterrizaInt" align="center">{{$cliente['aeroAterrizaInt']}}</td>
										<td class="text-center aeroDespegueInt" align="center">{{$cliente['aeroDespegueInt']}}</td>
									</tr>
									@endforeach
									<tr class="bg-gray" style="font-weight: bold">
										<td colspan="3" align="left">TOTAL</td>
										<td class="text-center" id="desAdulNac" align="center">0</td>
										<td class="text-center" id="desInfNac" align="center">0</td>
										<td class="text-center" id="desTercNac" align="center">0</td>
										<td class="text-center" id="EmbAdulNac" align="center">0</td>
										<td class="text-center" id="EmbInfNac" align="center">0</td>
										<td class="text-center" id="EmbTercNac" align="center">0</td>
										<td class="text-center" id="TranAdulNac" align="center">0</td>
										<td class="text-center" id="TranInfNac" align="center">0</td>
										<td class="text-center" id="TranTercNac" align="center">0</td>
										<td class="text-center" id="cargaEmbNac" align="center">0</td>
										<td class="text-center" id="cargaDesNac" align="center">0</td>
										<td class="text-center" id="aeroAterrizaNac" align="center">0</td>
										<td class="text-center" id="aeroDespegueNac" align="center">0</td>
										<td class="text-center" id="desAdulInt" align="center">0</td>
										<td class="text-center" id="desInfInt" align="center">0</td>
										<td class="text-center" id="desTercInt" align="center">0</td>
										<td class="text-center" id="EmbAdulInt" align="center">0</td>
										<td class="text-center" id="EmbInfInt" align="center">0</td>
										<td class="text-center" id="EmbTercInt" align="center">0</td>
										<td class="text-center" id="TranAdulInt" align="center">0</td>
										<td class="text-center" id="TranInfInt" align="center">0</td>
										<td class="text-center" id="TranTercInt" align="center">0</td>
										<td class="text-center" id="cargaEmbInt" align="center">0</td>
										<td class="text-center" id="cargaDesInt" align="center">0</td>
										<td class="text-center" id="aeroAterrizaInt" align="center">0</td>
										<td class="text-center" id="aeroDespegueInt" align="center">0</td>
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

        var desAdulNac=0;
        $('.desAdulNac').each(function(index,value){
            desAdulNac+=commaToNum($(value).text().trim());
        });

        var desInfNac=0;
        $('.desInfNac').each(function(index,value){
            desInfNac+=commaToNum($(value).text().trim());
        });


        var desTercNac=0;
        $('.desTercNac').each(function(index,value){
            desTercNac+=commaToNum($(value).text().trim());
        });

        var EmbAdulNac=0;
        $('.EmbAdulNac').each(function(index,value){
            EmbAdulNac+=commaToNum($(value).text().trim());
        });

        var EmbInfNac=0;
        $('.EmbInfNac').each(function(index,value){
            EmbInfNac+=commaToNum($(value).text().trim());
        });

        var EmbTercNac=0;
        $('.EmbTercNac').each(function(index,value){
            EmbTercNac+=commaToNum($(value).text().trim());
        });

        var TranAdulNac=0;
        $('.TranAdulNac').each(function(index,value){
            TranAdulNac+=commaToNum($(value).text().trim());
        });

        var TranInfNac=0;
        $('.TranInfNac').each(function(index,value){
            TranInfNac+=commaToNum($(value).text().trim());
        });

        var TranTercNac=0;
        $('.TranTercNac').each(function(index,value){
            TranTercNac+=commaToNum($(value).text().trim());
        });

        var cargaEmbNac=0;
        $('.cargaEmbNac').each(function(index,value){
            cargaEmbNac+=commaToNum($(value).text().trim());
        });

        var cargaDesNac=0;
        $('.cargaDesNac').each(function(index,value){
            cargaDesNac+=commaToNum($(value).text().trim());
        });

        var aeroAterrizaNac=0;
        $('.aeroAterrizaNac').each(function(index,value){
            aeroAterrizaNac+=commaToNum($(value).text().trim());
        });

        var aeroDespegueNac=0;
        $('.aeroDespegueNac').each(function(index,value){
            aeroDespegueNac+=commaToNum($(value).text().trim());
        });
        var desAdulInt=0;
        $('.desAdulInt').each(function(index,value){
            desAdulInt+=commaToNum($(value).text().trim());
        });

        var desInfInt=0;
        $('.desInfInt').each(function(index,value){
            desInfInt+=commaToNum($(value).text().trim());
        });


        var desTercInt=0;
        $('.desTercInt').each(function(index,value){
            desTercInt+=commaToNum($(value).text().trim());
        });

        var EmbAdulInt=0;
        $('.EmbAdulInt').each(function(index,value){
            EmbAdulInt+=commaToNum($(value).text().trim());
        });

        var EmbInfInt=0;
        $('.EmbInfInt').each(function(index,value){
            EmbInfInt+=commaToNum($(value).text().trim());
        });

        var EmbTercInt=0;
        $('.EmbTercInt').each(function(index,value){
            EmbTercInt+=commaToNum($(value).text().trim());
        });

        var TranAdulInt=0;
        $('.TranAdulInt').each(function(index,value){
            TranAdulInt+=commaToNum($(value).text().trim());
        });

        var TranInfInt=0;
        $('.TranInfInt').each(function(index,value){
            TranInfInt+=commaToNum($(value).text().trim());
        });

        var TranTercInt=0;
        $('.TranTercInt').each(function(index,value){
            TranTercInt+=commaToNum($(value).text().trim());
        });

        var cargaEmbInt=0;
        $('.cargaEmbInt').each(function(index,value){
            cargaEmbInt+=commaToNum($(value).text().trim());
        });

        var cargaDesInt=0;
        $('.cargaDesInt').each(function(index,value){
            cargaDesInt+=commaToNum($(value).text().trim());
        });

        var aeroAterrizaInt=0;
        $('.aeroAterrizaInt').each(function(index,value){
            aeroAterrizaInt+=commaToNum($(value).text().trim());
        });

        var aeroDespegueInt=0;
        $('.aeroDespegueInt').each(function(index,value){
            aeroDespegueInt+=commaToNum($(value).text().trim());
        });

        $('#desAdulNac').text(desAdulNac);
        $('#desInfNac').text(desInfNac);
        $('#desTercNac').text(desTercNac);
        $('#EmbAdulNac').text(EmbAdulNac);
        $('#EmbInfNac').text(EmbInfNac);
        $('#EmbTercNac').text(EmbTercNac);
        $('#TranAdulNac').text(TranAdulNac);
        $('#TranInfNac').text(TranInfNac);
        $('#TranTercNac').text(TranTercNac);
        $('#cargaEmbNac').text(cargaEmbNac);
        $('#cargaDesNac').text(cargaDesNac);
        $('#aeroAterrizaNac').text(aeroAterrizaNac);
        $('#aeroDespegueNac').text(aeroDespegueNac);
        $('#desAdulInt').text(desAdulInt);
        $('#desInfInt').text(desInfInt);
        $('#desTercInt').text(desTercInt);
        $('#EmbAdulInt').text(EmbAdulInt);
        $('#EmbInfInt').text(EmbInfInt);
        $('#EmbTercInt').text(EmbTercInt);
        $('#TranAdulInt').text(TranAdulInt);
        $('#TranInfInt').text(TranInfInt);
        $('#TranTercInt').text(TranTercInt);
        $('#cargaEmbInt').text(cargaEmbInt);
        $('#cargaDesInt').text(cargaDesInt);
        $('#aeroAterrizaInt').text(aeroAterrizaInt);
        $('#aeroDespegueInt').text(aeroDespegueInt);

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
									<th colspan="29" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">TRÁFICO AEREO POR AEROLÍNEA\
										</br>\
										AEROPUERTO: {{$aeropuerto->nombre}}\
										</br>\
										CLIENTE: {{($clientes)?"TODOS":$clientes->nombre}}\
										</br>\
										PROCEDENCIA: {{$procedenciaNombre}} - DESTINO: {{$destinoNombre}}\
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
		});

    $('.select-flt').chosen({width:'400px'});
	});
</script>
@endsection