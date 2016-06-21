	<div class="col-md-6 connectedSortable" >

		<div class="box box-warning">
			<div class="box-header  with-border">
				<h3 class="box-title"><span class="fa fa-bars"></span> RESUMEN DE RECAUDACIÓN Y META</h3>
				<div class="box-tools pull-right">	
	                {!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
	                {!! Form::hidden('table') !!}
	                {!! Form::hidden('departamento', $departamento) !!}
	                {!! Form::hidden('gerencia', $gerencia) !!}
	                <button class="btn btn-box-tool" id="export-btn"><i class="fa fa-file-pdf-o"></i></button>
	                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	                {!! Form::close() !!}	
				</div>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table class="table no-margin">
						<tbody>
							<tr>
								<td colspan="4" style="font-weight: bold"  align="center" class="text-center bg-warning">RECAUDACIÓN AL MES </td>
							</tr> 
							@foreach ($montosMeses as $index=>$montos)
							<tr  style="font-weight: bold">
								<td class="text-center" align="center">Aeropuerto </td>
								<td class="text-center" align="center">Recaudado</td>
								<td class="text-center" align="center">Meta</td>
								<td class="text-center" align="center">Diferencia</td>
							</tr> 
							<tr>
								<td class="text-center" align="center">AIMCP </td>
								<td class="text-right" align="right">{{$traductor->format($montos['recaudadoPZO'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['metaPZO'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['diferenciaPZO'])}}</td>
							</tr> 
							<tr>
								<td class="text-centercenter" align="center">AGTH </td>
								<td class="text-right" align="right">{{$traductor->format($montos['recaudadoCBL'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['metaCBL'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['diferenciaCBL'])}}</td>
							</tr> 
							<tr>
								<td class="text-center" align="center">SNV </td>
								<td class="text-right" align="right">{{$traductor->format($montos['recaudadoSNV'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['metaSNV'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['diferenciaSNV'])}}</td>
							</tr> 
							<tr>
								<td class="text-center" align="center"><strong>TOTAL </strong></td>
								<td class="text-right" align="right" style="font-weight: bold">{{$traductor->format($montos['recaudadoTotal'])}}</td>
								<td class="text-right" align="right" style="font-weight: bold">{{$traductor->format($montos['metaTotal'])}}</td>
								<td class="text-right" align="right" style="font-weight: bold">{{$traductor->format($montos['diferenciaTotal'])}}</td>
							</tr> 
							<tr>
								<td colspan="4" style="font-weight: bold"  align="center" class="text-center bg-warning">RECAUDACIÓN AL AÑO </td>
							</tr> 
							<tr  style="font-weight: bold">
								<td class="text-center" align="center">Aeropuerto </td>
								<td class="text-center" align="center">Recaudado</td>
								<td class="text-center" align="center">Meta</td>
								<td class="text-center" align="center">Diferencia</td>
							</tr> 
							<tr>
								<td class="text-center" align="center">AIMCP </td>
								<td class="text-right" align="right">{{$traductor->format($montos['recaudadoPZOAnual'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['metaPZOAnual'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['diferenciaPZOAnual'])}}</td>
							</tr> 
							<tr>
								<td class="text-centercenter" align="center">AGTH </td>
								<td class="text-right" align="right">{{$traductor->format($montos['recaudadoCBLAnual'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['metaCBLAnual'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['diferenciaCBLAnual'])}}</td>
							</tr> 
							<tr>
								<td class="text-center" align="center" >SNV </td>
								<td class="text-right" align="right">{{$traductor->format($montos['recaudadoSNVAnual'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['metaSNVAnual'])}}</td>
								<td class="text-right" align="right">{{$traductor->format($montos['diferenciaSNVAnual'])}}</td>
							</tr>
							<tr>
								<td class="text-center" align="center" ><strong>TOTAL </strong></td>
								<td class="text-right" align="right" style="font-weight: bold">{{$traductor->format($montos['recaudadoTotalAnual'])}}</td>
								<td class="text-right" align="right" style="font-weight: bold">{{$traductor->format($montos['metaTotalAnual'])}}</td>
								<td class="text-right" align="right" style="font-weight: bold">{{$traductor->format($montos['diferenciaTotalAnual'])}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div><!-- /.table-responsive -->
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.box -->
