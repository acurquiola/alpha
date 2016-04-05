@extends('app')

@section('content')
<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a class="active">Reporte Listado Facturas</a></li>
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
                    {!! Form::open([
                    "url" => action('ReporteController@getReporteListadoFacturas'),
                    "method" => "POST",
                    "class" => "form-horizontal"]) !!}
                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>Aeropuerto</strong></label>
                        <div class="col-md-6">
                            {!! Form::select('aeropuerto', $aeropuertos, isset($aeropuerto)?$aeropuerto:null, ["class"=> "form-control", "autocomplete" => "off"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>Modulo</strong></label>
                        <div class="col-md-6">
                            <select autocomplete="off" class="form-control" id="modulo-select" name="modulo">
                            <option value="0">TODOS</option>
                                @foreach($modulos as $m)
                                    <option data-aeropuerto="{{$m->aeropuerto->id}}"
                                    value="{{$m->id}}"
                                    @if(isset($modulo) && $modulo==$m->id)
                                        selected
                                    @endif
                                    >{{$m->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>Período</strong></label>
                        <div class="col-md-4">
                            {!! Form::text('desde', isset($desde)?$desde:null, ["class"=> "form-control datepicker", "placeholder" => "Desde", "autocomplete" => "off"]) !!}
                        </div>
                        <label class="col-md-1 text-center" style="padding-top:10px"><strong>-</strong></label>
                        <div class="col-md-4">
                            {!! Form::text('hasta', isset($hasta)?$hasta:null, ["class"=> "form-control datepicker", "placeholder" => "Hasta", "autocomplete" => "off"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>#Factura</strong></label>
                        <div class="col-md-6">
                            {!! Form::text('nFactura', isset($nFactura)?$nFactura:null, ["class"=> "form-control", "placeholder" => "Número de Factura", "autocomplete" => "off"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>Cliente</strong></label>
                        <div class="col-md-6">
                            <select class="form-control" id="cliente-select" name="cliente_id" autocomplete="off">                                <option value="">--Seleccione una opcion--</option>
                                @foreach($clientes as $cliente)
                                <option
                                    value="{{$cliente->id}}">
                                    {{$cliente->codigo}} | {{$cliente->nombre}}
                                </option>
                                @endforeach    
                            </select>                   
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>Estatus</strong></label>
                        <div class="col-md-6">
                            {!! Form::select('estatus', [
                            "%" => "Todas",
                            "C" => "Cobradas",
                            "P" => "Por Cobrar",
                            "A" => "Anuladas",
                            "V" => "Vencidas"
                            ], isset($estatus)?$estatus:null, ["class"=> "form-control", "autocomplete" => "off"]) !!}
                        </div>
                    </div>
                    <div class="form-group" style="margin-right: 20px">
                    <a class="btn btn-default pull-right" href="{{action('ReporteController@getReporteListadoFacturas')}}">Reset</a>
                    <button type="submit" class="btn btn-primary pull-right">Buscar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @if(isset($facturas))
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        {!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
                        {!! Form::hidden('table') !!}
                        {!! Form::hidden('gerencia', $gerencia) !!}
                        {!! Form::hidden('departamento', $departamento) !!}
                            <h3 class="box-title">Reporte</h3>
                            <span class="pull-right"><button class="btn btn-primary" id="export-btn"><span class="glyphicon glyphicon-file"></span> Exportar</button></span>
                        {!! Form::close() !!}
                    </div>
                    <div class="box-body" >
                        <div class="row">
                            <div class="col-xs-12">

                            <div class="table-responsive" style="max-height: 500px">
                             <table class="table table-hover table-condensed">
                             <thead  class="bg-primary">
                             <tr>
                                 <th style="vertical-align: middle; width:50px" align="center" class="text-center">
                                    Fecha
                                 </th>
                                 <th style="vertical-align: middle; width:60px" align="center" class="text-center">
                                    Nro. Factura
                                 </th>
                                 <th style="vertical-align: middle; width:60px" align="center" class="text-center">
                                    Nro. Control
                                 </th>
                                 <th style="vertical-align: middle; width:70px" align="center" class="text-center">
                                    RIF
                                 </th>
                                 <th style="vertical-align: middle; width:30px" align="center" class="text-center">
                                    Código
                                 </th>
                                 <th style="vertical-align: middle; width:140px" align="center" class="text-center">
                                    Nombre ó Razón Social
                                 </th>
                                 <th style="vertical-align: middle; width:150px" align="center"  class="text-center">
                                    Descripción
                                 </th>
                                 <th style="vertical-align: middle; width:70px" align="center" class="text-center">
                                    Sub-Total
                                 </th>
                                 <th style="vertical-align: middle; width:60px" align="center" class="text-center">
                                    IVA
                                 </th>
                                 <th style="vertical-align: middle; width:70px" align="center" class="text-center">
                                    Monto
                                 </th>
                             </tr>
                             </thead>
                            <tbody>
                            @if(count($facturas)>0)
                            @foreach($facturas as $index => $factura)
                                <tr>
                                    <td style="vertical-align: middle; width:50px" align="center">{{$factura->fecha}}</td>
                                    <td style="vertical-align: middle; width:60px" align="center" >{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
                                    <td style="vertical-align: middle; width:60px" align="center" >{{$factura->nControlPrefix}}-{{$factura->nControl}}</td>
                                    <td style="vertical-align: middle; width:70px" align="center" >{{$factura->cliente->cedRifPrefix}}-{{$factura->cliente->cedRif}}</td>
                                    <td style="vertical-align: middle; width:30px" align="center" >{{$factura->cliente->codigo}}</td>
                                    <td style="vertical-align: middle; width:140px" align="left" >{{$factura->cliente->nombre}}</td>
                                    <td style="vertical-align: middle; width:150px" align="left">{{$factura->descripcion}}</td>
                                    <td style="vertical-align: middle; width:70px" align="right">{{$traductor->format($factura->subtotal)}}</td>
                                    {{--@if(!$factura->metadata)--}}
                                    <td style="vertical-align: middle; width:60px" align="right">{{$traductor->format($factura->iva)}}</td>
                                    {{--@else--}}
                                    {{--<td style="vertical-align: middle; width:60px" align="right">{{$factura->metadata->ivapercentage}}</td>--}}
                                    {{--<td style="vertical-align: middle; width:60px" align="right">{{$factura->metadata->islrpercentage}}</td>--}}
                                    {{--@endif--}}
                                    <td style="vertical-align: middle; width:70px" align="right">{{$traductor->format($factura->total)}}</td>
                                </tr>
                            @endforeach
                                    <tr class="bg-gray" align="center">
                                        <td colspan="2">Total</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td style="vertical-align: middle; width:70px" align="right">{{$traductor->format($subtotal)}}</td>
                                        <td style="vertical-align: middle; width:60px" align="right">{{$traductor->format($iva)}}</td>
                                        <td style="vertical-align: middle; width:70px" align="right">{{$traductor->format($total)}}</td>                                   
                                    </tr>     
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">No hay registros para los parámetros seleccionados</td>
                                </tr>
                            @endif

                            </tbody>

                             </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


@endsection

@section('script')
<script>
$(function(){

  $('.datepicker').datepicker({
    closeText: 'Cerrar',
    prevText: '&#x3C;Ant',
    nextText: 'Sig&#x3E;',
    currentText: 'Hoy',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
    dayNamesMin: ['D','L','M','M','J','V','S'],
    weekHeader: 'Sm',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: '',
    dateFormat: "dd/mm/yy"});

})
$('#cliente-select').chosen({width: "100%"})

$('#export-btn').click(function(e){
    var table=$('table').clone();
    $(table).find('td, th').filter(function() {
        return $(this).css('display') == 'none';
    }).remove();
    $(table).find('tr').filter(function() {
        return $(this).find('td,th').length == 0;
    }).remove();
    $(table).prepend('<thead>\
                        <tr>\
                            <th colspan="11" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">LISTADO DE FACTURAS EMITIDAS\
                                </br>\
                                DESDE: {{isset($desde)?$desde:"TODOS"}} HASTA: {{isset($hasta)?$hasta:"TODOS"}} | MÓDULO: {{isset($modulo)?$modulo:"TODOS"}}\
                                </br>\
                                CLIENTE: {{isset($cliente_id)?$cliente_id:"TODOS"}} | AEROPUERTO: {{isset($aeropuerto)?$aeropuerto:"TODOS"}}\
                            </th>\
                        </tr>\
                    </thead>')
    $(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
    $(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
    $(table).find('td').css({'font-size': '7px'})
    $(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
    $(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
    var tableHtml= $(table)[0].outerHTML;
    $('[name=table]').val(tableHtml);
    $('#export-form').submit();
})

$('[name=aeropuerto]').change(function(e){
    var value=$(this).val();
        $('[name=modulo] option').show();
    if(value!=0)
        $('[name=modulo] option[data-aeropuerto!='+value+']').hide();
    var $options=$('[name=modulo] option:visible');
    if($options.length>0)
        $('[name=modulo]').val($options.first().attr('value'));
    else
        $('[name=modulo]').val('');

}).change();
</script>


@endsection