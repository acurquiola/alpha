    <!-- left column -->
    <div class="col-md-12" id="operador-wrapper">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Tasas-taquilla</h3>
                    </div>
                    <div class="col-md-offset-4 col-md-2 text-right">
                        <span class="pull-right">Fecha: {{$fecha}}</span>
                    </div>
                </div>


            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <form>
                    <input type="hidden" name="fecha" value="{{$fecha}}">
                    <input type="hidden" name="taquilla" value="{{$taquilla}}">

                    <table class="table" id="serie-table">
                        <thead>
                            <th style="min-width:100px">Serie</th>
                            <th class="text-right">Desde</th>
                            <th class="text-right">Hasta</th>
                            <th style="min-width:100px">Cantidad</th>
                            <th class="text-right" style="min-width:150px">Monto</th>
                            <th class="text-right" style="min-width:150px">Total</th>
                            <th>Acción</th>

                        </thead>
                        <tbody>
                            @if($tasaOps->count()==0)
                                <h3 class="text-center">No se encontraron registros</h3>
                            @else
                                @foreach($tasaOps as $tasaOp)
                                    @foreach($tasaOp->detalles as $detalle)
                                        <tr>
                                            <td class="serie-td">
                                                <input type="hidden" name="serie[]" class="serie-val" value="{{$detalle->serie}}">
                                                <p class="form-control-static">Serie {{$detalle->serie}}</p>
                                            </td>
                                            <td>
                                                <input name="desde[]" class="form-control text-right desde-input" value="{{$detalle->inicio}}">
                                            </td>
                                            <td>
                                                <input name="hasta[]" class="form-control text-right hasta-input" value="{{$detalle->fin}}">
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-danger subtract-tasa" type="button">
                                                            <span class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                    </span>
                                                    <input name="cantidad[]" class="form-control  text-center cantidad-input" value="{{$detalle->cantidad}}">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary add-tasa" type="button">
                                                            <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="hidden" name="monto[]" class="serie-val" value="{{$detalle->costo}}">
                                                <p class="form-control-static text-right bs-input">{{$detalle->costo}}</p>
                                            </td>
                                            <td>
                                                <p class="form-control-static text-right monto-input">{{$detalle->total}}</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete-serie-btn">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 ">
                            <button type="button" id="save-tasa-btn" class="btn btn-primary">Consolidar</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>