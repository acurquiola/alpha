@extends('app')
@section('content')

<div class="row">
	<section class="col-lg-12">
		<!-- Content Header (Page header) -->
		<ol class="breadcrumb">
			<li><a href="{{url('principal')}}">Inicio</a></li>
			<li><a id="listado-despegues" href="{{action('DespegueController@index')}}">Lista de Despegues</a></li>
			<li><a id="registro-despegues" class="active">Registro</a></li>
		</ol>
		<section class="content-header">
			<h1>
				<i class="ion ion-android-plane"></i> Registro de Despegues	
			</h1>
		</section>

		<!-- Main content -->
		<section class="content ">

			<div id="despegueForm-div">

				<div class="box box-primary">

					<div class="box-header">
						<h5>
							<i class="fa fa-plane"></i>
							Información del vuelo
						</h5>
					</div>
					<form id="despegue-form">                       
						<div class="box-body">
							<input id="fechaAterrizaje" type="hidden" class="form-control" value="{{$aterrizaje->fecha}}"/>
							<input id="horaAterrizaje" type="hidden" class="form-control" value="{{$aterrizaje->hora}}"/>
							<input type="hidden" name="aterrizaje_id" class="form-control" value="{{$aterrizaje->id}}" />

							<div class="form-inline" style="margin-top: 20px">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="fecha-datepicker" type="text" name="fecha" class="form-control no-vacio" value="{{$today->format('d/m/Y')}}" placeholder="Fecha" />
									</div><!-- /.input group -->
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div> 
										<input type="text"  name="hora"  id="hora" class="form-control no-vacio" value="{{$today->format('H:i:s')}}"  placeholder="Hora"/>
									</div><!-- /.input group -->
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-plane"></i>
										</div>                                        
										<input type="text" class="form-control no-vacio" value="{{$aterrizaje->aeronave->matricula}}" placeholder="Matrícula" />
										<input type="hidden" name="aeronave_id" class="form-control" value="{{$aterrizaje->aeronave_id}}" />
									</div><!-- /.input group -->
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-plane"></i>
										</div>                                        
										<input id="num_vuelo" type="text" name="num_vuelo" class="form-control no-vacio" placeholder="Número de Vuelo" />
									</div><!-- /.input group -->
								</div>
							</div>  
							<div class="form-inline" style="margin-top: 20px">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>	
										<input id="procedencia" type="text" class="form-control no-vacio" value="{{($aterrizaje->puerto)?$aterrizaje->puerto->nombre:'N/A'}}" placeholder="Procedencia" />
									</div><!-- /.input group -->
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div> 								
										<select name="puerto_id" class="form-control puerto">
											<option value="">--Seleccione Destino--</option>
											@foreach ($puertos as $puerto)
											<option  data-nacionalidad="{{$puerto->pais_id}}" value="{{$puerto->id}}"> {{$puerto->nombre}}</option>
											@endforeach
										</select>	
									</div><!-- /.input group -->
								</div>								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-globe"></i>
										</div>
										<select name="nacionalidadVuelo_id" class="form-control nacionalidad">
											<option value="">--Nacionalidad del Vuelo--</option>
											@foreach ($nacionalidad_vuelos as $nacionalidad_vuelo)
											<option value="{{$nacionalidad_vuelo->id}}"> {{$nacionalidad_vuelo->nombre}}</option>
											@endforeach                                        
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->         
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-paper-plane"></i>
										</div>
										<select name="tipoMatricula_id" id="tipoMatricula_id" class="form-control tipo_vuelo no-vacio">
											<option value="">--Seleccione Tipo de Vuelo--</option>
											@foreach ($tipoMatriculas as $tipoMatricula)
												<option value="{{$tipoMatricula->id}}" {{(($aterrizaje->tipoMatricula_id == $tipoMatricula->id)?"selected":"")}}> {{$tipoMatricula->nombre}}</option>
											@endforeach
										</select>									
									</div><!-- /input group -->
								</div>
							</div> 
							<div class="form-inline" style="margin-top: 20px">      
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-diamond"></i>
										</div>                                                                            
										<select name="cliente_id" class="form-control cliente" style="width: 500px">
											<option value="">--Seleccione Cliente--</option>
											@foreach ($clientes as $index=>$cliente)
											<option value="{{$index}}" {{(($aterrizaje->cliente_id == $index)?"selected":"")}} > {{$cliente}}</option>
											@endforeach
										</select>
									</div><!-- /.input group -->
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-plane"></i>
										</div>    
										<select name="piloto_id" id="piloto_id" class="form-control piloto">
											<option value="">--Seleccione Piloto--</option>
											@foreach ($pilotos as $piloto)
											<option value="{{$piloto->id}}"> {{$piloto->nombre}}</option>
											@endforeach
										</select>
									</div><!-- /.input group -->
								</div>
							</div>								
						</div>  
						<!-- Cobros -->
						<div class="box box-info">

							<div class="box-header">
								<h5>
									<i class="fa fa-money"></i>
									Cobros
									<small>Conceptos a facturar</small>
								</h5>
							</div>		
											
							<div class="box-body" >
								<!-- Estacionamiento -->
								<div class="col-sm-3" >
									<label>
										{!! Form::checkbox('cobrar_estacionamiento', '1', true) !!}
										Estacionamiento
									</label>
									<div class="box-body" id="estacionamiento-box">
										<!-- Tiempo de Estacionamiento-->
										<div class="form-group ">
											<label>Tiempo: </label>
											<div class="input-group">
												<input type="text" class="form-control" id="tiempo_estacionamiento" name="tiempo_estacionamiento" readonly />
												<div class="input-group-addon">
													min
													<i class="ion ion-clock"></i>
												</div>
											</div><!-- /.input group -->
										</div><!-- /.form group -->
									</div><!--/. box-body -->
								</div><!--/. col -->

								<!-- Puentes de Abordaje -->
								<div class="col-sm-4" disabled>
									<label>
										{!! Form::checkbox('cobrar_puenteAbordaje', '1', true) !!}
										Puentes de Abordaje
									</label>
									<div class="box-body" id="puenteAbordaje-box">

										<div class="form-inline">
											<!-- Puente Usado -->
											<div class="form-group">
												<label>Número: </label>
												<div class="input-group">
													<div class="input-group-addon">
														#
													</div>
													<input type="number"  class="form-control" name="numero_puenteAbordaje" />
												</div><!-- /.input group -->
											</div><!-- /.form group -->
										</div>
										<div class="form-inline">
											<!-- Tiempo de Uso -->
											<div class="form-group">
												<label>Tiempo: </label>
												<div class="input-group">
													<input type="text" class="form-control" name="tiempo_puenteAbord"  />
													<div class="input-group-addon">
														min
														<i class="ion ion-clock"></i>
													</div>
												</div><!-- /.input group -->
											</div><!-- /.form group -->
										</div>
									</div>
								</div><!-- /.col -->
								<div>
									<label><i class="ion ion-android-plane"> </i> Otros Cargos</label>
									<div class="box-body">
										<label>
											{!! Form::checkbox('cobrar_formulario', '1', true) !!}
											Formulario
										</label></br>
										<label>
											{!! Form::checkbox('cobrar_AterDesp', '1', true) !!}
											Aterrizaje y Despegue
										</label>
										<select name="otros_cargos" id="otros_cargos-select" class="form-control" data-placeholder="Seleccione otros cargos" multiple>
											<option value="">--Seleccione Otros Cargos--</option>
											@foreach ($otrosCargos as $otroCargo)
											<option value="{{$otroCargo->id}}"> {{$otroCargo->nombre_cargo}}</option>
											@endforeach
										</select>
									</div>						
								</div>
							</div> <!-- /. box-body -->
						</div>	
						<div class="box box-warning">
							<div class="box-header">
								<h5>
									<i class="fa fa-plane"></i>
									Transportados
									<small>Cantidad de Pasajeros</small>
								</h5>
							</div>
							<div class="box-body">
								<label><i class="ion ion-android-plane"> </i> Embarcados</label>
								<div class="box-body">
									<!-- Pasajeros adultos -->
									<div class="form-group col-md-3">
										<label>Adultos:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="ion ion-person-stalker"></i>
											</div>
											<input type="number" name="embarqueAdultos"  value="0"  class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Pasajeros Infantes-->
									<div class="form-group col-md-3">
										<label>Infantes:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="ion ion-android-happy"></i>
											</div>
											<input type="number" name="embarqueInfante"  value="0"  class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->


									<!-- Pasajeros tercera edad -->
									<div class="form-group ">
										<label>Tercera Edad:</label>
										<div class="input-group col-md-3">
											<div class="input-group-addon">
												<i class="ion ion-person-stalker"></i>
											</div>
											<input type="number" name="embarqueTercera"  value="0"  class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>
								<label><i class="ion ion-android-plane"> </i> En Tránsito</label>
								<div class="box-body">

									<!-- Pasajeros adultos -->
									<div class="form-group col-md-3">
										<label>Adultos:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="ion ion-person-stalker"></i>
											</div>
											<input type="number" name="transitoAdultos"  value="0"  class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Pasajeros Infantes-->
									<div class="form-group col-md-3">
										<label>Infantes:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="ion ion-android-happy"></i>
											</div>
											<input type="number" name="transitoInfante"  value="0"  class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->


									<!-- Pasajeros tercera edad -->
									<div class="form-group ">
										<label>Tercera Edad:</label>
										<div class="input-group col-md-3">
											<div class="input-group-addon">
												<i class="ion ion-person-stalker"></i>
											</div>
											<input type="number" name="transitoTercera"  value="0"  class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>
								<label><i class="ion ion-android-plane"> </i> Total</label>
								<div class="box-body">

									<!-- Pasajeros adultos -->
									<div class="form-group col-md-3">
										<label>Adultos:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="ion ion-person-stalker"></i>
											</div>
											<input type="number"   value="0" disabled class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Pasajeros Infantes-->
									<div class="form-group col-md-3">
										<label>Infantes:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="ion ion-android-happy"></i>
											</div>
											<input type="number"   value="0" disabled  class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Pasajeros tercera edad -->
									<div class="form-group  col-md-3 ">
										<label>Tercera Edad:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="ion ion-person-stalker"></i>
											</div>
											<input type="number"   value="0" disabled class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<!-- Total de Pasajeros -->
									<div class="form-group ">
										<label>Total:</label>
										<div class="input-group col-md-3">
											<div class="input-group-addon">
												<i class="ion ion-person-stalker"></i>
											</div>
											<input type="number" value="0" disabled class="form-control" />
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>
							</div> <!-- /. box-body -->
						</div>
					</form>
				</div>
				<div class="box-footer" align="right">
					<button class="btn btn-default" type="button" id="cancel-despegue-btn">Cancelar </button>
					<button class="btn btn-primary" type="submit" id="save-despegue-btn"> Registrar </button>
				</div><!-- ./box-footer -->
			</section>
		</section>
	</div><!-- /.row (main row) -->


	@endsection

	@section('script')
	<script>

//Función que comprueba que no existen campos sin llenar al momento de enviar el formulario.
function camposVacios() {
	var flag=true;
	$('#fecha-datepicker, #hora, #aeronave_id, tipoMatricula_id').each(function(index, value){
		if($(value).val()=='')
			flag&=false;
	});
	if(flag==false){
		$('#save-aterrizaje-btn').attr('disabled','disabled');
	}else{
		$('#save-aterrizaje-btn').removeAttr('disabled');
	}
}

//Función que calcula el tiempo 
function calcularDiferenciaMinutos(){

	var fecha             = $('#fechaAterrizaje').val();
	var hora              = $('#horaAterrizaje').val();
	var fecha_hora        = fecha+' '+hora;
	
	var fechaActual       = $('#fecha-datepicker').val();
	var horaActual        = $('#hora').val();
	var fecha_hora_actual = fechaActual+' '+horaActual;

	var a = moment(fecha_hora, "DD/MM/YYYY HH:mm:ss");
	var b = moment(fecha_hora_actual, "DD/MM/YYYY HH:mm:ss");	
	var estacionamiento = (b.diff(a, 'minutes'));
	$('#tiempo_estacionamiento').val(estacionamiento);
}


$(document).ready(function(){


		$('#otros_cargos-select').chosen({width:'40%'});

	/* 
		Condiciones en los campos de los formularios
		*/

		$('#aterrizajeForm-div input').keyup(function()
		{
			camposVacios();
		});

		$('#aterrizajeForm-div select').change(function()
		{
			camposVacios();	
		});

	/*
		Fecha
		*/
		var d= new Date();
		var today=$.datepicker.formatDate('d/m/yy', new Date());
		var h=d.getHours();
		var m=d.getMinutes();
		var s=d.getSeconds();
		if (m<'10'){
			m='0'+m;
		}
		var time=h+':'+m+':'+s;
		

	/*
		Campos Automáticos.

		*/
		$('body').delegate('.puerto', 'change', function() {
			var option       =$(this).find('option:selected');
			var nacionalidad =$(this).closest('form').find('.nacionalidad');

			if ($(option).val() == ''){
				$(nacionalidad).val('').attr('disabled', 'disabled');
			}else{
				var nac_vuelo=$(option).data('nacionalidad');
				if (nac_vuelo == '232'){
					$(nacionalidad).val('1');
				}else{
					$(nacionalidad).val('2');
				}
			}               
		});

		$('#fecha-datepicker').change(calcularDiferenciaMinutos).trigger('change');
		$('#hora').keyup(calcularDiferenciaMinutos);


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

		$('#cancel-despegue-btn').click(function(){
			$('#despegueForm-div input').val('');
			$('#despegueForm-div select').val('');
			$('#despegueForm-div #fecha-datepicker').val(today);
			$('#despegueForm-div #hora').val(time);
		})

	/*
		Registro de despegue

		*/
		
		$('#save-despegue-btn').click(function(){

			var data=$('#despegue-form').serializeArray();


			var overlay="<div class='overlay'>\
							<i class='fa fa-refresh fa-spin'></i>\
						</div>";
		$('.box-body').append(overlay);


		$.ajax(
			{data:data,
				method:'post',
				url:"{{action('DespegueController@store')}}"}
				)
		.always(function(response, status, responseObject){
			$('.box-body .overlay').remove();
			if(status=="error"){
				if(response.status==422){
					alertify.error(processValidation(response.responseJSON));
				}
			}else{

				try{
					var respuesta=JSON.parse(responseObject.responseText);
					if(respuesta.success==1)
					{
						$('#save-despegue-btn').attr('disabled','disabled');
						alertify.success(respuesta.text);
						window.location="{{action('DespegueController@index')}}";
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
});

</script>

@endsection