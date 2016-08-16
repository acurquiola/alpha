@extends('app')

@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Listado de Clientes</a></li>
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
			<div class="box-body text-right">
				{!! Form::open(["url" => action('ReporteController@getListadoClientes'), "method" => "GET", "class"=>"form-inline"]) !!}
				<div class="form-group">
					<label><strong>TIPO DE CLIENTE:</strong> </label>
                    {!! Form::select('tipo',["TODOS"=>"TODOS", "Aeronáutico"=>"Aeronáutico","No Aeronáutico"=>"No Aeronáutico","Mixto"=>"Mixto"], $tipo, [ 'class'=>"form-control"]) !!}
				</div>
				<button type="submit" class="btn btn-primary">BUSCAR</button>
				<a class="btn btn-default" href="{{action('ReporteController@getListadoClientes')}}">RESET</a>
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
									<tr align="center">
										<th align="center" style="width: 50px" >Código</th>
										<th align="center" style="width: 400px">Nombre o Razón Social</th>
										<th align="center" style="width: 70px" >RIF</th>
										<th align="center" style="width: 100px">NIT</th>
										<th align="center" style="width: 100px">Teléfono</th>
										<th align="center" style="width: 100px">Fax</th>
									</tr>
								</thead>
								<tbody>
									@foreach($clientes as $cliente)
									<tr align="left">
										<td align="center" style="width: 50px" >{{$cliente->codigo}}</td>
										<td align="left"   style="width: 400px">{{$cliente->nombre}}</td>
										<td align="left"   style="width: 70px" >{{$cliente->cedRifPrefix}} - {{$cliente->cedRif}}</td>
										<td align="center" style="width: 100px">{{$cliente->nit}}</td>
										<td align="center" style="width: 100px">{{$cliente->telefonos}}</td>
										<td align="center" style="width: 100px">{{$cliente->fax}}</td>
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
									<th colspan="6" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">LISTADO DE CLIENTES\
										</br>\
										Tipo de Clientes: {{$tipo}}\
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
	});
</script>
@endsection