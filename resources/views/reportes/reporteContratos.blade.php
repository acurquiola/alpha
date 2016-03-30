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
				{!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
				{!! Form::hidden('table') !!}
                {!! Form::hidden('departamento', 'Oficina de Asuntos Legales') !!}
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
										<th >Código Contrato</th>
										<th >Código Cliente</th>
										<th >Cliente</th>
										<th >Tipo</th>
										<th >Monto</th>
									</tr>
								</thead>
								<tbody>
									@foreach($contratos as $contrato)
									<tr align="left">
										<td>{{$contrato->nContrato}}</td>
										<td>{{$contrato->cliente->codigo}}</td>
										<td>{{$contrato->cliente->nombre}}</td>
										<td>{{$contrato->montoTipo}}</td>
										<td>{{$contrato->monto}}</td>
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
	$(function(){
		$('#export-btn').click(function(e){
		    var table=$('table').clone();
		    $(table).find('th').css({'border-bottom':'1px solid black','border-right':'1px solid black','border-left':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center"})
		    var tableHtml= $(table)[0].outerHTML;
		    $('[name=table]').val(tableHtml);
		    $('#export-form').submit();
		});
	});
	});
</script>
@endsection