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
                {!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
                {!! Form::hidden('table') !!}
                {!! Form::hidden('gerencia', $gerencia) !!}
                {!! Form::hidden('departamento', $departamento) !!}
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

                        <div class="table-responsive">
                         <table class="table table-hover table-condensed">
                         <thead  class="bg-primary">
                         <tr>
                             <th style="vertical-align: middle" class="text-center">
                                MES
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                FACTURADO
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                COBRADO
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                POR COBRAR
                             </th>
                             <th style="vertical-align: middle" class="text-center">
                                COBRO DE MESES ANTERIORES
                             </th>
                         </tr>
                         </thead>
                        <tbody>
                        @foreach($montosMeses as $mes => $montos)
                        <tr>
                            <td>{{$mes}}</td>
                            <td class="text-right facturado" align="right">{{$traductor->format($montos["facturado"])}}</td>
                            <td class="text-right cobrado"  align="right">{{$traductor->format($montos["cobrado"])}}</td>
                            <td class="text-right porCobrar"   align="right">{{$traductor->format($montos["porCobrar"])}}</td>
                            <td class="text-right cobroAnterior"  align="right">{{$traductor->format($montos["cobroAnterior"])}}</td>
                        </tr>
                        @endforeach
                        <tr class="bg-gray">
                            <td  style="font-weight: bold" >TOTALES</td>
                            <td  align="right" class="text-right" style="font-weight: bold" id="facturadoTotal">0</td>
                            <td  align="right" class="text-right" style="font-weight: bold" id="cobradoTotal">0</td>
                            <td  align="right" class="text-right" style="font-weight: bold" id="porCobrarTotal">0</td>
                            <td  align="right" class="text-right" style="font-weight: bold" id="cobroAnteriorTotal">0</td>
                        </tr>
                        <tr class="bg-gray">
                            <td  colspan="4" align="right" class="text-right" style="font-weight: bold" >MONTO TOTAL RECAUDADO</td>
                            <td  align="right" class="text-right" style="font-weight: bold" id="totalRecaudado">0</td>
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
    var totalRecaudado=cobradoTotal+cobroAnteriorTotal;

    $('#facturadoTotal').text(numToComma(facturadoTotal));
    $('#cobradoTotal').text(numToComma(cobradoTotal));
    $('#porCobrarTotal').text(numToComma(porCobrarTotal));
    $('#cobroAnteriorTotal').text(numToComma(cobroAnteriorTotal));
    $('#totalRecaudado').text(numToComma(totalRecaudado));


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
                      <th colspan="5" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">RELACIÓN MENSUAL DE SALDO FACTURADO, COBRADO Y POR COBRAR\
                      </br>\
                      AÑO: {{$anno}} | AEROPUERTO: {{$aeropuertoNombre}}\
                    </th>\
                  </tr>\
                </thead>')
          $(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
          $(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '8px'})
          $(table).find('td').css({'font-size': '7px'})
          $(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
          $(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
          $(table).append('<tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
          						<td></td>\
               			  </tr><tr>\
          						<td colspan="3" align="center" style="font-weight: bold; border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">REVISADO</td>\
          						<td colspan="2" align="center" style="font-weight: bold; border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">CONFORMADO</td>\
               			  </tr><tr>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
               			  </tr><tr>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
               			  </tr><tr>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
               			  </tr><tr>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
               			  </tr><tr>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
               			  </tr><tr>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
          						<td style="border-right: 1px solid black;border-left: 1px solid black;"></td>\
               			  </tr><tr>\
          						<td align="center" style="border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">FIRMA</td>\
          						<td align="center" style="border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">FIRMA</td>\
          						<td align="center" style="border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">FIRMA</td>\
          						<td align="center" style="border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">FIRMA</td>\
          						<td align="center" style="border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">FIRMA</td>\
               			  </tr><tr>\
          						<td align="center" style="font-weight: bold; border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">JEFE DEPARTAMENTO RECAUDACIÓN</td>\
          						<td align="center" style="font-weight: bold; border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">CONTADOR</td>\
          						<td align="center" style="font-weight: bold; border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">GERENTE ADMINISTRACIÓN</td>\
          						<td align="center" style="font-weight: bold; border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">SUB-DIRECTOR</td>\
          						<td align="center" style="font-weight: bold; border-top: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;">DIRECTOR</td>\
               			  </tr>')
          var tableHtml= $(table)[0].outerHTML;
          $('[name=table]').val(tableHtml);
          $('#export-form').submit();
  })
})
</script>


@endsection