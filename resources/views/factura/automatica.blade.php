@extends('app')
@section('content')

 <div class="row" id="box-wrapper">
 	<!-- left column -->
 	<div class="col-md-12">
 		<!-- general form elements -->
 		<div class="box box-primary">
 			<div class="box-header">
 				<h3 class="box-title"></h3>
 			</div><!-- /.box-header -->
 			<!-- form start -->

 			<div class="box-body"  id="container">

 				<div class="row">

 					<div class="col-xs-3">
 						<div style="padding:0px 30px 0px 0px">
 							<div class="panel panel-default">
 								<div class="panel-body">
 									<div class="container-fluid">

 										<div class="form-group">
 											<label for="active-input">Año</label>
 											<select class="form-control">
	 											@foreach ($annos as $anno)
	 												<option>{{ $anno }}</option>
	 											@endforeach
 											</select>
 										</div>
 										<div class="form-group">
 											<label for="active-input">Mes</label>
 											<select class="form-control">
 												@foreach ($meses as $mes)
	 												<option>{{ $mes }}</option>
	 											@endforeach
 											</select>
 										</div>
 										<div class="form-group" id="clientes-wrapper">
 											<label for="Femision-input">Cliente</label>
 											<div class="checkbox">
 												<label>
 													<input type="checkbox" value="Cliente 1" disabled autocomplete="off"> Cliente 1
 												</label>
 											</div>
 											<div class="checkbox">
 												<label>
 													<input type="checkbox" value="Cliente 2" autocomplete="off"> Cliente 2
 												</label>
 											</div>
 											<div class="checkbox">
 												<label>
 													<input type="checkbox" value="Cliente 3" autocomplete="off"> Cliente 3
 												</label>
 											</div>
 											<div class="checkbox">
 												<label>
 													<input type="checkbox" value="Cliente 4" autocomplete="off"> Cliente 4
 												</label>
 											</div>
 											<div class="checkbox">
 												<label>
 													<input type="checkbox" value="Cliente 5" autocomplete="off"> Cliente 5
 												</label>
 											</div>
 											<div class="checkbox">
 												<label>
 													<input type="checkbox" value="Cliente 6" autocomplete="off"> Cliente 6
 												</label>
 											</div>

 										</div>
 										<div class="form-group">
 											<label for="active-input">N/C</label>
 											<input class="form-control" id="nc-general-input"/>
 										</div>
 										<button type="submit" class="btn btn-default" id="generar-btn">Generar</button>

 									</div>
 								</div>
 							</div>

 						</div>

 					</div>
 					<div class="col-xs-9">

 						<table class="table text-center" id="fac-table">
 							<thead>
 								<th># Factura</th>
 								<th>N/C</th>
 								<th>Cliente</th>
 								<th>Monto</th>
 								<th>Fecha de emision</th>
 								<th>Fecha de vencimiento</th>
 								<th>Acción</th>
 							</thead>
 							<tbody>
 							</tbody>



 						</table>

 					</div>



 				</div>
 			</div><!-- /.box-body -->
 			<div class="box-footer">
 				<button class="btn btn-primary" id="guardar-btn"> Guardar </button>
 			</div>
 		</div><!-- /.box -->
 	</div>
 </div>

@endsection
@section('script')

 <script>

 	$(document).ready(function(){

 		$('#generar-btn').click(function(){
 			$('#fac-table tbody tr').remove();
 			var tr="";
 			var nc=parseInt($('#nc-general-input').val());
 			nc=isNaN(nc)?"":nc;
 			$('#clientes-wrapper').find('[type=checkbox]:checked').each(function(){

 				tr+=" <tr> <td class='text-justify'>0000000</td><td class='text-justify'><input class='form-control nc-input' autocomplete='off' value='"+((nc=="")?"":(nc++))+"'/> </td> <td class='text-justify'>"+$(this).val()+"</td> <td class='text-justify'>0000000</td> <td class='text-justify'>00-00-0000</td> <td class='text-justify'>00-00-0000</td> <td> <div class='btn-group  btn-group-sm' role='group' aria-label='...'> <a class='btn btn-primary' href=''><span class='glyphicon glyphicon-eye-open'></span></a> <button class='btn btn-danger eliminar-btn'><span class='glyphicon glyphicon-remove'></span></button> </div> </td> </tr>";
 			});

 			$('#fac-table tbody').append(tr);
 		})

 		$('#fac-table').delegate('.eliminar-btn','click',function(){
 			$(this).closest('tr').remove();
 		})

 		$('#guardar-btn').click(function(){
 			confirm("Desea imprimir las facturas?");
 		})

 	});


</script>

@endsection