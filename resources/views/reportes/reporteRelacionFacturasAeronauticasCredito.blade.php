@extends('app')

@section('content')

<ol class="breadcrumb">
    <li><a href="{{url('principal')}}">Inicio</a></li>
    <li><a class="active">Relación de Facturas Aeronáuticas Crédito</a></li>
</ol>
<div class="row" id="box-wrapper">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Filtros</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div>
            <div class="box-body">
                {!! Form::open(["url" => action('ReporteController@getReporteRelacionFacturasAeronauticasCredito'), "method" => "GET", "class"=>"form-inline"]) !!}
                <div class="form-group ">
                    <label>AEROPUERTO:</label>
                      {!! Form::select('aeropuerto_id', $aeropuertos, $aeropuerto, ["class"=> "form-control select-flt"]) !!}
                </div>
                <div class="form-group">
                
                    <label>CLIENTE:</label>
                      {!! Form::select('cliente_id', $clientes, $cliente, ["class"=> "form-control select-flt"]) !!}
                </div>
                <br>
                <label><strong>DESDE: </strong></label>
                <div class="form-group">
                    <input type="text" class="form-control" name="diaDesde" value="{{$diaDesde}}" placeholder="Día">
                </div>
                <div class="form-group">
                      {!! Form::select('mesDesde', $meses, $mesDesde, ["class"=> "form-control"]) !!}
                </div>
                <div class="form-group">
                      {!! Form::select('annoDesde', $annos, $annoDesde, ["class"=> "form-control"]) !!}
                </div>
                <label style="margin-left: 20px"><strong>HASTA: </strong></label>
                <div class="form-group">
                    <input type="text" class="form-control" name="diaHasta" value="{{$diaHasta}}"placeholder="Día">
                </div>
                <div class="form-group">
                      {!! Form::select('mesHasta', $meses, $mesHasta, ["class"=> "form-control"]) !!}
                </div>
                <div class="form-group">
                      {!! Form::select('annoHasta', $annos, $annoHasta, ["class"=> "form-control"]) !!}
                </div>
                <br>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" >Buscar</button>
                    <a class="btn btn-default text-right" href="{{action('ReporteController@getReporteRelacionFacturasAeronauticasCredito')}}">Reset</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                {!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
                {!! Form::hidden('table') !!}
                {!! Form::hidden('departamento', $departamento) !!}
                {!! Form::hidden('gerencia', $gerencia) !!}
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
                            <table  class="table table-condensed">
                                    <tr class="bg-primary" >
                                        <th rowspan="2" colspan="2" class="text-center">CLIENTE</th>
                                        <th colspan="3"class="text-center" style="width: 80px;">COBRO</th>
                                        <th colspan="9" class="text-center">DOSA</th>
                                        <th colspan="3"class="text-center">DEPÓSITO</th>
                                    </tr>
                                    <tr class="bg-primary" >
                                        <th class="text-center" style="width: 30px;">Nro.</th>
                                        <th class="text-center" style="width: 30px;">Rec. Caja</th>
                                       
                                        <th class="text-center" style="width: 40px;">Fecha</th>
                                        <th class="text-center" style="width: 40px;">Nro.</th>
                                        <th class="text-center" style="width: 45px;">Formulario(Bs.)</th>
                                        <th class="text-center" style="width: 45px;">Aterrizaje (Bs.)</th>
                                        <th class="text-center" style="width: 67px;">Estacionamiento (Bs.)</th>
                                        <th class="text-center" style="width: 60px;">Habilitación (Bs.)</th>
                                        <th class="text-center" style="width: 50px;">Jetway (Bs.)</th>
                                        <th class="text-center" style="width: 50px;">Carga (Bs.)</th>
                                        <th class="text-center" style="width: 50px;">Otros(Bs.)</th>
                                        <th class="text-center" style="width: 70px;">Total (Bs.)</th>

                                        <th class="text-center">Ref.</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Monto (Bs.)</th>
                                    </tr>
                                <tbody>
                                    @foreach($dosaFactura as $index => $df)
                                    <tr align="center">
                                        <td class="text-left" align="left" colspan="2">{{$df['cliente']}}</td> 

                                        <td class="text-center" align="center">{{$df['nCobro']}}</td>                         
                                        <td class="text-center" align="center">{{$df['reciboCaja']}}</td>                         
                                        <td class="text-center" align="center">{{$df['fecha']}}</td>  

                                        <td class="text-center" align="center">{{$index}}</td>                               
                                        <td class="text-right formularioBs" align="right">{{$traductor->format($df['formularioBs'])}}</td>                               
                                        <td class="text-right aterrizajeBs" align="right">{{$traductor->format($df['aterrizajeBs'])}}</td>                               
                                        <td class="text-right estacionamientoBs" align="right">{{$traductor->format($df['estacionamientoBs'])}}</td>                               
                                        <td class="text-right habilitacionBs" align="right">{{$traductor->format($df['habilitacionBs'])}}</td>                               
                                        <td class="text-right jetwayBs" align="right">{{$traductor->format($df['jetwayBs'])}}</td>                               
                                        <td class="text-right cargaBs" align="right">{{$traductor->format($df['cargaBs'])}}</td>                               
                                        <td class="text-right otrosCargosBs" align="right">{{$traductor->format($df['otrosCargosBs'])}}</td>                               
                                        <td class="text-right totalDosa" align="right">{{$traductor->format($df['totalDosa'])}}</td> 

                                        <td>{{$df['refBancaria']}}</td>   
                                        <td>{{$df['fechaDeposito']}}</td>                               
                                        <td class="text-right totalDepositado" align="right">{{$traductor->format($df['totalDepositado'])}}</td>                               
                                    </tr>                                    
                                    @endforeach
                                    <tr class="bg-gray" align="center">
                                        <td colspan="2">Total</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td align="right" id="totalFormulario">0,00</td>                           
                                        <td align="right" id="totalAterrizaje">0,00</td>                           
                                        <td align="right" id="totalEstacionamiento">0,00</td>                           
                                        <td align="right" id="totalHabilitacion">0,00</td>                           
                                        <td align="right" id="totalJetway">0,00</td>                           
                                        <td align="right" id="totalCarga">0,00</td>                           
                                        <td align="right" id="totalOtrosCargos">0,00</td>                           
                                        <td align="right" id="totalDosa">0,00</td>                           
                                        <td> - </td>                                 
                                        <td> - </td>                                 
                                        <td align="right" id="totalTotal">0,00</td>                           
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

        //Por Aeropuerto
        var totalFormulario=0;
        $('.formularioBs').each(function(index,value){
            totalFormulario+=commaToNum($(value).text().trim());
        });

        var totalAterrizaje=0;
        $('.aterrizajeBs').each(function(index,value){
            totalAterrizaje+=commaToNum($(value).text().trim());
        });


        var totalEstacionamiento=0;
        $('.estacionamientoBs').each(function(index,value){
            totalEstacionamiento+=commaToNum($(value).text().trim());
        });

        var totalHabilitacion=0;
        $('.habilitacionBs').each(function(index,value){
            totalHabilitacion+=commaToNum($(value).text().trim());
        });

        var totalJetway=0;
        $('.jetwayBs').each(function(index,value){
            totalJetway+=commaToNum($(value).text().trim());
        });

        var totalCarga=0;
        $('.cargaBs').each(function(index,value){
            totalCarga+=commaToNum($(value).text().trim());
        });

        var totalOtrosCargos=0;
        $('.otrosCargosBs').each(function(index,value){
            totalOtrosCargos+=commaToNum($(value).text().trim());
        });

        var totalTotal=0;
        $('.totalDosa').each(function(index,value){
            totalTotal+=commaToNum($(value).text().trim());
        });

        $('#totalFormulario').text(numToComma(totalFormulario));
        $('#totalAterrizaje').text(numToComma(totalAterrizaje));
        $('#totalEstacionamiento').text(numToComma(totalEstacionamiento));
        $('#totalHabilitacion').text(numToComma(totalHabilitacion));
        $('#totalJetway').text(numToComma(totalJetway));
        $('#totalCarga').text(numToComma(totalCarga));
        $('#totalOtrosCargos').text(numToComma(totalOtrosCargos));
        $('#totalTotal').text(numToComma(totalTotal));


        $('.select-flt').chosen({width:'400px'});


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
                                    <th colspan="17" style="vertical-align: middle; margin-top:20px" align="center" class="text-center">RELACIÓN DE FACTURAS AERONÁUTICAS CRÉDITO\
                                        </br>\
                                        AEROPUERTO: {{$aeropuertoNombre}} | CLIENTE: {{($cliente==0)?"TODOS":$cliente}}\
                                    </th>\
                                </tr>\
                            </thead>')
                $(table).find('thead, th').css({'border-top':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
                $(table).find('th').css({'border-bottom':'1px solid black', 'font-weight': 'bold', 'text-align':"center", 'font-size': '7px'})
                $(table).find('td').css({'font-size': '6px'})
                $(table).find('tr:nth-child(even)').css({'background-color': '#E2E2E2'})
                $(table).find('tr:last td').css({'border-bottom':'1px solid black','border-top':'1px solid black', 'font-weight': 'bold'})
                var tableHtml= $(table)[0].outerHTML;
                $('[name=table]').val(tableHtml);
                $('#export-form').submit();
        })

    })
</script>


@endsection