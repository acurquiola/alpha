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
                            {!! Form::text('desde', isset($desde)?$desde:null, ["class"=> "form-control datepicker", "placeholder" => "desde", "autocomplete" => "off"]) !!}
                        </div>
                        <label class="col-md-1 text-center" style="padding-top:10px"><strong>-</strong></label>
                        <div class="col-md-4">
                            {!! Form::text('hasta', isset($hasta)?$hasta:null, ["class"=> "form-control datepicker", "placeholder" => "hasta", "autocomplete" => "off"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>#Factura</strong></label>
                        <div class="col-md-6">
                            {!! Form::text('nFactura', isset($nFactura)?$nFactura:null, ["class"=> "form-control", "placeholder" => "desde", "autocomplete" => "off"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"><strong>Cliente</strong></label>
                        <div class="col-md-6">
                          {!! Form::hidden('cedRifPrefix', isset($cedRifPrefix)?$cedRifPrefix:'V', ['id' => 'cedRifPrefix', 'class' => 'operator-input', 'autocomplete'=>'off']) !!}
                          <div class="input-group">
                              <div class="input-group-btn">
                                <button style="max-height:37px" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="operator-text">{{$cedRifPrefix or "V"}}</span></button>
                                <ul class="dropdown-menu operator-list">
                                  <li><a href="#">V</a></li>
                                  <li><a href="#">E</a></li>
                                  <li><a href="#">J</a></li>
                                </ul>
                              </div>
                              {!! Form::text('cedRif', isset($cedRif)?$cedRif:null, [ 'class'=>"form-control", 'style'=>'padding-left:2px']) !!}
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            {!! Form::text('nombre', isset($nombre)?$nombre:null, ["class"=> "form-control", "placeholder" => "Nombre ó Razón social", "autocomplete" => "off"]) !!}
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
                    <button type="submit" class="btn btn-default">Buscar</button>
                    <a class="btn btn-default" href="{{action('ReporteController@getReporteListadoFacturas')}}">Reset</a>
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
                                <th style="vertical-align: middle" class="text-center">
                                    N°
                                </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Fecha Emisión
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Nro Factura
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Nro Control
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Rif Cliente
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Nombre ó Razón Social
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Descripción
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Sub-Total
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    IVA
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    ISLR
                                 </th>
                                 <th style="vertical-align: middle" class="text-center">
                                    Monto
                                 </th>
                             </tr>
                             </thead>
                            <tbody>
                            @if(count($facturas)>0)
                            @foreach($facturas as $index => $factura)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$factura->fecha}}</td>
                                    <td>{{$factura->nFacturaPrefix}}-{{$factura->nFactura}}</td>
                                    <td>{{$factura->nControlPrefix}}-{{$factura->nControl}}</td>
                                    <td>{{$factura->cliente->cedRifPrefix}}-{{$factura->cliente->cedRif}}</td>
                                    <td>{{$factura->cliente->nombre}}</td>
                                    <td>{{$factura->descripcion}}</td>
                                    <td>{{$factura->subtotal}}</td>
                                    {{--@if(!$factura->metadata)--}}
                                    <td>{{$factura->iva}}</td>
                                    <td>{{0}}</td>
                                    {{--@else--}}
                                    {{--<td>{{$factura->metadata->ivapercentage}}</td>--}}
                                    {{--<td>{{$factura->metadata->islrpercentage}}</td>--}}
                                    {{--@endif--}}
                                    <td>{{$factura->total}}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No hay registros para los parametros seleccionados</td>
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

$('#export-btn').click(function(e){
    var table=$('table').clone();
    $(table).find('th').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
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