@extends('app')
@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a class="active">Cobranza - {{$modulo->nombre}}</a></li>
</ol>
    <div class="row" id="box-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Cobranza - {{$modulo->nombre}}</h3>
                </div>
                <div class="box-body"  id="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="list-group">
                                <li class="list-group-item" data-id="1">
                                    <div class="media">
                                        <div class="pull-right media-right">
                                            <div class="btn-group-vertical  btn-group-xs" role="group" aria-label="...">
                                                <a class="btn btn-primary" href="{{action('CobranzaController@create', [$modulo->nombre]) }}">&nbsp;<span class="glyphicon glyphicon-plus"></span>&nbsp;</a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Crear un nuevo cobro</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">

                                    <table class="table text-center">
                                        <thead class="bg-primary">
                                            <tr>
                                                {!!Html::sortableColumnTitle("Numéro", "nContrato")!!}
                                                {!!Html::sortableColumnTitle("Cliente", "clienteNombre")!!}
                                                {!!Html::sortableColumnTitle("Fecha", "clienteNombre")!!}
                                                {!!Html::sortableColumnTitle("Monto pagado", "conceptoNombre")!!}
                                                {!!Html::sortableColumnTitle("Monto depositado", "fechaInicio")!!}
                                                {!!Html::sortableColumnTitle("Observaciones", "fechaVencimiento")!!}
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cobros as $cobro)
                                                <tr>
                                                    <td class='text-justify'>{{$cobro->id}}</td>
                                                    <td style="text-align: left">{{$cobro->cliente()->nombre}}</td>
                                                    <td>{{$cobro->created_at}}</td>
                                                    <td style="text-align: right">{{$cobro->montofacturas}}</td>
                                                    <td style="text-align: right">{{$cobro->montodepositado}}</td>
                                                    <td class='text-justify'>{{$cobro->observacion}}</td>
                                                    <td>
                                                        <div class='btn-group  btn-group-sm' role='group' aria-label='...'>
                                                            <a class='btn btn-primary' href='{{action('CobranzaController@show', [$modulo->nombre,$cobro->id])}}'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            <a class='btn btn-warning' href='{{action('CobranzaController@edit', [$modulo->nombre,$cobro->id])}}'><span class='glyphicon glyphicon-pencil' ></span></a>
                                                            <button class='btn btn-danger delete-contrato-btn' data-id="{{$cobro->id}}"><span class='glyphicon glyphicon-remove'></span></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                </div>
            </div>
        </div>
    </div>





@endsection
@section('script')

<script>




</script>


@endsection