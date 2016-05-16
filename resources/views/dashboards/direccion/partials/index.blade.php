@extends('app')
@section('content')
<section class="content-header">
	<h1>
		<i class="ion-speedometer"></i> Dashboard
		<small><b><i class="ion ion-android-calendar"></i> {{$hoy}}</b></small>
	</h1>
</section>

@include('dashboards.direccion.partials.infoBox') 
@include('dashboards.direccion.partials.barChart') 
@include('dashboards.direccion.partials.cantidadOperaciones') 

@endsection
@section('script')

<!-- page script -->
<script>
	$(function () {
		var context = document.getElementById('skills').getContext('2d');
		var skillsChart = new Chart(context).Pie(data);
	});
</script>
@endsection