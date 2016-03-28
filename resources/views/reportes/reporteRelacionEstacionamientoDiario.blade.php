@extends('app')

@section('content')
<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a class="active">Relación de Estacionamiento Diario</a></li>
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
                <div class="box-body">
                    {!! Form::open(["url" => action('ReporteController@getReporteRelacionEstacionamientoDiario'), "method" => "GET", "class"=>"form-inline"]) !!}
                    <div class="form-group" style="margin-left: 20px">
                        <label>Mes:</label>
                          {!! Form::select('mes', $meses, $mes, ["class"=> "form-control"]) !!}
                    </div>
                    <div class="form-group" style="margin-left: 20px">
                        <label>Año:</label>
                          {!! Form::select('anno', $annos, $anno, ["class"=> "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        <label style="width:80px; margin-left: 20px">Aeropuerto:</label>
                          {!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
                    </div>
                    <a class="btn btn-default  pull-right" href="{{action('ReporteController@getReporteRelacionEstacionamientoDiario')}}">Reset</a>
                    <button type="submit" class="btn btn-primary pull-right">Buscar</button>
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
                              <th style="vertical-align: middle" class="text-center" colspan="1"></th>
                              <th style="vertical-align: middle" class="text-center" colspan="4">TICKETS DE ESTACIONAMIENTO</th>
                              <th style="vertical-align: middle" class="text-center" colspan="4">TICKETS DE PERNOCTA</th>
                              <th style="vertical-align: middle" class="text-center" colspan="4">TICKETS EXTRAVIADOS</th>
                              <th style="vertical-align: middle" class="text-center" colspan="10">TARJETAS ELECTRÓNICAS</th>
                              <th style="vertical-align: middle" class="text-center" colspan="3">RECAUDADO</th>
                              <th style="vertical-align: middle" class="text-center" colspan="1">DEPÓSITO</th>
                         </tr>
                         <tr>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Fecha
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Cantidad
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Base
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                IVA
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Total
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Cantidad
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Base
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                IVA
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Total
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Cantidad
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Base
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                IVA
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Total
                             </th>
                            
                             <th colspan="3" style="vertical-align: middle" class="text-center">
                                Monto
                             </th>
                             <th colspan="3" style="vertical-align: middle" class="text-center">
                                Monto
                             </th>
                             <th colspan="3" style="vertical-align: middle" class="text-center">
                                Monto
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Total
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Base
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                IVA
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Total
                             </th>
                             <th rowspan="2" style="vertical-align: middle" class="text-center">
                                Referencia
                             </th>
                         </tr>

                         <tr> 
                              <th style="vertical-align: middle" class="text-center">Base</th>
                              <th style="vertical-align: middle" class="text-center">IVA</th>
                              <th style="vertical-align: middle" class="text-center">Total</th>
                              <th style="vertical-align: middle" class="text-center">Base</th>
                              <th style="vertical-align: middle" class="text-center">IVA</th>
                              <th style="vertical-align: middle" class="text-center">Total</th>
                              <th style="vertical-align: middle" class="text-center">Base</th>
                              <th style="vertical-align: middle" class="text-center">IVA</th>
                              <th style="vertical-align: middle" class="text-center">Total</th>
                         </tr>
                         </thead>
                        <tbody>
                        </tbody>
                        @foreach($estacionamientoDiario as $dia => $estacionamiento)
                          <tr>
                              <th class="text-center dia">{{$dia}}</th>
                              <th class="text-center ticketEstacionamiento">{{$traductor->format($estacionamiento["ticketEstacionamiento"])}}</th>
                              <th class="text-center baseTicketEstacionamiento">{{$traductor->format($estacionamiento["baseTicketEstacionamiento"])}}</th>
                              <th class="text-center ivaTicketEstacionamiento">{{$traductor->format($estacionamiento["ivaTicketEstacionamiento"])}}</th>
                              <th class="text-center totalTicketEstacionamiento">{{$traductor->format($estacionamiento["totalTicketEstacionamiento"])}}</th>
                              <th class="text-center ticketPernocta">{{$traductor->format($estacionamiento["ticketPernocta"])}}</th>
                              <th class="text-center baseTicketPernocta">{{$traductor->format($estacionamiento["baseTicketPernocta"])}}</th>
                              <th class="text-center ivaTicketPernocta">{{$traductor->format($estacionamiento["ivaTicketPernocta"])}}</th>
                              <th class="text-center totalTicketPernocta">{{$traductor->format($estacionamiento["totalTicketPernocta"])}}</th>
                              <th class="text-center ticketExtraviado">{{$traductor->format($estacionamiento["ticketExtraviado"])}}</th>
                              <th class="text-center baseTicketExtraviado">{{$traductor->format($estacionamiento["baseTicketExtraviado"])}}</th>
                              <th class="text-center ivaTicketExtraviado">{{$traductor->format($estacionamiento["ivaTicketExtraviado"])}}</th>
                              <th class="text-center totalTicketExtraviado">{{$traductor->format($estacionamiento["totalTicketExtraviado"])}}</th>
                              <th class="text-center baseMontoA">0</th>
                              <th class="text-center ivaMontoA">0</th>
                              <th class="text-center totalMontoA">0</th>
                              <th class="text-center baseMontoB">0</th>
                              <th class="text-center ivaMontoB">0</th>
                              <th class="text-center totalMontoB">0</th>
                              <th class="text-center baseMontoC">0</th>
                              <th class="text-center ivaMontoC">0</th>
                              <th class="text-center totalMontoC">0</th>
                              <th class="text-center totalTarjetas">0</th>
                              <th class="text-center baseTotal">{{$traductor->format($estacionamiento["baseTotal"])}}</th>
                              <th class="text-center ivaTotal">{{$traductor->format($estacionamiento["ivaTotal"])}}</th>
                              <th class="text-center montoTotal">{{$traductor->format($estacionamiento["montoTotal"])}}</th>
                              <th class="text-center deposito">{{$estacionamiento["deposito"]}}</th>
                          </tr>
                        @endforeach
                          <tr>
                              <th>Total Bs. </th>
                              <th class="text-center" id="ticketEstacionamiento">0</th>
                              <th class="text-center" id="baseTicketEstacionamiento">0</th>
                              <th class="text-center" id="ivaTicketEstacionamiento">0</th>
                              <th class="text-center" id="totalTicketEstacionamiento">0</th>
                              <th class="text-center" id="ticketPernocta">0</th>
                              <th class="text-center" id="baseTicketPernocta">0</th>
                              <th class="text-center" id="ivaTicketPernocta">0</th>
                              <th class="text-center" id="totalTicketPernocta">0</th>
                              <th class="text-center" id="ticketExtraviado">0</th>
                              <th class="text-center" id="baseTicketExtraviado">0</th>
                              <th class="text-center" id="ivaTicketExtraviado">0</th>
                              <th class="text-center" id="totalTicketExtraviado">0</th>
                              <th class="text-center" id="baseMontoA">-</th>
                              <th class="text-center" id="ivaMontoA">-</th>
                              <th class="text-center" id="totalMontoA">-</th>
                              <th class="text-center" id="baseMontoB">-</th>
                              <th class="text-center" id="ivaMontoB">-</th>
                              <th class="text-center" id="totalMontoB">-</th>
                              <th class="text-center" id="baseMontoC">-</th>
                              <th class="text-center" id="ivaMontoC">-</th>
                              <th class="text-center" id="totalMontoC">-</th>
                              <th class="text-center" id="totalTarjetas">-</th>
                              <th class="text-center" id="baseTotal">0</th>
                              <th class="text-center" id="ivaTotal">0</th>
                              <th class="text-center" id="montoTotal">0</th>
                              <th class="text-center" id="deposito"></th>
                          </tr>
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

      var ticketEstacionamiento=0;
      $('.ticketEstacionamiento').each(function(index,value){
          ticketEstacionamiento+=commaToNum($(value).text().trim());
      });

      var baseTicketEstacionamiento=0;
      $('.baseTicketEstacionamiento').each(function(index,value){
          baseTicketEstacionamiento+=commaToNum($(value).text().trim());
      });

      var ivaTicketEstacionamiento=0;
      $('.ivaTicketEstacionamiento').each(function(index,value){
          ivaTicketEstacionamiento+=commaToNum($(value).text().trim());
      });

      var totalTicketEstacionamiento=0;
      $('.totalTicketEstacionamiento').each(function(index,value){
          totalTicketEstacionamiento+=commaToNum($(value).text().trim());
      });

      var ticketPernocta=0;
      $('.ticketPernocta').each(function(index,value){
          ticketPernocta+=commaToNum($(value).text().trim());
      });

      var baseTicketPernocta=0;
      $('.baseTicketPernocta').each(function(index,value){
          baseTicketPernocta+=commaToNum($(value).text().trim());
      });

      var ivaTicketPernocta=0;
      $('.ivaTicketPernocta').each(function(index,value){
          ivaTicketPernocta+=commaToNum($(value).text().trim());
      });

      var totalTicketPernocta=0;
      $('.totalTicketPernocta').each(function(index,value){
          totalTicketPernocta+=commaToNum($(value).text().trim());
      });

      var ticketExtraviado=0;
      $('.ticketExtraviado').each(function(index,value){
          ticketExtraviado+=commaToNum($(value).text().trim());
      });

      var baseTicketExtraviado=0;
      $('.baseTicketExtraviado').each(function(index,value){
          baseTicketExtraviado+=commaToNum($(value).text().trim());
      });

      var ivaTicketExtraviado=0;
      $('.ivaTicketExtraviado').each(function(index,value){
          ivaTicketExtraviado+=commaToNum($(value).text().trim());
      });

      var totalTicketExtraviado=0;
      $('.totalTicketExtraviado').each(function(index,value){
          totalTicketExtraviado+=commaToNum($(value).text().trim());
      });
/*
      var baseMontoA=0;
      $('.baseMontoA').each(function(index,value){
          baseMontoA+=commaToNum($(value).text().trim());
      });

      var ivaMontoA=0;
      $('.ivaMontoA').each(function(index,value){
          ivaMontoA+=commaToNum($(value).text().trim());
      });

      var totalMontoA=0;
      $('.totalMontoA').each(function(index,value){
          totalMontoA+=commaToNum($(value).text().trim());
      });

      var baseMontoB=0;
      $('.baseMontoB').each(function(index,value){
          baseMontoB+=commaToNum($(value).text().trim());
      });

      var ivaMontoB=0;
      $('.ivaMontoB').each(function(index,value){
          ivaMontoB+=commaToNum($(value).text().trim());
      });

      var totalMontoB=0;
      $('.totalMontoB').each(function(index,value){
          totalMontoB+=commaToNum($(value).text().trim());
      });

      var baseMontoC=0;
      $('.baseMontoC').each(function(index,value){
          baseMontoC+=commaToNum($(value).text().trim());
      });

      var ivaMontoC=0;
      $('.ivaMontoC').each(function(index,value){
          ivaMontoC+=commaToNum($(value).text().trim());
      });

      var totalMontoC=0;
      $('.totalMontoC').each(function(index,value){
          totalMontoC+=commaToNum($(value).text().trim());
      });

      var totalTarjetas=0;
      $('.totalTarjetas').each(function(index,value){
          totalTarjetas+=commaToNum($(value).text().trim());
      });*/

      var baseTotal=0;
      $('.baseTotal').each(function(index,value){
          baseTotal+=commaToNum($(value).text().trim());
      });

      var ivaTotal=0;
      $('.ivaTotal').each(function(index,value){
          ivaTotal+=commaToNum($(value).text().trim());
      });

      var montoTotal=0;
      $('.montoTotal').each(function(index,value){
          montoTotal+=commaToNum($(value).text().trim());
      });

      $('#ticketEstacionamiento').text(numToComma(ticketEstacionamiento));
      $('#baseTicketEstacionamiento').text(numToComma(baseTicketEstacionamiento));
      $('#ivaTicketEstacionamiento').text(numToComma(ivaTicketEstacionamiento));
      $('#totalTicketEstacionamiento').text(numToComma(totalTicketEstacionamiento));
      $('#ticketPernocta').text(numToComma(ticketPernocta));
      $('#baseTicketPernocta').text(numToComma(baseTicketPernocta));
      $('#ivaTicketPernocta').text(numToComma(ivaTicketPernocta));
      $('#totalTicketPernocta').text(numToComma(totalTicketPernocta));
      $('#ticketExtraviado').text(numToComma(ticketExtraviado));
      $('#baseTicketExtraviado').text(numToComma(baseTicketExtraviado));
      $('#ivaTicketExtraviado').text(numToComma(ivaTicketExtraviado));
      $('#totalTicketExtraviado').text(numToComma(totalTicketExtraviado));
/*      $('#baseMontoA').text(numToComma(baseMontoA));
      $('#ivaMontoA').text(numToComma(ivaMontoA));
      $('#totalMontoA').text(numToComma(totalMontoA));
      $('#baseMontoB').text(numToComma(baseMontoB));
      $('#ivaMontoB').text(numToComma(ivaMontoB));
      $('#totalMontoB').text(numToComma(totalMontoB));
      $('#baseMontoC').text(numToComma(baseMontoC));
      $('#ivaMontoC').text(numToComma(ivaMontoC));
      $('#totalMontoC').text(numToComma(totalMontoC));
      $('#totalTarjetas').text(numToComma(totalTarjetas));*/
      $('#baseTotal').text(numToComma(baseTotal));
      $('#ivaTotal').text(numToComma(ivaTotal));
      $('#montoTotal').text(numToComma(montoTotal));

  });
</script>


@endsection

