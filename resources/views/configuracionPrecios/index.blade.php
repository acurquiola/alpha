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
					<a href="#General-tab" data-toggle="tab">General</a>
				</li>
				<li>
					<a href="#aviacionComercialNacional-tab" data-toggle="tab">Aterrizaje y Estacionamiento</a>
				</li>
				<li>
					<a href="#Carga-tab" data-toggle="tab">Carga</a>
				</li>
				<li>
					<a href="#Horarios-tab" data-toggle="tab">Horarios</a>
				</li>
				<li>
					<a href="#otrosCargos-tab" data-toggle="tab">Otros Cargos</a>
				</li>
 				<li>
					<a href="#cargosVarios-tab" data-toggle="tab">Cargos Varios</a>
				</li>
			</ul>
			<div class="tab-content">

				<!-- Configuración General del Sistema -->
				<div class="tab-pane active" id="General-tab">
					
					@include('configuracionPrecios.confGeneral.partials.edit')

				</div><!-- /.tab-pane -->

				<div class="tab-pane" id="aviacionComercialNacional-tab">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#estacionamientoComercialNacional-tab" data-toggle="tab">Estacionamiento</a>
							</li>
							<li>
								<a href="#aterrizajeComercialNacional-tab" data-toggle="tab">Aterrizaje y Despegue</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active estacionamientoAeronave-tab" id="estacionamientoComercialNacional-tab">
								@include('configuracionPrecios.confEstacionamientoAeronave.Comercial.matriculaNacional.partials.edit')
							</div>
							<div class="tab-pane precioAterrizajeDespegue-tab" id="aterrizajeComercialNacional-tab">
								@include('configuracionPrecios.confAterrizajeDespegue.Comercial.matriculaNacional.partials.edit')
							</div>
						</div>
					</div>
				</div>

				<!-- Otros Cargos-->
				<div class="tab-pane" id="Horarios-tab">

					@include('configuracionPrecios.confHorarioAeronautico.partials.edit')


				</div><!-- /.tab-pane -->

				<!-- Otros Cargos -->
				<div class="tab-pane" id="otrosCargos-tab">

	 				@include('configuracionPrecios.confOtrosCargos.index') 

				</div><!-- /.tab-pane -->



				<!-- Otras Configuraciones -->
				<div class="tab-pane" id="cargosVarios-tab">

	 				@include('configuracionPrecios.confCargosVarios.partials.edit') 

				</div><!-- /.tab-pane -->

				<!-- Otras Configuraciones -->
				<div class="tab-pane" id="Carga-tab">

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

	//Cálculos para Matrículas Nacionales
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_dN =$('body #aterrizajeGeneralNacional-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeGeneralNacional-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeGeneralNacional-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeGeneralNacional-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeGeneralNacional-tab #precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeGeneralNacional-tab #precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeGeneralNacional-tab #precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeGeneralNacional-tab #precio_nocturInt').val(val_nI.toFixed(2));
	});

	$( "body #aterrizajeGeneralNacional-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_dN =$('body #aterrizajeGeneralNacional-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeGeneralNacional-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeGeneralNacional-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeGeneralNacional-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeGeneralNacional-tab .precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeGeneralNacional-tab .precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeGeneralNacional-tab .precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeGeneralNacional-tab .precio_nocturInt').val(val_nI.toFixed(2));
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_bI =$('body #estacionamientoGeneralNacional-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoGeneralNacional-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoGeneralNacional-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoGeneralNacional-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});

	$( "body #estacionamientoGeneralNacional-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_bI =$('body #estacionamientoGeneralNacional-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoGeneralNacional-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoGeneralNacional-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoGeneralNacional-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});
	
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_dN =$('body #aterrizajeComercialNacional-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeComercialNacional-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeComercialNacional-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeComercialNacional-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeComercialNacional-tab #precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeComercialNacional-tab #precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeComercialNacional-tab #precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeComercialNacional-tab #precio_nocturInt').val(val_nI.toFixed(2));
	});

	$( "body #aterrizajeComercialNacional-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_dN =$('body #aterrizajeComercialNacional-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeComercialNacional-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeComercialNacional-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeComercialNacional-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeComercialNacional-tab .precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeComercialNacional-tab .precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeComercialNacional-tab .precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeComercialNacional-tab .precio_nocturInt').val(val_nI.toFixed(2));
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_bI =$('body #estacionamientoComercialNacional-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoComercialNacional-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoComercialNacional-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoComercialNacional-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});

	$( "body #estacionamientoComercialNacional-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .unidad_tributaria').val();
		var eq_bI =$('body #estacionamientoComercialNacional-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoComercialNacional-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoComercialNacional-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoComercialNacional-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});

	
	//Cálculos para matrículas extrajeras
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_dN =$('body #aterrizajeGeneralExtranjera-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeGeneralExtranjera-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeGeneralExtranjera-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeGeneralExtranjera-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeGeneralExtranjera-tab #precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeGeneralExtranjera-tab #precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeGeneralExtranjera-tab #precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeGeneralExtranjera-tab #precio_nocturInt').val(val_nI.toFixed(2));
	});

	$( "body #aterrizajeGeneralExtranjera-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_dN =$('body #aterrizajeGeneralExtranjera-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeGeneralExtranjera-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeGeneralExtranjera-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeGeneralExtranjera-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeGeneralExtranjera-tab .precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeGeneralExtranjera-tab .precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeGeneralExtranjera-tab .precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeGeneralExtranjera-tab .precio_nocturInt').val(val_nI.toFixed(2));
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_bI =$('body #estacionamientoGeneralExtranjera-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoGeneralExtranjera-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoGeneralExtranjera-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoGeneralExtranjera-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});

	$( "body #estacionamientoGeneralExtranjera-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_bI =$('body #estacionamientoGeneralExtranjera-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoGeneralExtranjera-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoGeneralExtranjera-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoGeneralExtranjera-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_dN =$('body #aterrizajeComercialExtranjera-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeComercialExtranjera-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeComercialExtranjera-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeComercialExtranjera-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeComercialExtranjera-tab #precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeComercialExtranjera-tab #precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeComercialExtranjera-tab #precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeComercialExtranjera-tab #precio_nocturInt').val(val_nI.toFixed(2));
	});

	$( "body #aterrizajeComercialExtranjera-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_dN =$('body #aterrizajeComercialExtranjera-tab .eq_diurnoNac').val();
		var eq_dI =$('body #aterrizajeComercialExtranjera-tab .eq_diurnoInt').val();
		var eq_nN =$('body #aterrizajeComercialExtranjera-tab .eq_nocturNac').val();
		var eq_nI =$('body #aterrizajeComercialExtranjera-tab .eq_nocturInt').val();

		var val_dN= eq_dN*ut;
		$('body #aterrizajeComercialExtranjera-tab .precio_diurnoNac').val(val_dN.toFixed(2));
		var val_dI= eq_dI*ut;
		$('body #aterrizajeComercialExtranjera-tab .precio_diurnoInt').val(val_dI.toFixed(2));
		var val_nN= eq_nN*ut;
		$('body #aterrizajeComercialExtranjera-tab .precio_nocturNac').val(val_nN.toFixed(2));
		var val_nI= eq_nI*ut;
		$('body #aterrizajeComercialExtranjera-tab .precio_nocturInt').val(val_nI.toFixed(2));
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_bI =$('body #estacionamientoComercialExtranjera-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoComercialExtranjera-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoComercialExtranjera-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoComercialExtranjera-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});

	$( "body #estacionamientoComercialExtranjera-tab input" ).keyup(function( event ) {	
		var ut    =$('body #General-tab .dolar_oficial').val();
		var eq_bI =$('body #estacionamientoComercialExtranjera-tab .eq_bloqueInt').val();
		var eq_bN =$('body #estacionamientoComercialExtranjera-tab .eq_bloqueNac').val();

		var val_precioInt= eq_bI*ut;
		$('body #estacionamientoComercialExtranjera-tab .precio_estInt').val(val_precioInt.toFixed(2));
		var val_precioNac= eq_bN*ut;
		$('body #estacionamientoComercialExtranjera-tab .precio_estNac').val(val_precioNac.toFixed(2));
	});


	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut        =$('body #General-tab .unidad_tributaria').val();
		var eq_form   =$('body #cargosVarios-tab .eq_formulario').val();
		var eq_DerHab =$('body #cargosVarios-tab .eq_derechoHabilitacion').val();
		var eq_AborSH =$('body #cargosVarios-tab .eq_usoAbordajeSinHab').val();
		var eq_AborCH =$('body #cargosVarios-tab .eq_usoAbordajeConHab').val();

		var val_form= Math.ceil(eq_form*ut);
		$('body #cargosVarios-tab #precio_formulario-input').val(val_form.toFixed(2));
		var val_DerHab= eq_DerHab*ut;
		$('body #cargosVarios-tab #precio_derechoHabilitacion-input').val(val_DerHab)
		var val_AborSH= eq_AborSH*ut;
		$('body #cargosVarios-tab #precio_usoAbordajeSinHab-input').val(val_AborSH);
		var val_AborCH= eq_AborCH*ut;
		$('body #cargosVarios-tab #precio_usoAbordajeConHab-input').val(val_AborCH);
	});

	$( "body #cargosVarios-tab input" ).keyup(function( event ) {	

		var ut        =$('body #General-tab .unidad_tributaria').val();
		var eq_form   =$('body #cargosVarios-tab .eq_formulario').val();
		var eq_DerHab =$('body #cargosVarios-tab .eq_derechoHabilitacion').val();
		var eq_AborSH =$('body #cargosVarios-tab .eq_usoAbordajeSinHab').val();
		var eq_AborCH =$('body #cargosVarios-tab .eq_usoAbordajeConHab').val();

		var val_form= eq_form*ut;
		$('body #cargosVarios-tab #precio_usoAbordajeConHab-input').val(val_form.toFixed(2));
		var val_DerHab= eq_DerHab*ut;
		$('body #cargosVarios-tab #precio_usoAbordajeConHab-input').val(val_DerHab);
		var val_AborSH= eq_AborSH*ut;
		$('body #cargosVarios-tab #precio_usoAbordajeConHab-input').val(val_AborSH);
		var val_AborCH= eq_AborCH*ut;
		$('body #cargosVarios-tab #precio_usoAbordajeConHab-input').val(val_AborCH);
	});


	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {			
		var ut        =$('body #General-tab .unidad_tributaria').val();
		var eq_UT     =$('body #Carga-tab .equivalenteUT').val();
		
		var val_carga = eq_UT*ut;
		$('body #Carga-tab #precio_carga-input').val(val_carga.toFixed(2));
	});

	$( "body #Carga-tab input" ).keyup(function( event ) {	
		var ut        =$('body #General-tab .unidad_tributaria').val();
		var eq_UT     =$('body #Carga-tab .equivalenteUT').val();
		
		var val_carga = eq_UT*ut;
		$('body #Carga-tab #precio_carga-input').val(val_carga.toFixed(2));
	});


		/*
	
		Modificar Montos Fijos
		*/
		$('#confGeneral-save-btn').click(function(){
			var data               ={};
			data.unidad_tributaria =$('#General-tab form .unidad_tributaria').val()
			data.dolar_oficial     =$('#General-tab form .dolar_oficial').val()
			var url                =$('#General-tab form').attr('action')

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
	
		Modificar Montos de Aterrizaje y despegue
		*/
		$('.precioAterrizajeDespegue-save-btn').click(function(){

			var data =$('.precioAterrizajeDespegue-tab form').serializeArray()
			var url  =$('.precioAterrizajeDespegue-tab form').attr('action')

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
		$('.estacionamientoAeronave-save-btn').click(function(){

			var data =$('.estacionamientoAeronave-tab form').serializeArray()
			var url  =$('.estacionamientoAeronave-tab form').attr('action')

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
	
	/*
	
		Modificar Horarios
		*/
		$('#horarioAeronautico-save-btn').click(function(){

			var data =$('#Horarios-tab form').serializeArray()
			var url  =$('#Horarios-tab form').attr('action')

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
			
			var data =$('#cargosVarios-tab form').serializeArray()
			var url  =$('#cargosVarios-tab form').attr('action')

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
			
			var data =$('#Carga-tab form').serializeArray()
			var url  =$('#Carga-tab form').attr('action')

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
