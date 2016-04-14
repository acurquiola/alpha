<div class="row">
	<div class="col-xs-3 col-xs-6">
		<!-- Caja 1 -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{($vuelosComerciales)}}<sup style="font-size: 20px"> {{$traductor->format($vuelosComercialesPorc)}}%</sup></h3>
				<p>VUELOS COMERCIALES DEL DÍA</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-people-outline"></i>
			</div>
			<a href="{{action('DespegueController@index') }}" class="small-box-footer"> Ver más <i class="fa fa-arrow-right"></i></a>
		</div>
	</div><!-- ./col -->
	<div class="col-xs-3 col-xs-6">
		<!-- Caja 2 -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{($vuelosPrivados)}}<sup style="font-size: 20px"> {{$traductor->format($vuelosPrivadosPorc)}}%</sup></h3>
				<p>VUELOS PRIVADOS DEL DÍA</p>
			</div>
			<div class="icon">
				<i class="ion ion-locked"></i>
			</div>
			<a href="{{action('DespegueController@index') }}" class="small-box-footer"> Ver más <i class="fa fa-arrow-right"></i></a>
		</div>
	</div><!-- ./col -->
	<div class="col-xs-3 col-xs-6">
		<!-- Caja 3 -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{($vuelosComercialPrivado)}}<sup style="font-size: 20px"> {{$traductor->format($vuelosComercialPrivadoPorc)}}%</sup></h3>
				<p>VUELOS COMERCIAL PRIVADO DEL DÍA</p>
			</div>
			<div class="icon">
				<i class="ion ion-plane"></i>
			</div>
			<a href="{{action('DespegueController@index') }}" class="small-box-footer"> Ver más <i class="fa fa-arrow-right"></i></a>
		</div>
	</div><!-- ./col -->
	<div class="col-xs-3 col-xs-6">
		<!-- Caja 4 -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{($vuelosOficiales)}}<sup style="font-size: 20px"> {{$traductor->format($vuelosOficialesPorc)}}%</sup></h3>
				<p>VUELOS OFICIALES DEL DÍA</p>
			</div>
			<div class="icon">
				<i class="ion ion-pin"></i>
			</div>
			<a href="{{action('DespegueController@index') }}" class="small-box-footer"> Ver más <i class="fa fa-arrow-right"></i></a>
		</div>
	</div><!-- ./col -->
</div><!-- /.row -->