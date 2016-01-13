@extends('app')
@section('content')
<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a href="{{action('FacturaController@main', ["Todos"])}}">Facturación Principal</a></li>
	<li><a class="active">Facturación {{$modulo->nombre}}</a></li>
</ol>
 <div class="row" id="box-wrapper">
 	<!-- left column -->
 	<div class="col-md-12">
 		<!-- general form elements -->
 		<div class="box box-primary" id="main-box">
 			<div class="box-header">
 				<h3 class="box-title"></h3>
 			</div><!-- /.box-header -->
 			<!-- form start -->

 			<div class="box-body"  id="container">

 				<div class="row">

 					<div class="col-xs-12">
 						<div style="padding:0px 30px 0px 0px">
 							<div class="panel panel-default">
 								<div class="panel-body">
 									<div class="container-fluid">

 										<div class="form-group">
 											<label for="active-input">Año</label>
 											<select class="form-control search-parm-select" id="year-select" autocomplete="off">
	 											@foreach ($annos as $index => $anno)
	 												<option value="{{$index}}" {{($index==$fecha->year)?"selected":""}}>{{ $anno }}</option>
	 											@endforeach
 											</select>
 										</div>
 										<div class="form-group">
 											<label for="active-input">Mes</label>
 											<select class="form-control search-parm-select" id="month-select" autocomplete="off">
 												@foreach ($meses as $index => $mes)
	 												<option value="{{$index}}" {{($index==$fecha->month)?"selected":""}}>{{ $mes }}</option>
	 											@endforeach
 											</select>
 										</div>
 										<div class="form-group">
 											<label for="Femision-input">Seleccione las facturas a crear (Numero Contrato | Codigo Cliente | Nombre Cliente)</label>
                                            <div id="contratos-wrapper">
                                                @include('factura.partials.automaticaContratos', compact('contratos', 'fecha'))
                                            </div>
 										</div>
                                        <label for="active-input">Número de control</label>
 										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button style="max-height:37px" type="button" class="btn btn-default"><span class="nControlPrefix-text">{{$modulo->nControlPrefix}}</span></button>
                                                </div>
 											    <input class="form-control" id="nc-general-input" value="{{\App\Factura::getMaxWith('nControlPrefix', 'nControl', $modulo->nControlPrefix)}}"/>
                                            </div>
 										</div>
 										<button type="submit" class="btn btn-default" id="generar-btn">Generar</button>

 									</div>
 								</div>
 							</div>

 						</div>

 					</div>
 					<div class="col-xs-12">

 						<table class="table text-center" id="fac-table">
 							<thead>
 								<th>Numero de control</th>
 								<th>Numero de contrato</th>
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
    function tooltipOnDisabledChecks(){
      $('input[type="checkbox"][disabled]').each(function(index, value){
        $(value).closest('label').tooltip({
            title: "Ya existe una factura automatica para este contrato en la fecha seleccionada."
        })
      })

    }

 	$(document).ready(function(){
        tooltipOnDisabledChecks()
        $('.search-parm-select').change(function(){
            var year=$("#year-select").val();
            var month=$("#month-select").val();
            $.ajax({
                method:'POST',
                url:"{{action('FacturaController@postContratosByFecha', [$modulo->nombre])}}",
                data:{year:year, month:month}
            }).always(function(data, status){
                if(status!="error"){
                  $('#contratos-wrapper').html(data);
                  $('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                  });
                    tooltipOnDisabledChecks()
                }
                else
                    console.log(data, status);
            })
        });



 		$('#generar-btn').click(function(){
 			$('#fac-table tbody tr').remove();
 			var tr="";
 			var nc=parseInt($('#nc-general-input').val());
 			nc=isNaN(nc)?"":nc;
 			$('#contratos-wrapper').find('[type=checkbox]:checked').each(function(){
 			var monto=$(this).data('monto');
            var fechaControlContrato=$(this).data('fechaControlContrato');
 			var finicio=$(this).data('finicio');
 			var ffin=$(this).data('ffin');
            var concepto_id=$(this).data('concepto_id');
            var cliente_id=$(this).data('cliente_id');
            var contrato_id=$(this).data('contrato_id');
 				tr+=" <tr " +
 				 "data-concepto_id='" + concepto_id+"' "+
                 "data-n-factura-prefix='{{$modulo->nFacturaPrefix}}' "+
 				 "data-n-control-prefix='{{$modulo->nControlPrefix}}' "+
 				 "data-n-control='"+nc+"' "+
                 "data-fecha-control-contrato='" + fechaControlContrato+"' "+
 				 "data-fecha='" + finicio+"' "+
 				 "data-fecha-vencimiento='" + ffin+"' "+
 				 "data-cliente_id='" + cliente_id+"' "+
 				 "data-contrato_id='" + contrato_id+"' "+
                 "data-modulo_id='{{$modulo->id}}' "+
                 "data-monto='" + monto+"' "+
 				     ">" +
                        "<td class='text-justify'>" +
                            '<div class="input-group">'+
                                '<div class="input-group-btn">'+
                                    '<button style="max-height:37px" type="button" class="btn btn-default"><span class="nControlPrefix-text">{{$modulo->nControlPrefix}}</span></button>'+
                                '</div>'+
                                "<input class='form-control nc-input' autocomplete='off' value='"+((nc=="")?"":(nc++))+"'/> " +
                            "</div>"+
                        "</td>" +
                        " <td class='text-justify'>"+
                            $(this).val()+
                        "</td> " +
                        "<td class='text-justify'>"+monto+"</td>" +
                        " <td class='text-justify'>"+finicio+"</td>" +
                        " <td class='text-justify'>"+ffin+"</td>" +
                        " <td>" +
                            " <div class='btn-group  btn-group-sm' role='group' aria-label='...'>" +
                                " <button class='btn btn-danger eliminar-btn'><span class='glyphicon glyphicon-remove'></span></button>" +
                            " </div>" +
                        " </td>" +
                    " </tr>";
 			});

 			$('#fac-table tbody').append(tr);
 		})

 		$('#fac-table').delegate('.eliminar-btn','click',function(){
 			$(this).closest('tr').remove();
 		})

 		$('#guardar-btn').click(function(){
 		    var $trs =$('#fac-table tbody tr');
 		    if($trs.length==0){
 		        alertify.error("No se ha seleccionado ningun contrato")
 		        return;
 		    }
            var facturas=[];
            $trs.each(function(index, value){
                facturas.push($(value).data());
            })
	        addLoadingOverlay('#main-box');
                $.ajax({
                    method:'POST',
                    url:"{{action('FacturaController@postContratosStoreAutomatica', [$modulo->nombre])}}",
                    data:{facturas:facturas}
                }).always(function(data, status){
                	removeLoadingOverlay('#main-box');
                    if(status!="error"){
                        location.replace("{{action('FacturaController@getContratosAutomaticaResult', [$modulo->nombre])}}")
                    }
                    else{
                        alertify.error("Se produjo un error en el servidor.");
                        console.log(data, status);
                    }
                })
 		})

 	});


</script>

@endsection