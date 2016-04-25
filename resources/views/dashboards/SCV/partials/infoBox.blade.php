<!-- Info boxes -->
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="fa fa-check-square-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">COMERCIALES</span>
				<div class="col-sm-6 ">
					<span class="info-box-number"><i class="fa fa-plane" style="transform: rotate(90deg);"></i> {{($aterrizajesComerciales)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($desembarqueComercial)}}</span>
				</div>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane"></i> {{($despeguesComerciales)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($embarqueComercial)}}</span>
				</div>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-exclamation-triangle"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">PRIVADOS</span>
				<div class="col-sm-6 ">
					<span class="info-box-number"><i class="fa fa-plane" style="transform: rotate(90deg);"></i> {{($aterrizajesPrivados)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($desembarquePrivado)}}</span>
				</div>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane"></i> {{($despeguesPrivados)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($embarquePrivado)}}</span>
				</div>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix visible-sm-block"></div>

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">COMERCIAL PRIVADO</span>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane" style="transform: rotate(90deg);"></i> {{($aterrizajesComercialPrivado)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($desembarqueComercialPrivado)}}</span>
				</div>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane"></i> {{($despeguesComercialPrivado)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($embarqueComercialPrivado)}}</span>
				</div>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-exclamation-triangle"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">OTROS VUELOS</span>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane" style="transform: rotate(90deg);"></i> {{($otrosAterrizajes)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($desembarqueOtrosVuelos)}}</span>
				</div>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane"></i> {{($otrosDespegues)}}</span>
					<span class="info-box-number"><i class="fa fa-user"></i> {{($embarqueOtrosVuelos)}}</span>
				</div>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
</div><!-- /.row -->
