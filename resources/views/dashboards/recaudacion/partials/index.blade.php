@extends('app')
@section('content')
<section class="content-header">
	<h1>
		<i class="ion-speedometer"></i> Dashboard
		<small><b><i class="ion ion-android-calendar"></i> {{$hoy}}</b></small>
	</h1>
</section>

@include('dashboards.recaudacion.partials.facturasRecientes') 
@include('dashboards.recaudacion.partials.resumenRelacionRecaudacionMeta') 

@endsection