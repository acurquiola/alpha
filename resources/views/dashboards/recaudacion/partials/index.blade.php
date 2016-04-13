@extends('app')
@section('content')
<section class="content-header">
	<h1>
		<i class="ion-speedometer"></i> Dashboard
		<small><b><i class="ion ion-android-calendar"></i>{{$fecha}}</b></small>
	</h1>
</section>

@include('dashboards.recaudacion.partials.infoBox') 
@include('dashboards.recaudacion.partials.facturasRecientes') 
@include('dashboards.recaudacion.partials.cobranzaReciente') 

</div><!-- /.col -->
@endsection
