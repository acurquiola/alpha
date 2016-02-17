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
                    {!! Form::open(["url" => action('ReporteController@getReporteRelacionCobranza'), "method" => "GET", "class"=>"form-inline"]) !!}
                    <div class="form-group">
                        <label>Modulo:</label>
                          {!! Form::select('modulo', $modulos, $modulo, ["class"=> "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        <label>Aeropuerto:</label>
                          {!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        <label>Mes:</label>
                          {!! Form::select('mes', $meses, $mes, ["class"=> "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        <label>Año:</label>
                          {!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                    <a class="btn btn-default" href="{{action('ReporteController@getReporteRelacionCobranza')}}">Reset</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header">
                {!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
                {!! Form::hidden('table') !!}
                    <h3 class="box-title">Reporte</h3>
                    <span class="pull-right">
                        <button type="button" class="btn btn-primary" id="export-btn">
                            <span class="glyphicon glyphicon-file"></span> Exportar
                        </button>
                    </span>
                {!! Form::close() !!}
            </div>
                <div class="box-body" >
                    <div class="row">
                        <div class="col-xs-12">

                        <div class="table-responsive" style="max-height: 500px">
                         <table class="table table-hover table-condensed">
                         <thead  class="bg-primary">
                         <tr>
                             <th style="vertical-align: middle" class="text-center">
                                Fecha Cobro
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Nro. Cobro
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Nro. Factura
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Cod. Cliente
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Nombre o Razón Social
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Forma de Pago
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Nro Recibo
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Nro Cuenta
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Monto Factura
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                Monto Cobrado
                             </th>
                         </tr>
                         </thead>
                        <tbody>
                        @if($recibos->count()>0)
                        @foreach($recibos as $recibo)
                            <tr>
                                <td align="center">{{$recibo->fecha}}</td>
                                <td align="center">{{$recibo->cobro_id}}</td>
                                <td align="center">{{$recibo->cobro->facturas()->first()->nFactura}}</td>
                                <td align="center">{{$recibo->cobro->facturas()->first()->cliente->codigo}}</td>
                                <td align="left">{{$recibo->cobro->facturas()->first()->cliente->nombre}}</td>
                                <td align="center">
                                    @if(($recibo->tipo)=='D')
                                        DEPÓSITO
                                    @elseif($recibo->tipo=='NC')
                                        NOTA DE CRÉDITO
                                    @elseif($recibo->tipo=='T')
                                    TRANSFERENCIA
                                    @endif
                                </td>
                                <td align="center">{{($recibo->cobro->nRecibo)?$recibo->cobro->nRecibo:'N/A'}}</td>
                                <td align="left">{{$recibo->cuenta->descripcion}}</td>
                                <td align="right">{{$traductor->format($recibo->cobro->facturas()->first()->total)}}</td>
                                <td align="right">{{$traductor->format($recibo->monto)}}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No hay registros para las fechas seleccionadas</td>
                            </tr>
                        @endif
<!--                         <tr class="bg-gray">
                        <td colspan="2">Totales Recaudado</td>
                            <td class="text-right" id="metaTotal">0</td>
                            <td class="text-right" id="recaudadoTotal">0</td>
                            <td class="text-right" id="diferenciaTotal">0</td>
                        </tr> -->



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

    var metaTotal=0;
    $('.meta').each(function(index,value){
        metaTotal+=parseInt($(value).text().trim());
    });

    var recaudadoTotal=0;
    $('.recaudado').each(function(index,value){
        recaudadoTotal+=parseInt($(value).text().trim());
    });

    var diferenciaTotal=0;
    $('.diferencia').each(function(index,value){
        diferenciaTotal+=parseInt($(value).text().trim());
    });

    $('#metaTotal').text(metaTotal);
    $('#recaudadoTotal').text(recaudadoTotal);
    $('#diferenciaTotal').text(diferenciaTotal);


$('#export-btn').click(function(e){
    var table=$('table').clone();
    $(table).find('td, th').filter(function() {
      return $(this).css('display') == 'none';
    }).remove();
    $(table).find('tr').filter(function() {
      return $(this).find('td,th').length == 0;
    }).remove();
    $(table).find('th').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'}) 
            var tableHtml= $(table)[0].outerHTML;
    $('[name=table]').val(tableHtml);
    $('#export-form').submit();
})

})
</script>


@endsection