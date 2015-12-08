@extends('app')
@section('content')
<div class="row" id="box-wrapper">
	<!-- left column -->
	<div class="col-md-6">
		<h3>Cobranza</h3>
	</div>

</div>
<div class="row" id="box-wrapper">
	@foreach($modulos as $modulo)

	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">{{$modulo->nombre}} <a class="btn btn-default" href="{{ action('CobranzaController@index', [$modulo->nombre]) }}"><span class="glyphicon glyphicon-search"></span></a></h3>
				<span clasS="pull-right"><a class="btn btn-primary"  href="{{action('CobranzaController@create', [$modulo->nombre]) }}">Cobrar</a></span>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="table text-center">
					<thead class="bg-primary">
						<th># Factura</th>
						<th>Cliente</th>
						<th>Descripción</th>
						<th>Monto documento</th>
						<th>Monto pendiente</th>
						<th>Fecha Emisión</th>
						<th>Fecha Vencimiento</th>
					</thead>
					<tbody>
						@if($modulo->facturas->count()==0)
						<tr>
							<td colspan="7" class="text-center">No hay facturas registradas en este módulo</td>
						</tr>
						@endif
						@foreach($modulo->facturas as $factura)
						<tr>
							<td>{{$factura->nFactura}}</td>
							<td style="text-align:left">{{$factura->cliente->nombre}}</td>
							<td style="text-align:left">{{$factura->descripcion}}</td>
							<td style="text-align:right">{{$factura->total}}</td>
							<td style="text-align:right">{{$factura->total-(($factura->metadata)?$factura->metadata->total:0)}}</td>
							<td style="text-align:right">{{$factura->fecha}}</td>
							<td >{{$factura->fechaVencimiento}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
	@endforeach
</div>
@endsection
