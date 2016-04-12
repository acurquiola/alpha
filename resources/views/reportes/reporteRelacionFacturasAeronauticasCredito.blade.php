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
            <div class="box-body text-right">
                {!! Form::open(["url" => action('ReporteController@getReporteRelacionFacturasAeronauticasCredito'), "method" => "GET", "class"=>"form-inline"]) !!}
                <div class="form-group">
                    <label>AEROPUERTO:</label>
                      {!! Form::select('aeropuerto', $aeropuertos, $aeropuerto, ["class"=> "form-control"]) !!}
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
                <button type="submit" class="btn btn-default">Buscar</button>
                <a class="btn btn-default" href="{{action('ReporteController@getReporteRelacionFacturasAeronauticasCredito')}}">Reset</a>
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
                                        <th class="text-center">Cliente</th>
                                        <th class="text-center">Nro. Recibo Caja</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Nro. Dosa</th>
                                        <th class="text-center">Formulario</th>
                                        <th class="text-center">Aterrizaje/Despegue</th>
                                        <th class="text-center">Estacionamiento</th>
                                        <th class="text-center">Habilitación</th>
                                        <th class="text-center">Jetway</th>
                                        <th class="text-center">Carga</th>
                                        <th class="text-center">Monto Factura</th>
                                        <th class="text-center">Monto Depósito</th>
                                        <th class="text-center">Fecha Depósito</th>
                                    </tr>
                                <tbody>
                                    @foreach($dosaFactura as $index => $df)
                                    <tr align="center">
                                        <td>{{$df['cliente']}}</td>
                                        <td>
                                        </td>                           
                                        <td>{{$df['fecha']}}</td>                               
                                        <td>{{$index}}</td>                               
                                        <td>{{($df['formularioBs'])}}</td>                               
                                        <td>{{$df['aterrizajeBs']}}</td>                               
                                        <td>{{$df['estacionamientoBs']}}</td>                               
                                        <td>{{$df['habilitacionBs']}}</td>                               
                                        <td>{{$df['jetwayBs']}}</td>                               
                                        <td>{{$df['cargaBs']}}</td>                               
                                        <td> </td>                               
                                        <td> </td>                               
                                        <td> </td>                                 
                                    </tr>                                    
                                    @endforeach
                                    <tr class="bg-gray" align="center">
                                        <td>Total</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td>0,00</td>                                 
                                        <td>0,00</td>                                 
                                        <td>0,00</td>                                 
                                        <td>0,00</td>                                 
                                        <td>0,00</td>                                 
                                        <td>0,00</td>                                 
                                        <td>0,00</td>                                 
                                        <td> - </td>                                 
                                        <td> - </td>                                 
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