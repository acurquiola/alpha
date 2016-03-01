    <!-- left column -->
    <div class="col-md-12" id="operador-wrapper">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Tasas-taquilla</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        <span class="pull-right">Taquilla: {{$taquilla}} </span>
                    </div>
                    <div class="col-md-2 text-right">
                        <span class="pull-right">Turno: {{$turno}}</span>
                    </div>
                    <div class="col-md-2 text-right">
                        <span class="pull-right">Fecha: {{$fecha}}</span>
                    </div>
                </div>


            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">

                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="turno-input" class="control-label col-md-2">Serie</label>
                        <div class="col-md-2">
                            <select class="form-control" id="serie-select" autocomplete="off">
                                <option value="A" {{($tasaOp->detalles->whereLoose('serie', "A")->first())?"disabled":""}} data-inicio="{{$series["A"]}}">Serie A</option>
                                <option value="B" {{($tasaOp->detalles->whereLoose('serie', "B")->first())?"disabled":""}} data-inicio="{{$series["B"]}}">Serie B</option>
                                <option value="C" {{($tasaOp->detalles->whereLoose('serie', "C")->first())?"disabled":""}} data-inicio="{{$series["C"]}}">Serie C</option>
                                <option value="D" {{($tasaOp->detalles->whereLoose('serie', "D")->first())?"disabled":""}} data-inicio="{{$series["D"]}}">Serie D</option>
                            </select>
                        </div>
                        <label for="turno-input" class="control-label col-md-2">Monto</label>
                        <div class="col-md-2">
                            <input class="form-control" id="monto-input">
                        </div>
                        <div class="col-md-2 col-md-offset-2 text-right">
                            <button type="button" class="btn btn-primary btn-block" id="add-serie-btn"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                </div>
                <form>
                    <input type="hidden" name="fecha" value="{{$fecha}}">
                    <input type="hidden" name="taquilla" value="{{$taquilla}}">
                    <input type="hidden" name="turno" value="{{$turno}}">

                    <table class="table" id="serie-table">
                        <thead>
                            <th style="min-width:100px">Serie</th>
                            <th class="text-right">Desde</th>
                            <th class="text-right">Hasta</th>
                            <th style="min-width:100px">Cantidad</th>
                            <th class="text-right" style="min-width:150px">Monto</th>
                            <th class="text-right" style="min-width:150px">Total</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 ">
                            @if($tasaOp->consolidado!=true)
                                <button type="button" id="save-tasa-btn" class="btn btn-primary">Guardar</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>