@extends('app')
@section('content')
<div class="row">
	<section class="col-lg-12">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php 
				$fecha = date('Y-m-d');
				ini_set('date.timezone','America/Caracas');
				?>
				<i class="fa fa-road"></i> Despegues 
			</h1>
		</section>
		<section class="content">

			<!-- Tabla de Filtroa-->
			<div class="nav-tabs-custom">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title"><span class="ion ion-people-stalker"></span> Filtros de Búsqueda</h3>
					</div><!-- /.box-header -->
					<div class="box-body">

						<form class="form-inline">
							{!! Form::hidden('sortName', null, []) !!}
							{!! Form::hidden('sortType', null, []) !!}
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input id="fecha-datepicker-filter" type="text" name="fecha" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  placeholder="Fecha" />
								</div><!-- /.input group -->
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
									<input type="text"  name="hora" class="form-control timepicker"  placeholder="Hora. Formato: hh:mm:ss"/>
								</div><!-- /.input group -->
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-plane"></i>
									</div>                                        
									<input type="text"  name="aeronave_id" class="form-control"  placeholder="Matrícula"/>
								</div><!-- /.input group -->
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-flag-o"></i>
									</div>
									<input type="text" name="num_vuelo" class="form-control" style="width: 100px" placeholder="Número de Vuelo"/>
								</div><!-- /.input group -->
							</div>
							
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</div>									
									<select name="puerto_id" class="form-control puerto">
										<option value="">--Destino--</option>
										@foreach ($puertos as $puerto)
										<option  data-nacionalidad="{{$puerto->pais_id}}" value="{{$puerto->id}}"> {{$puerto->nombre}}</option>
										@endforeach
									</select>
								</div><!-- /.input group -->
							</div>  

							
							<button type="submit" id="filtrar-btn" class="btn btn-primary pull-right" style="margin-left: 20px"><i class="fa fa-filter"></i></button>
						</form>
					</div><!-- /.box-body -->

				</div><!-- /.box -->
			</div><!-- /.col -->
			
			<!-- Tabla de aeronaves-->
			<div class="nav-tabs-custom">						
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title"><span class="ion ion-people-stalker"></span> Vuelos Completados</h3>
					</div><!-- /.box-header -->
					<div class="box-body" id="table-wrapper">
					</div><!-- /.box-body -->
	 				<!-- <div class="overlay">
	 					<i class="fa fa-refresh fa-spin"></i>
	 				</div> -->
	 			</div><!-- /.box -->
	 		</div><!-- /.col -->
	 	</section>

	 	<!-- Modal de edición -->

	 	<div class="modal fade" id="show-modal" tabindex="-1" role="dialog" aria-labelledby="editarDespegue-modalLabel" aria-hidden="true">
	 		<div class="modal-dialog">
	 			<div class="modal-content">
	 				<div class="modal-header" id="titulo-div-modal">
	 					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 					<h4 class="modal-title" id="titulo-modal">Editar Despegue</h4>
	 				</div>
	 				<div class="modal-body">
	 				</div>
	 				<div class="modal-footer">
	 					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	 					<button id="save-despegue-btn-modal" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
	 				</div>
	 			</div>
	 		</div> <!-- /.Modal-dialog-->
	 	</div> <!-- /.Modal- fade-->
	</section>
</div><!-- /.row (main row) -->

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
	    		getTable("{{action('DespegueController@index')}}?"+data);
	    		console.log(data);
	    	}).trigger('click');


	    	$('#table-wrapper').delegate('.pagination li a', 'click', function(e){
	    		e.preventDefault();

    	    //Hay que quitar el slash antes del ?, no se como no generarlo pero replace resuelve.
    	    
    	    getTable($(this).attr('href').replace("/?", "?"));
    	})


	    	/*
		Campos Automáticos.

		*/

		$('body').delegate('.aeronave', 'change', function() {
			var option       =$(this).find('option:selected');
			var modelo       =$(this).closest('form').find('.modeloAeronave');
			var modeloHidden =$(this).closest('form').find('.modeloAeronaveHidden');
			var cliente      =$(this).closest('form').find('.cliente');
			var tipo_vuelo   =$(this).closest('form').find('.tipo_vuelo');
			if ($(option).val() == ''){
				$(modelo).val('').attr('disabled', 'disabled');
				$(tipo_vuelo).val('').attr('disabled', 'disabled');
				$(cliente).val('').attr('disabled', 'disabled');
			}else{
				var modelo_aeronave =$(option).data('nombremodelo');
				var modelo_id       =$(option).data('modelo');      
				$(modeloHidden).val(modelo_id);
				$(modelo).val(modelo_aeronave);

				var tipo=$(option).data('tipo');        
				$(tipo_vuelo).val(tipo).removeAttr('disabled');

				var cliente_id=$(option).data('cliente');        
				$(cliente).val(cliente_id).removeAttr('disabled');
			}               
		});

		$('body').delegate('.piloto', 'change', function() {
			var option =$(this).find('option:selected');
			var cedula =$(this).closest('form').find('.piloto_ci');
			if ($(option).val() == ''){
				$(cedula).val('').attr('disabled', 'disabled');
			}else{
				var cedula_piloto=$(option).data('ci');
				$(cedula).val(cedula_piloto).removeAttr('disabled');
			}               
		});

		$('body').delegate('.puerto', 'change', function() {
			var option    =$(this).find('option:selected');
			var nacionalidad =$(this).closest('form').find('.nacionalidad');

			if ($(option).val() == ''){
				$(nacionalidad).val('').attr('disabled', 'disabled');
			}else{
				var nac_vuelo=$(option).data('nacionalidad');
				if ($(nac_vuelo) == '232'){
					$(nacionalidad).val('1');
				}else{
					$(nacionalidad).val('2');
				}
			}               
		});


	    /*
			Datepicker
			*/

			$('#fecha-datepicker-filter').datepicker({
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
            Modificar un registro

            */      
            
            //Mostrar la información en un modal para editar

            $('body').delegate('.editarAterrizaje-btn', 'click', function(){
                var fila = $(this).closest('tr');
                var id   = $(fila).data('id');
                var url  ='{{action('AterrizajeController@edit', ["::"])}}';
                url      =url.replace("::", id)

                $.ajax({
                    method: 'get',
                    url: url})
                .always(function(text, status, responseObject){
                    $('#show-modal .modal-body').html(text);
                    $('#show-modal').modal('show');
                })
            })

            //Editar la información
            
            $('#save-aterrizaje-btn-modal').click(function(){

                var data =$('#show-modal form').serializeArray()
                var url  =$('#show-modal form').attr('action')
                console.log(data);
                $.ajax({data:data,
                    method:'PUT',
                    url:url})
                .always(function(text, status, responseObject){
                    try
                    {
                        var respuesta = JSON.parse(responseObject.responseText);
                        if (respuesta.success==1)
                        {
                            console.log(respuesta);
                            alertify.success(respuesta.text);
                            $('#filtrar-btn').trigger('click');
                        }
                        else
                        {
                            alertify.error(respuesta.text);
                        }
                    }
                    catch(e)
                    {
                        alertify.error('Error procesando la información');
                    }
                })
            })

        /*   
            Eliminar registro
            */
            
            $('body').delegate('.eliminarAterrizaje-btn', 'click', function(){
            var tr  =$(this).closest('tr');
            console.log(tr)
            var id  =$(this).data('id');
            var url ="{{action('AterrizajeController@index')}}/"+id;
            
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
