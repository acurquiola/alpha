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

                    <table class="table table-bordered" id="serie-table">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2" style="min-width:100px; vertical-align: middle">Taquilla</th>
                                <th class="text-center"  rowspan="2" style="min-width:100px; vertical-align: middle">Turno</th>
                                @foreach($serieTasas as $serie => $serieTotal)
                                    <th colspan="5" style="min-width:100px;" class="text-center">{{$serie}}</th>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach($serieTasas as $serie => $serieTotal)
                                    <th class="text-right">Desde</th>
                                    <th class="text-right">Hasta</th>
                                    <th class="text-right">Costo</th>
                                    <th class="text-right">Cantidad</th>
                                    <th class="text-right">Total</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($tasaOps)==0 || count($serieTasas)==0)
                                <h3 class="text-center">No se encontraron registros</h3>
                            @else
                                @foreach($tasaOps as $taquilla => $tasaTaquillaOp)
                                    @foreach($tasaTaquillaOp as $turno)
                                        <tr>
                                            <td>{{$turno->taquilla}}</td>
                                            <td>{{$turno->turno}}</td>
                                            @foreach($serieTasas as $serie => $serieTotal)
                                                @foreach($turno->detalles as $detalle)
                                                    @if($detalle->serie == $serie)
                                                        <td class="text-right">
                                                            {{$detalle->inicio}}
                                                        </td>
                                                        <td class="text-right">
                                                            {{$detalle->fin}}
                                                        </td>
                                                        <td class="text-right">
                                                            {{$detalle->costo}}
                                                        </td>
                                                        <td class="text-right">
                                                            {{$detalle->cantidad}}
                                                        </td>
                                                        <td class="text-right">
                                                            {{$detalle->total}}
                                                        </td>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><strong>Totales</strong></td>
                                @foreach($serieTasas as $serie => $serieTotal)
                                    @foreach($turno->detalles as $detalle)
                                        @if($detalle->serie == $serie)
                                            <td colspan="5" class="text-right">
                                                {{$serieTotal}}
                                            </td>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tr>
                        </tfoot>
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