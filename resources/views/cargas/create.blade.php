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
							<div class="box-body">

								<!-- Fecha  -->
								<div class="form-group col-md-3">
									<label>Fecha:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo date('d/m/Y'); ?>" />
									</div><!-- /.input group -->
								</div><!-- /.form group -->


								<!-- Cliente-->
								<div class="form-group col-md-6">
									<label>Cliente:</label>
									<div class="input-group ">
										<div class="input-group-addon">
											<i class="ion ion-person"></i>
										</div>
										<input type="text" class="form-control col-md-3" />
									</div><!-- /.input group -->
								</div><!-- /.form group -->

								<!-- Nro Vuelo -->
								<div class="form-group">
									<label>Nro. Vuelo:</label>
									<div class="input-group ">
										<div class="input-group-addon">
											#
										</div>
										<input type="text" class="form-control col-md-3" />
									</div><!-- /.input group -->
								</div><!-- /.form group -->

							</br>

							<!-- Peso de Embarque -->
								<div class="form-group col-md-3" >
									<label>Peso Embarcado: </label>
									<div class="input-group">
										<input type="text" class="form-control col-md-5"/>
										<div class="input-group-addon ">
											Kg(s) <i class="ion ion-soup-can-outline"></i>
										</div>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
						

							<!-- Peso de Desembarque -->
							<div class="form-group col-md-7">
								<label>Peso Desembarcado: </label>
								<div class="input-group col-md-5">
									<input type="text" class="form-control "/>
									<div class="input-group-addon ">
										Kg(s) <i class="ion ion-soup-can-outline"></i>
									</div>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
						</br>


						<!-- Observaciones -->
 
						<div class="form-group col-md-12">
							<label>Observaciones </label>
							<div class="input-group col-md-12">
								<textarea type="text" class="form-control"></textarea>
							</div><!-- /.input group -->
						</div><!-- /.form group -->	


						</br>

						<!-- Precio en BsF. -->

						<div class="form-group" align="right" style="margin-top: 60px">
							<label>Total: </label>
							<div class="input-group col-md-3">
								<div class="input-group-addon">
									<i class="fa fa-money"></i> BsF. 
								</div>
								<input type="text" class="form-control" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->		

					</br>

				</div><!-- /.box-body -->
			</div><!-- /.box -->

			<div class="box-footer" align="right">
				
			<button class="btn btn-success" type="submit"> Ver Prelimimar </button>
				<a href="gestionarCarga.php">
					<button class="btn btn-default" type="button"> Cancelar </button>
				</a>
				<input id="form_registrarCarga" type="hidden" value="form_registrarCarga" name="form_registrarCarga">
				<button class="btn btn-primary" type="submit"> Guardar </button>
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

$(document).ready(function(){

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

		$('#cancel-aterrizaje-btn').click(function(){
			$('#aterrizajeForm-div input').val('');
			$('#aterrizajeForm-div select').val('');
			$('#aterrizajeForm-div #fecha-datepicker').val(today);
			$('#aterrizajeForm-div #hora').val(time);

		})

	/*
	
		Registro de Aterrizajes

		*/
		
		$('#save-aterrizaje-btn').click(function(){

			var data=$('#aterrizaje-form').serializeArray();

			var overlay="<div class='overlay'>\
			<i class='fa fa-refresh' fa-spin></i>\
			</div>";
			$('.box-body').append(overlay);


			$.ajax(
				{data:data,
					method:'post',
					url:"{{action('AterrizajeController@store')}}"}
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
							$('#save-aeronave-btn').attr('disabled','disabled');
							$('#aterrizajeForm-div input').val('');
							$('#aterrizajeForm-div select').val('');
							$('#aterrizajeForm-div #fecha-datepicker').val(today);
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



});

</script>

@endsection