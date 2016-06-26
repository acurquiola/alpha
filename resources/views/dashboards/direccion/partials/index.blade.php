@extends('app')
@section('content')
<section class="content-header">
	<h1>
		<i class="ion-speedometer"></i> Dashboard
		<small><b><i class="ion ion-android-calendar"></i> {{$today->format('d/m/Y')}}</b></small>
	</h1>
</section>

@include('dashboards.direccion.partials.infoBox') 
@include('dashboards.direccion.partials.barChart') 
@include('dashboards.direccion.partials.cantidadOperaciones') 

@section('script')
	<script>
		@include('dashboards.direccion.partials.script') 
	</script>
@endsection
@endsection