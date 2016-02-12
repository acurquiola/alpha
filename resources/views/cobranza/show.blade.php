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
            <h6 style="font-weight: bold;">Nro. Recibo de Caja
                : <label>{{($cobro->nRecibo)?$cobro->nRecibo:"No Dispone"}}</label> </h6> 
                <h6 style="font-weight: bold;">Observaciones:  <label>{{($cobro->observaciones)?$cobro->observaciones:"No Dispone"}}</label> </h6> 
                <h6 style="font-weight: bold;">Recaudos Consignados:  <label> {{($cobro->hasrecaudos)?"Si":"No"}}</label> </h6> 

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nro. Factura</th>
                                <th>Nro. Control</th>
                                <th>Fecha de Comprobante</th>
                                <th style="width: 100px">Nro. Comprobante</th>
                                <th class="text-right">Monto Factura</th>
                                <th class="text-right">Base Imponible</th>
                                <th class="text-right">% IVA</th>
                                <th class="text-right">Monto IVA</th>
                                <th class="text-right">% ISLR</th>
                                <th class="text-right">Monto ISLR</th>
                                <th class="text-right">Total Retención</th>
                                <th class="text-right">Total</th>
                                <th class="text-right">Cobrado</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cobro->facturas as $factura)
                            <tr>
                                <td>{{$factura->fecha}}</td>
                                <td>{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
                                <td>{{$factura->nControlPrefix}}-{{$factura->nControl}}</td>
                                <td>{{$factura->pivot->retencionFecha}}</td>
                                <td>{{$factura->pivot->retencionComprobante}}</td>
                                <td class="text-right">{{$traductor->format($factura->pivot->total)}}</td>
                                <td class="text-right">{{$traductor->format($factura->pivot->base)}}</td>
                                <td class="text-right">{{$traductor->format($factura->pivot->ivapercentage)}}</td>
                                <td class="text-right">{{$traductor->format((($factura->pivot->ivapercentage)/100)*$factura->pivot->iva)}}</td>
                                <td class="text-right">{{$traductor->format($factura->pivot->islrpercentage)}}</td>
                                <td class="text-right">{{$traductor->format((($factura->pivot->islrpercentage)/100)*($factura->pivot->base))}}</td>
                                <td class="text-right">{{$traductor->format($factura->pivot->retencion)}}</td>
                                <td class="text-right">{{$traductor->format(($factura->pivot->total)-($factura->pivot->retencion))}}</td>
                                <td class="text-right">{{$traductor->format($factura->pivot->monto)}}</td>
                            </tr>
                            @endforeach


                            <tr class="footer-table" id="inicio-footer" align="left">
                                <td colspan="10"> </td>
                                <td colspan="2">Monto total facturas:</td>
                                <td>{{$traductor->format($cobro->montofacturas)}}</td>                                   
                            </tr>
                            <tr class="footer-table"align="left">
                                <td colspan="10"> </td>
                                <td colspan="2">Monto total depositado:</td>
                                <td>{{$traductor->format($cobro->montodepositado)}}</td>                                   
                            </tr>
                            <tr class="footer-table" align="left">
                                <td colspan="10"> </td>
                                <td colspan="2">Diferencia</td>
                                <td>{{$traductor->format($cobro->montodepositado-$cobro->montofacturas)}}</td>                                 
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
            $(table).find('th').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center"})
            $(table).find('#inicio-footer td').css({'border-top':'1px solid black;'})
            $(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
            var tableHtml= $(table)[0].outerHTML;
            $('[name=table]').val(tableHtml);
            $('#export-form').submit();
        });
    });
</script>
@endsection