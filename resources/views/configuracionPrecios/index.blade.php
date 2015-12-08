@extends('app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<i class="ion-settings"></i>
		Configuración del Sistema
	</h1>
</section>

<!-- Main content -->
<section class="invoice">

	<!-- info row -->
	<div class="row invoice-info">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab_0" data-toggle="tab">General</a>
				</li>
				<li>
					<a href="#tab_1" data-toggle="tab">Aterrizaje y Despegue</a>
				</li>
				<li>
					<a href="#tab_2" data-toggle="tab">Estacionamiento</a>
				</li>
				<li>
					<a href="#tab_6" data-toggle="tab">Carga</a>
				</li>
				<li>
					<a href="#tab_3" data-toggle="tab">Horarios</a>
				</li>
				<li>
					<a href="#tab_4" data-toggle="tab">Otros Cargos</a>
				</li>
 				<li>
					<a href="#tab_5" data-toggle="tab">Cargos Varios</a>
				</li>
			</ul>
			<div class="tab-content">

				<!-- Configuración General del Sistema -->
				<div class="tab-pane active" id="tab_0">
					
					@include('configuracionPrecios.confGeneral.partials.edit')

				</div><!-- /.tab-pane -->

				<!-- Configuración de Ateriizaje y Despegues -->
				<div class="tab-pane" id="tab_1">

					@include('configuracionPrecios.confAterrizajeDespegue.partials.edit')


				</div><!-- /.tab-pane -->

				<!-- Configuración de Estacionamiento -->
				<div class="tab-pane" id="tab_2">

					@include('configuracionPrecios.confEstacionamientoAeronave.partials.edit')


				</div><!-- /.tab-pane -->

				<!-- Otros Cargos-->
				<div class="tab-pane" id="tab_3">

					@include('configuracionPrecios.confHorarioAeronautico.partials.edit')


				</div><!-- /.tab-pane -->

				<!-- Otros Cargos -->
				<div class="tab-pane" id="tab_4">

	 				@include('configuracionPrecios.confOtrosCargos.index') 

				</div><!-- /.tab-pane -->



				<!-- Otras Configuraciones -->
				<div class="tab-pane" id="tab_5">

	 				@include('configuracionPrecios.confCargosVarios.partials.edit') 

				</div><!-- /.tab-pane -->

				<!-- Otras Configuraciones -->
				<div class="tab-pane" id="tab_6">

					@include('configuracionPrecios.confCarga.partials.edit')

				</div><!-- /.tab-pane -->

			</div><!-- /.tab-content -->
		</div><!-- nav-tabs-custom -->
	</section><!-- /.content -->
	<div class="clearfix"></div>
</div><!-- /.row (main row) -->

@endsection

@section('script')
<script> 


$(document).ready(function(){


	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #tab_0 .unidad_tributaria').val();
		var eq_dN =$('body #tab_1 .eq_diurnoNac').val();
		var eq_dI =$('body #tab_1 .eq_diurnoInt').val();
		var eq_nN =$('body #tab_1 .eq_nocturNac').val();
		var eq_nI =$('body #tab_1 .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #tab_1 #eq_diurnoNac-input').val(val_dN);
		var val_dI= eq_dI*ut;
		$('body #tab_1 #eq_diurnoInt-input').val(val_dI);
		var val_nN= eq_nN*ut;
		$('body #tab_1 #eq_nocturNac-input').val(val_nN);
		var val_nI= eq_nI*ut;
		$('body #tab_1 #eq_nocturInt-input').val(val_nI);

	});

	$( "body #tab_1 input" ).keyup(function( event ) {
		var ut    =$('body #tab_0 .unidad_tributaria').val();
		var eq_dN =$('body #tab_1 .eq_diurnoNac').val();
		var eq_dI =$('body #tab_1 .eq_diurnoInt').val();
		var eq_nN =$('body #tab_1 .eq_nocturNac').val();
		var eq_nI =$('body #tab_1 .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #tab_1 #eq_diurnoNac-input').val(val_dN);
		var val_dI= eq_dI*ut;
		$('body #tab_1 #eq_diurnoInt-input').val(val_dI);
		var val_nN= eq_nN*ut;
		$('body #tab_1 #eq_nocturNac-input').val(val_nN);
		var val_nI= eq_nI*ut;
		$('body #tab_1 #eq_nocturInt-input').val(val_nI);
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #tab_0 .unidad_tributaria').val();
		var eq_bI =$('body #tab_2 .eq_bloqueInt').val();
		var eq_bN =$('body #tab_2 .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #tab_2 #precioBloqueInt-input').val(val_precioInt.toFixed(4));
		var val_precioNac= eq_bN*ut;
		$('body #tab_2 #precioBloqueNac-input').val(val_precioNac.toFixed(4));
	});

	$( "body #tab_2 input" ).keyup(function( event ) {	
		var ut    =$('body #tab_0 .unidad_tributaria').val();
		var eq_bI =$('body #tab_2 .eq_bloqueInt').val();
		var eq_bN =$('body #tab_2 .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #tab_2 #precioBloqueInt-input').val(val_precioInt.toFixed(4));
		var val_precioNac= eq_bN*ut;
		$('body #tab_2 #precioBloqueNac-input').val(val_precioNac.toFixed(4));
	});


	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut        =$('body #tab_0 .unidad_tributaria').val();
		var eq_form   =$('body #tab_5 .eq_formulario').val();
		var eq_DerHab =$('body #tab_5 .eq_derechoHabilitacion').val();
		var eq_AborSH =$('body #tab_5 .eq_usoAbordajeSinHab').val();
		var eq_AborCH =$('body #tab_5 .eq_usoAbordajeConHab').val();

		var val_form= eq_form*ut;
		$('body #tab_5 #precioFormulario-input').val(val_form.toFixed(2));
		var val_DerHab= eq_DerHab*ut;
		$('body #tab_5 #precioDerechoHabilitacion-input').val(val_DerHab)
		var val_AborSH= eq_AborSH*ut;
		$('body #tab_5 #preciousoAbordajeSinHab-input').val(val_AborSH);
		var val_AborCH= eq_AborCH*ut;
		$('body #tab_5 #preciousoAbordajeConHab-input').val(val_AborCH);
	});

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



	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut        =$('body #tab_0 .unidad_tributaria').val();
		var eq_UT     =$('body #tab_6 .equivalenteUT').val();
		
		var val_carga = eq_UT*ut;
		$('body #tab_6 #equivalenteUT-input').val(val_carga.toFixed(2));
	});

	$( "body #tab_6 input" ).keyup(function( event ) {	
		var ut        =$('body #tab_0 .unidad_tributaria').val();
		var eq_UT     =$('body #tab_6 .equivalenteUT').val();
		
		var val_carga = eq_UT*ut;
		$('body #tab_6 #equivalenteUT-input').val(val_carga.toFixed(2));
	});


		/*
	
		Modificar Montos Fijos
		*/
		$('#confGeneral-save-btn').click(function(){
			var data               ={};
			data.unidad_tributaria =$('#tab_0 form .unidad_tributaria').val()
			data.dolar_oficial     =$('#tab_0 form .dolar_oficial').val()
			var url                =$('#tab_0 form').attr('action')

			var overlay=    "<div class='overlay'>\
	            <i class='fa fa-refresh fa-spin'></i>\
	            </div>";
	            $('body .confGeneralBox').append(overlay);

			$.ajax({data:data,
				method:'PUT',
				url:url})
			.always(function(text, status, responseObject){
                $('body .confGeneralBox .overlay').remove();
				try
				{
					var respuesta = JSON.parse(responseObject.responseText);
					if (respuesta.success==1)
					{
						console.log(respuesta);
						alertify.success(respuesta.text);
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
	
		Modificar Montos Fijos
		*/
		$('#precioAterrizajeDespegue-save-btn').click(function(){

			var data =$('#tab_1 form').serializeArray()
			var url  =$('#tab_1 form').attr('action')

			var overlay=    "<div class='overlay'>\
	            <i class='fa fa-refresh fa-spin'></i>\
	            </div>";
	            $('body .aterrizajeBox').append(overlay);

			$.ajax({data:data,
				method:'PUT',
				url:url})
			.always(function(text, status, responseObject){
                $('body .aterrizajeBox .overlay').remove();
				try
				{
					var respuesta = JSON.parse(responseObject.responseText);
					if (respuesta.success==1)
					{
						alertify.success(respuesta.text);
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
	
		Modificar Montos de Estacionamiento
		*/
		$('#estacionamientoAeronave-save-btn').click(function(){

			var data =$('#tab_2 form').serializeArray()
			var url  =$('#tab_2 form').attr('action')

			var overlay=    "<div class='overlay'>\
	            <i class='fa fa-refresh fa-spin'></i>\
	            </div>";
	            $('body .estacionamientoBox').append(overlay);

			$.ajax({data:data,
				method:'PUT',
				url:url})
			.always(function(text, status, responseObject){
                $('body .estacionamientoBox .overlay').remove();
				try
				{
					var respuesta = JSON.parse(responseObject.responseText);
					if (respuesta.success==1)
					{
						console.log(respuesta);
						alertify.success(respuesta.text);
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
	
		Modificar Horarios
		*/
		$('#horarioAeronautico-save-btn').click(function(){

			var data =$('#tab_3 form').serializeArray()
			var url  =$('#tab_3 form').attr('action')

			var overlay=    "<div class='overlay'>\
	            <i class='fa fa-refresh fa-spin'></i>\
	            </div>";
	            $('body .horariosBox').append(overlay);


			$.ajax({data:data,
				method:'PUT',
				url:url})
			.always(function(text, status, responseObject){
                $('body .horariosBox .overlay').remove();
				try
				{
					var respuesta = JSON.parse(responseObject.responseText);
					if (respuesta.success==1)
					{
						alertify.success(respuesta.text);
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
	
		Modificar Cargos Varios
		*/
		$('#cargosVarios-save-btn').click(function(){
			
			var data =$('#tab_5 form').serializeArray()
			var url  =$('#tab_5 form').attr('action')

			var overlay=    "<div class='overlay'>\
	            <i class='fa fa-refresh fa-spin'></i>\
	            </div>";
	            $('body .cargosVariosBox').append(overlay);

			$.ajax({data:data,
				method:'PUT',
				url:url})
			.always(function(text, status, responseObject){
                $('body .cargosVariosBox .overlay').remove();
				try
				{
					var respuesta = JSON.parse(responseObject.responseText);
					if (respuesta.success==1)
					{
						console.log(respuesta);
						alertify.success(respuesta.text);
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
	
		Modificar Cargos Varios
		*/
		$('#precioCarga-save-btn').click(function(){
			
			var data =$('#tab_6 form').serializeArray()
			var url  =$('#tab_6 form').attr('action')

			var overlay=    "<div class='overlay'>\
	            <i class='fa fa-refresh fa-spin'></i>\
	            </div>";
	            $('body .cargaBox').append(overlay);

			$.ajax({data:data,
				method:'PUT',
				url:url})
			.always(function(text, status, responseObject){
                $('body .cargaBox .overlay').remove();
                try
				{
					var respuesta = JSON.parse(responseObject.responseText);
					if (respuesta.success==1)
					{
						console.log(respuesta);
						alertify.success(respuesta.text);
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
	})

</script>
@endsection
