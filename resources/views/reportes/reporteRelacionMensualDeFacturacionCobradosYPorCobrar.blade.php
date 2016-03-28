@extends('app')

@section('content')
<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a class="active">Relación Mensual de Saldo Facturado, Cobrado y Por Cobrar</a></li>
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
                    {!! Form::open(["url" => action('ReporteController@getReporteRelacionMensualDeFacturacionCobradosYPorCobrar'), "method" => "GET", "class"=>"form-inline"]) !!}
                    <div class="form-group">
                        <label>Seleccione un aeropuerto:</label>
                          {!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        <label>Seleccione un año:</label>
                          {!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                    <a class="btn btn-default" href="{{action('ReporteController@getReporteRelacionMensualDeFacturacionCobradosYPorCobrar')}}">Reset</a>
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

                        <div class="table-responsive">
                         <table class="table table-hover table-condensed">
                         <thead  class="bg-primary">
                         <tr>
                             <th style="vertical-align: middle" class="text-center">
                                Mes
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Facturado
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Cobrado
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Por Cobrar
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Cobro Meses Anteriores
                             </th>
                         </tr>
                         </thead>
                        <tbody>
                        @foreach($montosMeses as $mes => $montos)
                        <tr>
                            <td>{{$mes}}</td>
                            <td class="text-right facturado">{{$traductor->format($montos["facturado"])}}</td>
                            <td class="text-right cobrado">{{$traductor->format($montos["cobrado"])}}</td>
                            <td class="text-right porCobrar">{{$traductor->format($montos["porCobrar"])}}</td>
                            <td class="text-right cobroAnterior">{{$traductor->format($montos["cobroAnterior"])}}</td>
                        </tr>
                        @endforeach
                        <tr class="bg-gray">
                            <td>Totales</td>
                            <td class="text-right" id="facturadoTotal">0</td>
                            <td class="text-right" id="cobradoTotal">0</td>
                            <td class="text-right" id="porCobrarTotal">0</td>
                            <td class="text-right" id="cobroAnteriorTotal">0</td>
                        </tr>



                        </tbody>

                         </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
<script>
$(function(){

    var facturadoTotal=0;
    $('.facturado').each(function(index,value){
        facturadoTotal+=commaToNum($(value).text().trim());
    });

    var cobradoTotal=0;
    $('.cobrado').each(function(index,value){
        cobradoTotal+=commaToNum($(value).text().trim());
    });

    var porCobrarTotal=0;
    $('.porCobrar').each(function(index,value){
        porCobrarTotal+=commaToNum($(value).text().trim());
    });

    var cobroAnteriorTotal=0;
    $('.cobroAnterior').each(function(index,value){
        cobroAnteriorTotal+=commaToNum($(value).text().trim());
    });

    $('#facturadoTotal').text(numToComma(facturadoTotal));
    $('#cobradoTotal').text(numToComma(cobradoTotal));
    $('#porCobrarTotal').text(numToComma(porCobrarTotal));
    $('#cobroAnteriorTotal').text(numToComma(cobroAnteriorTotal));
})
</script>


@endsection