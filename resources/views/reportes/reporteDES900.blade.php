@extends('app')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a class="active">DES900</a></li>
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

            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                   {!! Form::open(["url" => action("ReporteController@postExportReport"), "id" =>"export-form", "target"=>"_blank"]) !!}
                    {!! Form::hidden('table') !!}
                    <h3 class="box-title">Reporte</h3>
                    <span class="pull-right"><button type="button" class="btn btn-primary" id="export-btn"><span class="glyphicon glyphicon-file"></span> Exportar</button></span>
                    {!! Form::close() !!}
                </div>
                <div class="box-body" >
                    <div class="row">
                        <div class="col-xs-12">

                        <div class="table-responsive" style="max-height: 500px">
                         <table class="table table-hover table-condensed">
                         <thead  class="bg-primary">
                            <tr>
                                 <th colspan="4" rowspan="2" style="vertical-align: middle" class="text-center">GENERAL</th>
                                 <th colspan="7" style="vertical-align: middle" class="text-center">ATERRIZAJE</th>
                                 <th colspan="7" style="vertical-align: middle" class="text-center">DESPEGUE</th>
                            </tr>
                            <tr>
                                 <th colspan="5"></th>
                                 <th colspan="2" class="text-center">Pasajeros</th>
                                 <th colspan="5"></th>
                                 <th colspan="2" class="text-center">Pasajeros</th>
                            </tr>
                            <tr>
                                <th >Día</th>
                                <th >N° Dosa</th>
                                <th >Modelo</th>
                                <th >Matrícula</th>

                                <th >Piloto</th>
                                <th >N°Vuelo</th>
                                <th >Fecha</th>
                                <th >Hora</th>
                                <th >Procedencia</th>
                                <th >Desembarque</th>
                                <th >Tránsito</th>

                                <th >Piloto</th>
                                <th >N°Vuelo</th>
                                <th >Fecha</th>
                                <th >Hora</th>
                                <th >Procedencia</th>
                                <th >Desembarque</th>
                                <th >Tránsito</th>
                            </tr>

                         </thead>
                        <tbody>

                            @foreach($despegues as $despegue)
                            <tr title="{{$despegue->fecha}}">
                                <td>{{$despegue->fecha}}</td>
                                <td>{{($despegue->factura)?$despegue->factura->nroDosa:"N/A"}}</td>
                                <td>{{$despegue->aterrizaje->aeronave->modelo->modelo}}</td>
                                <td>{{$despegue->aterrizaje->aeronave->matricula}}</td>
                                <td>{{($despegue->aterrizaje->piloto)?$despegue->aterrizaje->piloto->nombre:"N/A"}}</td>
                                <td>{{($despegue->aterrizaje->num_vuelo)?$despegue->aterrizaje->num_vuelo:"N/A"}}</td>
                                <td>{{$despegue->aterrizaje->fecha}}</td>
                                <td>{{$despegue->aterrizaje->hora}}</td>
                                <td>{{($despegue->aterrizaje->puerto)?$despegue->aterrizaje->puerto->nombre:"N/A"}}</td>
                                <td>{{$despegue->aterrizaje->desembarqueAdultos+$despegue->aterrizaje->desembarqueInfante+$despegue->aterrizaje->desembarqueTercera}}</td>
                                <td>{{$despegue->aterrizaje->desembarqueTransito}}</td>
                                <td>{{($despegue->piloto)?$despegue->piloto->nombre:"N/A"}}</td>
                                <td>{{($despegue->num_vuelo)?$despegue->num_vuelo:"N/A"}}</td>
                                <td>{{$despegue->fecha}}</td>
                                <td>{{$despegue->hora}}</td>
                                <td>{{($despegue->puerto)?$despegue->puerto->nombre:"N/A"}}</td>
                                <td>{{$despegue->embarqueAdultos+$despegue->embarqueInfante+$despegue->embarqueTercera}}</td>
                                <td>{{$despegue->transitoAdultos+$despegue->transitoInfante+$despegue->transitoTercera}}</td> 
                                
                            </tr>
                            @endforeach
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



    $('#export-btn').click(function(e){
        var table=$('table').clone();
        $(table).find('td, th').filter(function() {
          return $(this).css('display') == 'none';
        }).remove();
        $(table).find('tr').filter(function() {
          return $(this).find('td,th').length == 0;
        }).remove();
        var tableHtml= $(table)[0].outerHTML;
        $('[name=table]').val(tableHtml);
        $('#export-form').submit();
    })
});
</script>

@endsection