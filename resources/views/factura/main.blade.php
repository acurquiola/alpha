﻿@extends('app')
@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Facturación Principal</a></li>
</ol>
<div class="row" id="box-wrapper">
	<!-- left column -->
	<div class="col-md-6">
		<h3>Facturación</h3>
	</div>
	{{--<div class="col-md-6 text-right" style="margin-top:15px">--}}
		{{--<a class="btn btn-danger" href="{{ URL::to('facturacion/Todos/factura/create') }}" >Crear factura</a>--}}
	{{--</div>--}}
</div>
<div class="row" id="box-wrapper">
	<!-- left column -->
	@foreach($modulos as $modulo)

	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">{{$modulo->nombre}}</h3>
				<span clasS="pull-right"><a class="btn btn-primary"  href="{{ URL::to('facturacion/'.$modulo->nombre.'/factura') }}">Gestionar</a></span>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="table text-center">
					<thead class="bg-primary">
						<th># Factura</th>
						<th>Cliente</th>
						<th>Descripción</th>
						<th>Fecha Emisión</th>
						<th>Monto documento</th>
					</thead>
					<tbody>
						@if($modulo->facturas->count()==0)
						<tr>
							<td colspan="5">No hay facturas registradas en este módulo</td>
						</tr>
						@endif
						@foreach($modulo->facturas()->where('estado', 'P')->orderBy('id', 'DESC')->limit(15)->get() as $factura)
						<tr>
							<td>{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
							<td style="text-align: left">{{$factura->cliente->nombre}}</td>
							<td style="text-align: left">{{$factura->descripcion}}</td>
							<td>{{$factura->fecha}}</td>
							<td style="text-align: right">{{$traductor->format($factura->total)}}</td>


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
@section('script')

@endsection