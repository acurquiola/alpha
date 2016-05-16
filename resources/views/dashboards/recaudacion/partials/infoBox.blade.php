<!-- Info boxes -->
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="fa fa-check-square-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">RECAUDADO (MES)</span>
				<span class="info-box-number">Bs. {{$traductor->format($recaudadoMes)}}</span>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-exclamation-triangle"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">POR RECAUDAR (MES)</span>
				<span class="info-box-number">Bs. {{$traductor->format($porRecaudarMes)}}</span>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix visible-sm-block"></div>

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">RECAUDADO (AÑO)</span>
				<span class="info-box-number">Bs. {{$traductor->format($recaudadoAnual)}}</span>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-exclamation-triangle"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">POR RECAUDAR (AÑO)</span>
				<span class="info-box-number">Bs. {{$traductor->format($porRecaudarAnual)}}</span>
			</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div><!-- /.col -->
</div><!-- /.row -->
