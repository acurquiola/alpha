<div class="col-md-6 connectedSortable" >
	<div class="box box-warning">
		<div class="box-header  with-border">
			<h3 class="box-title"><span class="fa fa-bars"></span> RESUMEN DE CUADRE DE CAJA</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table no-margin">
						<thead>
							<tr class="bg-gray">
								<th class="text-right"></th>
								<th colspan="2">Bs. </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Total Contado: </td>
								<td>{{$traductor->format($facturasContado)}}</td>
							</tr> 
							<tr>
								<td>Total Crédito: </td>
								<td>{{$traductor->format($facturasCredito)}}</td>	
							</tr>
							<tr>
								<td>Total: </td>
								<td>{{$traductor->format($facturasTotal)}}</td>
							</tr>
					</tbody>
				</table>
				<div class="box-footer clearfix">
					<a href="{{ URL::to('reporte/reporterCuadreCaja') }}" class="pull-right btn btn-default">Ver más <i class="fa fa-arrow-circle-right"></i></a>
				</a>	
			</div>
		</div><!-- /.table-responsive -->
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.box -->