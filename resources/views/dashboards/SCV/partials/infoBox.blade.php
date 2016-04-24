<!-- Info boxes -->
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="fa fa-check-square-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">COMERCIALES</span>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane" style="transform: rotate(90deg);"></i> {{($vuelosComerciales)}}</span>
				</div>
				<div class="col-sm-6">
					<span class="info-box-number"><i class="fa fa-plane"></i> {{($vuelosComerciales)}}</span>
				</div>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-exclamation-triangle"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">PRIVADOS</span>
				<span class="info-box-number">{{$vuelosPrivados}}</span>
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
				<span class="info-box-number">{{$vuelosComercialPrivado}}</span>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-exclamation-triangle"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">OTROS VUELOS</span>
				<span class="info-box-number">{{$otrosVuelos}}</span>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
</div><!-- /.row -->
