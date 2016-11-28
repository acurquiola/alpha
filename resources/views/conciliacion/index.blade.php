@extends('app')

@section('content')

<ol class="breadcrumb">
    <li><a href="{{url('principal')}}">Inicio</a></li>
    <li><a class="active">Conciliación Bancaria</a></li>
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
                <div class="form-inline">
                    <div class="form-group">
                        <select class="form-control search-parm-select" id="year-select" autocomplete="off">
                            <option value="" >Seleccione Banco</option>
                            <option value="2015" >Banco Bicentenario</option>
                            <option value="2016" >Banco Caroní</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control search-parm-select" id="month-select" autocomplete="off">
                            <option value="">Seleccione Cuenta</option>
                            <option value="01">0175XXXXXXXXXXXXXX</option>
                            <option value="01">0175XXXXXXXXXXXXXX</option>
                            <option value="01">0175XXXXXXXXXXXXXX</option>
                            <option value="01">0175XXXXXXXXXXXXXX</option>
                            <option value="01">0175XXXXXXXXXXXXXX</option>
                        </select>
                    </div>
                    <div class="form-group">
                            <input class="form-control " id="month-select" autocomplete="off" placeholder="Fecha" />
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="active-input">Nro Referencia</label>
                            <input class="form-control " id="month-select" autocomplete="off"  placeholder="Nro de Referencia/Lote" />
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body" >
                <div class="row">
                    <div class="col-xs-12">

                        <div class="col-md-8">
                            <label for="Femision-input"><b>SELECCIONE LOS MOVIMIENTOS A CONCILIAR</b></label>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-success" id="select-all-btn">Seleccionar todos</button>
                        </div>
                        <div class="col-md-8" id="movimientos-checkbox" >
                            
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="contratos-checkbox" type="checkbox">
                                    Fecha | Nombre Banco | Número Cuenta | Número de Referencia | Monto 
                                </label>
                            </div>
                            
                        </div>

                        <div class="col-md-8" style="margin-top: 20px">
                            <label>
                                <b>INFORMACIÓN A APLICAR</b>
                            </label>
                        </div>
                        <div class="col-md-8" style="margin-top: 20px; margin-left: 25px">
                            
                            <div class="form-inline">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="fecha" id="fecha" placeholder="Fecha">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="porcentaje_deducido" id="fecha" placeholder="% deducido">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="generar-btn">Generar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body" >
                <div class="row">

                    <div class="col-xs-12">

                        <table class="table" >
                            <thead>
                                <th>Fecha</th>
                                <th>Banco</th>
                                <th>Nro. Cuenta</th>
                                <th>Nro. Ref/Lote</th>
                                <th>Porc. Deducido</th>
                                <th>Deducción</th>
                                <th>Monto Mov.</th>
                                <th>Monto final</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                            </tbody>



                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        
        $(document).ready(function(){
            

            $('#select-all-btn').click(function(){
                var $unCheckedChecks=$('#movimientos-checkbox [type=checkbox]:not(:disabled):not(:checked)');
                console.log($unCheckedChecks);
                if($unCheckedChecks.length==0)
                    $('#movimientos-checkbox [type=checkbox]:not(:disabled)').iCheck('uncheck');
                else
                    $('#movimientos-checkbox [type=checkbox]:not(:disabled)').iCheck('check');

            });
        })
    </script>
@endsection