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
                                <option value="A" data-inicio="{{$series["A"]}}">Serie A</option>
                                <option value="B" data-inicio="{{$series["B"]}}">Serie B</option>
                                <option value="C" data-inicio="{{$series["C"]}}">Serie C</option>
                                <option value="D" data-inicio="{{$series["D"]}}">Serie D</option>
                            </select>
                        </div>
                        <label for="turno-input" class="control-label col-md-2">Monto</label>
                        <div class="col-md-2">
                            <input class="form-control" id="monto-input">
                        </div>
                        <div class="col-md-2 col-md-offset-2 text-right">
                            <button class="btn btn-primary btn-block" id="add-serie-btn"><span class="glyphicon glyphicon-plus"></span></button>
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
                            <th class="text-right" style="min-width:150px">Sub-total</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @for(;false;)
                                <tr>
                                    <td class="serie-td">
                                        <p class="form-control-static">Serie A</p>
                                    </td>
                                    <td>
                                        <input class="form-control desde-input" value="1" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control hasta-input" autocomplete="off">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger subtract-tasa" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                                            </span>
                                            <input class="form-control cantidad-input" value="0" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary add-tasa" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="form-control-static bs-input">80</p>
                                    </td>
                                    <td>
                                        <p class="form-control-static monto-input">0</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete-serie-btn"><span class="glyphicon glyphicon-minus"></span></button>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 ">
                            <button id="save-tasa-btn" class="btn btn-primary">Guardar</button>
                        </div>
                        <div class="col-md-5 text-right">
                            <label>Total</label>
                            <span id="tasas-total">0</span>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>