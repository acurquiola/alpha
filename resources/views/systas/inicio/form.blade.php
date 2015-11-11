@extends('app')
@section('content')
	 @include("systas.class.func")
<!-- CONTENEDOR INICIO -->

    <!-- Menu -->
    <div id="Menu">

        @include('systas.inc.sysmenu.vMenu')

    </div>

    <!-- Info -->
    <div id="Formularios">

        @include('systas.tasas.main')

    </div>

@endsection