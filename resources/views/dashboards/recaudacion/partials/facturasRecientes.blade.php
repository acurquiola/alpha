<div class="col-md-6 connectedSortable" >
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><span class="fa fa-road"></span> ÚLTIMAS FACTURAS GENERADAS (PENDIENTES)</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table no-margin">
					<thead>
						<tr>
							<th>Nro. Factura</th>
							<th>Nro. Control</th>
							<th>Cliente</th>
							<th>Módulo</th>
							<th>Total (Bs.)</th>
						</tr>
					</thead>
					<tbody>
					@if(count($facturas)>0)
						@foreach($facturas as $factura)
						<tr>
							<td class='text-justify'>{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
							<td class='text-justify'>{{$factura->nControlPrefix}}-{{$factura->nControl}}</td>
							<td style="text-align: left">{{$factura->clienteNombre}}</td>
							<td style="text-align: left">{{$factura->moduloNombre}}</td>
							<td style="text-align: right">{{$traductor->format($factura->total)}}</td>
							<td>
							</td>
						</tr>
						@endforeach
					@else					
						<tr>
							<td colspan="5" align="center">No hay registros disponibles</td>
						</tr>
					@endif
					</tbody>
				</table>
				<div class="box-footer clearfix">
					<a href="{{action('FacturaController@main', ["Todos"]) }}" class="pull-right btn btn-default">Ver más <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div><!-- /.table-responsive -->
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div><!-- /.col -->