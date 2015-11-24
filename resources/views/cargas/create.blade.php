@extends('app')
@section('content')

<div class="row">
	<section class="col-lg-11">
		<!-- Content Header (Page header) -->

		<ol class="breadcrumb">
			<li><a href="{{url('principal')}}">Inicio</a></li>
			<li><a id="listado-cargas" href="{{action('CargaController@index')}}">Lista de Cargas</a></li>
			<li><a id="registro-cargas" class="active">Registro</a></li>
		</ol>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php $fecha = date('d/m/Y'); ?>
				<i class="fa fa-truck"></i> Registro de Cargas
			</h1>
		</section>

		<!-- Main content -->
		<section class="content ">

			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-md-12">
					<div class="box box-primary">
						<div class="box-body" id="cargaForm-div">
							<form id="carga-form">
								<legend>Información del Vuelo</legend>
	
								<div class="form-inline col-md-12" style="margin-bottom: 20px">
									<!-- Fecha  -->
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input id="fecha-datepicker" type="text" name="fecha" class="form-control no-vacio" value="{{$today->format('d/m/Y')}}" placeholder="Fecha" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>

								<div class="form-inline col-md-12">
									<!-- Cliente-->
									<div class="form-group">
										<div class="input-group ">
											<div class="input-group-addon">
												<i class="ion ion-person"></i>
											</div>
											<select name="cliente_id" id="cliente_id-select" class="form-control cliente no-vacio" style="width: 500px">
												<option value="">--Cliente--</option>
												@foreach ($clientes as $index=>$cliente)
												<option value="{{$index}}"> {{$cliente}}</option>
												@endforeach
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Aeronave-->
									<div class="form-group" style="margin-left: 30px">
										<div class="input-group ">
											<div class="input-group-addon">
												<i class="ion ion-plane"></i>
											</div>
											<select name="aeronave_id" id="aeronave_id-select" class="form-control aeronave no-vacio">
												<option value="">--Seleccione Matrícula--</option>
												@foreach ($aeronaves as $aeronave)
												<option data-modelo="{{$aeronave->modelo_id}}" data-nombremodelo="{{$aeronave->modelo->modelo}}" data-cliente="{{$aeronave->cliente_id}}" data-tipo="{{$aeronave->tipo_id}}" data-tipoV="{{$aeronave->tipo->nombre}}" value="{{$aeronave->id}}"> {{$aeronave->matricula}}</option>
												@endforeach
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>

								<div class="form-inline col-md-12" style="margin-top: 20px">

									<!-- Nro Vuelo -->
									<div class="form-group" style="margin-right: 10px">
										<div class="input-group">
											<div class="input-group-addon">
												#
											</div>
											<input type="text" name="num_vuelo" placeholder="Número de Vuelo" class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Peso de Embarque -->
									<div class="form-group" style="margin-right: 10px">
										<div class="input-group">
											<div class="input-group-addon">
												Kg(s) <i class="ion ion-soup-can-outline"></i>
											</div>
											<input type="text" name="peso_embarcado" placeholder="Peso Embarcado" class="form-control"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Peso de Desembarque -->
									<div class="form-group">
										<div class="input-group">
											<input type="text"  name="peso_desembarcado" placeholder="Peso Desembarcado" class="form-control"/>
											<div class="input-group-addon ">
												Kg(s) <i class="ion ion-soup-can-outline"></i>
											</div>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>

								<!-- Observaciones --> 
								<div class="form-group col-md-12" style="margin-top: 20px">
									<label>Observaciones </label>
									<div class="input-group col-md-12">
										<textarea type="text" name="observaciones" class="form-control"></textarea>
									</div><!-- /.input group -->
								</div><!-- /.form group -->	

								<!-- Precio en BsF. -->
								<div class="form-group" align="right" style="margin-top: 60px">
									<label>Total: </label>
									<div class="input-group col-md-3">
										<div class="input-group-addon">
											<i class="fa fa-money"></i> BsF. 
										</div>
										<input type="text" name="monto_total" class="form-control no-vacio" />
									</div><!-- /.input group -->
								</div><!-- /.form group -->		

							</form>
						</div><!-- /.box-body -->
					</div><!-- /.box -->

					<div class="box-footer" align="right">
						<button class="btn btn-default" type="button" id="cancel-carga-btn">Cancelar </button>
						<button class="btn btn-primary" type="submit" id="save-carga-btn"> Registrar </button>
					</div><!-- ./box-footer -->


				</section>
			</div><!-- /.row (main row) -->
		</section>
	</section>
</div><!-- /.row (main row) -->
@endsection

@section('script')
<script>


	$(document).ready(function(){

		/*
			Select Chosen
		 	*/
			$('#cliente_id-select').chosen({width:'400px'});
			$('#aeronave_id-select').chosen({width:'300px'});

		/*
			Datepicker
			*/

		$('#fecha-datepicker').datepicker({
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

		 /*
	    	Fecha
	    	*/
	    	var d= new Date();
	    	var today=$.datepicker.formatDate('d/m/yy', new Date());


		/*
			Boton Cancelar
		 	*/
			$('#cancel-carga-btn').click(function(){
				$('#cargaForm-div input').val('');
				$('#cargaForm-div select').val('');
				$('#cargaForm-div #fecha-datepicker').val(today);
				console.log(today);

			})


		/* 
			Cálculo de Monto Total
			*/
			$( "body #tab_5 input" ).keyup(function( event ) {	

			var ut        =$('body #tab_0 .unidad_tributaria').val();
			var eq_form   =$('body #tab_5 .eq_formulario').val();
			var eq_DerHab =$('body #tab_5 .eq_derechoHabilitacion').val();
			var eq_AborSH =$('body #tab_5 .eq_usoAbordajeSinHab').val();
			var eq_AborCH =$('body #tab_5 .eq_usoAbordajeConHab').val();

			var val_form= eq_form*ut;
			$('body #tab_5 #precioFormulario-input').val(val_form.toFixed(2));
			var val_DerHab= eq_DerHab*ut;
			$('body #tab_5 #precioDerechoHabilitacion-input').val(val_DerHab);
			var val_AborSH= eq_AborSH*ut;
			$('body #tab_5 #preciousoAbordajeSinHab-input').val(val_AborSH);
			var val_AborCH= eq_AborCH*ut;
			$('body #tab_5 #preciousoAbordajeConHab-input').val(val_AborCH);
		});


		/*  
            Guardar un nuevo registro
            */
            $('#save-carga-btn').click(function(){

                var data=$('#carga-form').serializeArray();
                console.log(data);
                
                var overlay=    "<div class='overlay'>\
                <i class='fa fa-refresh fa-spin></i>\
                </div>";
                $('#cargaForm-div').append(overlay);

                $.ajax(
                    {data:data,
                        method:'post',
                        url:"{{action('CargaController@store')}}"}
                        )
                .always(function(response, status, responseObject){
                   $('#cargaForm-div .overlay').remove();
                    if(status=="error"){
                        if(response.status==422){
                            alertify.error(processValidation(response.responseJSON));
                        }
                    }else{

                        try{
                            var respuesta=JSON.parse(responseObject.responseText);
                            if(respuesta.success==1)
                            {
                                $('#cargaForm-div .no-vacio').val('');
                                $('#save-carga-btn').attr('disabled','disabled');
                                alertify.success(respuesta.text);
                            }
                            else
                            {
                                alertify.error(respuesta.text);
                            }
                        }
                        catch(e)
                        {
                            alertify.error("Error procensando la información");
                        }
                    }
                })
            })


	})
</script>
@endsection