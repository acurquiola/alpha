@extends('app')

@section('content')
    <div class="row" id="box-wrapper">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Tasas supervisor</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" id="taquilla-input">
                                <option value="TQ">Regulares</option>
                                <option value="CV">Control de vuelo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="form-group" id="dia-div">
                                    <div class="col-xs-8 col-xs-offset-2  text-center">
                                        <div class="input-group">
                                            <input type="text" id="dia-datepicker" class="form-control" placeholder="Seleccione un dia." autocomplete="off">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-default pull-right" id="date-select-panel-btn" data-url="{{action('TasaController@getSupervisorOperacion')}}"><span class="hidden-sm">Aceptar</span> <span class="glyphicon glyphicon-share-alt"></span></button>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div id="consultas_wrapper">
        </div>
    </div>

    <div class="modal fade" id="register-payment-modal" tabindex="-1" role="dialog" aria-labelledby="register-payment-modal" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancelar</span></button>
                    <h4 class="modal-title">Registrar una forma de pago</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="forma-modal-input" class="col-sm-2 control-label">Forma de pago</label>
                            <div class="col-md-10">
                                <select class="form-control" id="forma-modal-input">
                                    <option>Deposito</option>
                                    <option>Nota de credito</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha-modal-input" class="col-sm-2 control-label">Fecha</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="fecha-modal-input" autocomplete='off'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="banco-modal-input" class="col-sm-2 control-label">Banco</label>
                            <div class="col-md-10">
                                <select id="banco-modal-input" class="form-control">
                                    <option>Banco 1</option>
                                    <option>Banco 2</option>
                                    <option>Banco 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cuenta-modal-input" class="col-sm-2 control-label">Cuenta</label>
                            <div class="col-md-10">
                                <select id="cuenta-modal-input" class="form-control">
                                    <option>000-000-0-0-0-0000-0000-00</option>
                                    <option>000-000-0-0-0-0000-0000-00</option>
                                    <option>000-000-0-0-0-0000-0000-00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deposito-modal-input" class="col-sm-2 control-label">#Deposito/#Lote</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="deposito-modal-input" autocomplete='off'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="acta-modal-input" class="col-sm-2 control-label">Acta</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="acta-modal-input" autocomplete='off' readonly value="000000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="monto-modal-input" class="col-sm-2 control-label">Monto</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="monto-modal-input" autocomplete='off'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="delete-modal-btn">Aceptar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script>
        @include('tasas.partials.script')

    </script>

@endsection
