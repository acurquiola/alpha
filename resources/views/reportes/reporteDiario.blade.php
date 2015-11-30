@extends('app')

@section('content')
<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a class="active">Reporte Diario</a></li>
</ol>
    <div class="row" id="box-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Filtros</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                </div>
                <div class="box-body text-right">
                    {!! Form::open(["url" => action('ReporteController@getReporteMensual'), "method" => "GET", "class"=>"form-inline"]) !!}
                    <div class="form-group">
                    <label>Seleccione un mes:</label>
                          {!! Form::select('mes', $meses, $mes, ["class"=> "form-control"]) !!}
                    </div>
                    <div class="form-group">
                    <label>Seleccione un año:</label>
                          {!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                    <a class="btn btn-default" href="{{action('ReporteController@getReporteMensual')}}">Reset</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reporte</h3>
                    <span class="pull-right"><button class="btn btn-primary"><span class="glyphicon glyphicon-file"></span> Exportar</button></span>
                </div>
                <div class="box-body" >
                    <div class="row">
                        <div class="col-xs-12">
                         <table class="table">
                         <thead  class="bg-primary">
                         <tr>
                         <th>
                            Fecha Recaudación
                         </th>
                         @foreach($modulos as $modulo)
                          <th>
                             {{$modulo->nombre}}
                          </th>
                         @endforeach
                         </tr>
                         </thead>
                        <tbody>
                        @foreach($montos as $fecha => $montoModulos)
                        <tr>
                        <td>{{$fecha}}</td>
                        @foreach($montoModulos as $monto)
                        <td>{{$monto}}</td>
                        @endforeach
                        </tr>
                        @endforeach

                        <tr class="bg-gray">
                        <td>Totales</td>
                        @foreach($montosTotales as $total)
                        <td>{{$total}}</td>
                        @endforeach
                        </tr>



                        </tbody>

                         </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection