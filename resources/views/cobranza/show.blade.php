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
                      <h3 class="box-title"> </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <h6 style="font-weight: bold;">Cobro: <label>{{$cobro->id}}</label> </h6> 
                        <h6 style="font-weight: bold;">Cliente: <label>{{$cobro->cliente->codigo}} | {{$cobro->cliente->nombre}}</label> </h6> 
                        <h6 style="font-weight: bold;">Nro. Recibo de Caja: <label>{{($cobro->nRecibo)?$cobro->nRecibo:"No Dispone"}}</label> </h6> 
                        <h6 style="font-weight: bold;">Observaciones:  <label>{{($cobro->observaciones)?$cobro->observaciones:"No Dispone"}}</label> </h6> 
                        <h6 style="font-weight: bold;">Recaudos Consignados:  <label> {{($cobro->hasrecaudos)?"Si":"No"}}</label> </h6> 

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
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

                            </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <strong>Monto total facturas:</strong><span style="min-width: 200px; display:inline-block">{{$traductor->format($cobro->montofacturas)}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <strong>Monto total depositado:</strong><span style="min-width: 200px; display:inline-block">{{$traductor->format($cobro->montodepositado)}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <strong>Diferencia:</strong><span style="min-width: 200px; display:inline-block">{{$traductor->format($cobro->montodepositado-$cobro->montofacturas)}}</span>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>




              </div>
@endsection
