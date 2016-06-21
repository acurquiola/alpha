@extends('app')
@section('content')
<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a href="{{ URL::to('cobranza/Todos/main') }}">Cobranza</a></li>
  <li><a href="{{ action('CobranzaController@index', [$moduloNombre]) }}">Cobranza - {{$moduloNombre}}</a></li>
  <li><a class="active">Cobranza {{$cobro->id}}</a></li>
</ol>

<div class="row" id="box-wrapper">

    <div class="col-md-12">
      <!-- general form elements -->
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
        <!-- form start -->
        <div class="box-body">
            <h6 style="font-weight: bold;">Cobro: <label>{{$cobro->id}}</label> </h6> 
            <h6 style="font-weight: bold;">Cliente: <label>{{$cobro->cliente->codigo}} | {{$cobro->cliente->nombre}}</label> </h6> 
            <h6 style="font-weight: bold;">Nro. Recibo de Caja: <label>{{($cobro->nRecibo)?$cobro->nRecibo:"No Dispone"}}</label> </h6> 
            <h6 style="font-weight: bold;">Fecha de Cobro: <label>{{$cobro->fecha}}</label> </h6> 
                <h6 style="font-weight: bold;">Observaciones:  <label>{{($cobro->observacion)?$cobro->observacion:"No Dispone"}}</label> </h6> 
                <h6 style="font-weight: bold;">Recaudos Consignados:  <label> {{($cobro->hasrecaudos)?"Si":"No"}}</label> </h6> 

                <div class="table-responsive">
                    <table class="table table-condensed" >
                        <thead  class="bg-primary">
                            <tr>
                                <th align="center" class="text-center" colspan="3" style="width: 170px; vertical-align: middle">Factura</th>
                                <th align="center" class="text-center" colspan="2" style="width: 100px; vertical-align: middle">Comprobante</th>
                                <th align="center" class="text-center" colspan="3" style="width: 160px; vertical-align: middle">Factura (Bs.)</th>
                                <th align="center" class="text-center" colspan="5" style="width: 230px; vertical-align: middle">Retención</th>
                                <th align="center" class="text-center" colspan="2" style="width: 120px; vertical-align: middle">Cobro (Bs.)</th>
                            </tr>
                            <tr>
                                <th align="center" class="text-center" style="width: 50px">Fecha</th>
                                <th align="center" class="text-center" style="width: 60px">Nro. Factura</th>
                                <th align="center" class="text-center" style="width: 60px">Nro. Control</th>

                                <th align="center" class="text-center" style="width: 50px">Fecha</th>
                                <th align="center" class="text-center" style="width: 50px">Número</th>

                                <th align="center" class="text-center" style="width: 60px">Base</th>
                                <th align="center" class="text-center" style="width: 40px">IVA</th>
                                <th align="center" class="text-center" style="width: 60px">Total</th>

                                <th align="center" class="text-center" style="width: 40px">% IVA</th>
                                <th align="center" class="text-center" style="width: 50px">IVA (Bs.)</th>
                                <th align="center" class="text-center" style="width: 40px">% ISLR</th>
                                <th align="center" class="text-center" style="width: 40px">ISLR (Bs.)</th>
                                <th align="center" class="text-center" style="width: 60px">Total (Bs.)</th>

                                <th align="center" class="text-center" style="width: 60px">Por Cobrar</th>
                                <th align="center" class="text-center" style="width: 60px">Cobrado</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cobro->facturas as $factura)
                            <tr>
                                <td align="center" style="width: 50px">{{$factura->fecha}}</td>
                                <td align="center" style="width: 60px">{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
                                <td align="center" style="width: 60px">{{$factura->nControlPrefix}}-{{$factura->nControl}}</td>
                                <td align="center" style="width: 50px">{{$factura->pivot->retencionFecha}}</td>
                                <td align="center" style="width: 50px">{{$factura->pivot->retencionComprobante}}</td>                                
                                <td align="right" style="width: 60px">{{$traductor->format($factura->pivot->base)}}</td>
                                <td align="right" style="width: 40px">{{$traductor->format($factura->iva)}}</td>
                                <td align="right" style="width: 60px">{{$traductor->format($factura->pivot->total)}}</td>

                                <td align="right" style="width: 40px">{{$traductor->format($factura->pivot->ivapercentage)}}</td>
                                <td align="right" style="width: 50px">{{$traductor->format((($factura->pivot->ivapercentage)/100)*$factura->pivot->iva)}}</td>
                                <td align="right" style="width: 40px">{{$traductor->format($factura->pivot->islrpercentage)}}</td>
                                <td align="right" style="width: 40px">{{$traductor->format((($factura->pivot->islrpercentage)/100)*($factura->pivot->base))}}</td>
                                <td align="right" style="width: 60px">{{$traductor->format($factura->pivot->retencion)}}</td>
                                <td align="right" style="width: 60px">{{$traductor->format(($factura->pivot->total)-($factura->pivot->retencion))}}</td>
                                <td align="right" style="width: 60px">{{$traductor->format($factura->pivot->monto)}}</td>
                            </tr>
                            @endforeach
                            <tr><td colspan="15"> </td></tr>
                            <tr class="footer-table" id="inicio-footer">
                                <td colspan="10"> </td>
                                <td align="left" colspan="4">Monto total facturas:</td>
                                <td align="right">{{$traductor->format($cobro->montofacturas)}}</td>                                   
                            </tr>
                            <tr class="footer-table">
                                <td colspan="10"> </td>
                                <td align="left" colspan="4">Monto total depositado:</td>
                                <td align="right">{{$traductor->format($cobro->montodepositado)}}</td>                                   
                            </tr>
                            <tr class="footer-table">
                                <td colspan="10"> </td>
                                <td align="left" colspan="4">Diferencia</td>
                                <td align="right">{{$traductor->format($cobro->montodepositado-$cobro->montofacturas)}}</td>                                 
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>




</div>
@endsection
@section('script')
<script>
    $(function(){
        $('#export-btn').click(function(e){
            var table=$('table').clone();
            $(table).prepend('<thead>\
                                <tr>\
                                    <th align="left" colspan="15" style="width: 780px">\
                                    Nro. Cobro: {{$cobro->id}}\
                                    </br>\
                                    Cliente: {{$cobro->cliente->codigo}} | {{$cobro->cliente->nombre}} \
                                    </br>\
                                    Nro. Recibo de Caja: {{($cobro->nRecibo)?$cobro->nRecibo:"No Dispone"}} \
                                    </br>\
                                    Fecha de Cobro: {{$cobro->created_at}} \
                                    </br>\
                                    Observaciones: {{($cobro->observacion)?$cobro->observacion:"No Dispone"}} \
                                    </br>\
                                    Recaudos Consolidados: {{($cobro->hasrecaudos)?"Si":"No"}} \
                                    </br>\
                                    </th>\
                                </tr>\
                            </thead>')
            $(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center"})
            $(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
            $(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
            var tableHtml= $(table)[0].outerHTML;
            $('[name=table]').val(tableHtml);
            $('#export-form').submit();
        });
    });
</script>
@endsection