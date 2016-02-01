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
                        <h6 class="text-right">Recaudos: {{($cobro->hasrecaudos)?"Si":"No"}}</h6>
                        <h3 style="margin-top:0px">Cobro: <small>{{$cobro->id}}</small></h3>
                        <h4>Cliente: {{$cobro->cliente->codigo}} <small>{{$cobro->cliente->nombre}}</small></h4>
                        <h4>Observaciones: <small>{{$cobro->observaciones}}</small></h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th># Factura</th>
                                        <th>Fecha de retención</th>
                                        <th>Comprobante de retención</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right">Iva</th>
                                        <th class="text-right">% ISLR</th>
                                        <th class="text-right">% IVA</th>
                                        <th class="text-right">Retención</th>
                                        <th class="text-right">Cobrado</th>
                                    </tr>
                                </thead>
                            <tbody>

                                @foreach($cobro->facturas as $factura)
                                    <tr>
                                        <td>{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
                                        <td>{{$factura->pivot->retencionFecha}}</td>
                                        <td>{{$factura->pivot->retencionComprobante}}</td>
                                        <td class="text-right">{{$traductor->format($factura->pivot->total)}}</td>
                                        <td class="text-right">{{$traductor->format($factura->pivot->iva)}}</td>
                                        <td class="text-right">{{$traductor->format($factura->pivot->islrpercentage)}}</td>
                                        <td class="text-right">{{$traductor->format($factura->pivot->ivapercentage)}}</td>
                                        <td class="text-right">{{$traductor->format($factura->pivot->retencion)}}</td>
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
