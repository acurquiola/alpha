@extends('app')
@section('content')

<ol class="breadcrumb">
	<li><a href="{{url('principal')}}">Inicio</a></li>
	<li><a class="active">Conciliación Bancaria</a></li>
</ol>

<div class="row" id="box-wrapper">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body text-right"  id="container">
				<form class="form-inline">
					{!! Form::hidden('sortName', null, []) !!}
					{!! Form::hidden('sortType', null, []) !!}
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input id="fecha-datepicker-filter" data-inputmask="'alias': 'dd/mm/yyyy'"   type="text" name="fecha_conciliacion" class="form-control" data-mask  placeholder="Fecha Conciliación" />
						</div><!-- /.input group -->
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar-o"></i>
							</div>
							<input id="fecha-datepicker2-filter" data-inputmask="'alias': 'dd/mm/yyyy'"   type="text" name="fecha_banco" class="form-control" data-mask  placeholder="Fecha Banco" />
						</div><!-- /.input group -->
					</div>
					<button type="submit" id="filtrar-btn" class="btn btn-primary pull-right" style="margin-left: 20px"><i class="fa fa-filter"></i></button>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Conciliación Bancaria</h3>
			</div>
			<div class="box-body"  id="container">
				<div class="row">
					<div class="col-xs-12">
						<ul class="list-group">
							<li class="list-group-item" data-id="1">
								<div class="media">
									<div class="pull-right media-right">
										<div class="btn-group-vertical  btn-group-xs" role="group" aria-label="...">
											<a class="btn btn-primary" href="{{action('ConciliacionController@getMovimientos') }}">&nbsp;<span class="glyphicon glyphicon-plus"></span>&nbsp;</a>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">Generar conciliación </h6>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<!-- Tabla de aeronaves-->
								<div class="nav-tabs-custom">						
									<div class="box box-info">
										<div class="box-header with-border">
											<h3 class="box-title"><span class="ion ion-people-stalker"></span> Movimientos </h3>
										</div><!-- /.box-header -->
										<div class="box-body" id="table-wrapper">
										</div><!-- /.box-body -->
						 				<!-- <div class="overlay">
						 					<i class="fa fa-refresh fa-spin"></i>
						 				</div> -->
						 			</div><!-- /.box -->
						 		</div><!-- /.col -->
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script> 

function getTable(url){

	$('#table-wrapper').load(url)

}
	$(document).ready(function() {

		/*	
	    	Listar los registros 
	    	*/
	    	$('#filtrar-btn').click(function(e){
	    		e.preventDefault();
	    		var data=$(this).closest('form').serialize();
	    		getTable("{{action('ConciliacionController@index')}}?"+data);
	    		console.log(data);
	    	}).trigger('click');


	    	$('#table-wrapper').delegate('.pagination li a', 'click', function(e){
	    		e.preventDefault();

    	    //Hay que quitar el slash antes del ?, no se como no generarlo pero replace resuelve.
    	    
    	    getTable($(this).attr('href').replace("/?", "?"));
    	})

	    /*
			Datepicker
			*/


	        //Datemask dd/mm/yyyy
	        $('.fecha-datepicker-filter').inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});


			$('.fecha-datepicker-filter').datepicker({
				closeText: 'Cerrar',
				prevText: '&#x3C;Ant',
				nextText: 'Sig&#x3E;',
				currentText: 'Hoy',
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
				'Jul','Ago','Sep','Oct','Nov','Dic'],
				dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
				dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
				dayNamesMin: ['D','L','M','M','J','V','S'],
				weekHeader: 'Sm',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: '',
				dateFormat: 'yy-mm-dd'});

			$('#cancel-aterrizaje-btn').click(function(){
				$('#aterrizajeForm-div input').val('');
				$('#aterrizajeForm-div select').val('');
				$('#aterrizajeForm-div #fecha-datepicker').val(today);
				$('#aterrizajeForm-div #hora').val(time);

			})

        /*   
            Eliminar registro
            */
            
            $('body').delegate('.eliminarConciliacion-btn', 'click', function(){
            var tr  =$(this).closest('tr');
            var id  =$(this).data('id');
            var url ="{{action('ConciliacionController@index')}}/"+id;
            console.log(url);
            // confirm dialog
            alertify.confirm("¿Realmente desea  eliminar este registro?", function (e) {
                if (e) {        

                    $.
                    ajax({url: url,
                        method:"DELETE"})
                    .done(function(response, status, responseObject){
                        try{
                            var obj= JSON.parse(responseObject.responseText);
                            if(obj.success==1){
                                $(tr).remove();
                                $('#filtrar-btn').trigger('click');
                                alertify.success(obj.text);
                            }
                        }catch(e){
                            console.log(e);
                            alertify.error('Error procesando la información');
                        }

                    })
                } 
            })
        })
    });
</script>
@endsection


