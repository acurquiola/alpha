    <div class="col-md-12 consulta">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">TAQUILLA</h3>
                    </div>
                    <div class="col-md-offset-4 col-md-2 text-right">
                        <span class="pull-right">Fecha: {{$fecha}}</span>
                    </div>
                </div>


            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <form data-url="{{action('TasaController@postSupervisor')}}" data-is-supervisor="true">
                    <input type="hidden" name="fecha" value="{{$fecha}}">
                    <input type="hidden" name="taquilla" value="{{$taquilla}}">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="serie-table">
                            <tbody>
                                @if(count($tasaOpsArray)==0 || count($serieTasas)==0)
                                    <tr><td colspan="{{ count($serieTasas)*5+2 }}" class="text-center">No se encontraron registros</td></tr>
                                @else                                 
                                    @foreach($tasaOpsArray as $taquilla => $tasaTaquillaOp)
                                        @foreach($tasaTaquillaOp as $turno)
                                            <tr>
                                                <th colspan="{{ count($serieTasas)*5+2 }}" style="min-width:100px;" class="text-center  bg-primary">TAQUILLA {{$turno->taquilla}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center  bg-primary"  rowspan="2" style="min-width:100px; vertical-align: middle">TURNO</th>
                                                @foreach($serieTasas as $serie => $serieTotal)
                                                    @if($serieTotal['taquilla'] == $turno->taquilla)
                                                        <th colspan="5" style="min-width:100px;" class="text-center  bg-primary">{{$serie}}</th>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach($serieTasas as $serie => $serieTotal)
                                                    @if($serieTotal['taquilla'] == $turno->taquilla)
                                                        <th class="text-right">DESDE</th>
                                                        <th class="text-right">HASTA</th>
                                                        <th class="text-right">COSTO</th>
                                                        <th class="text-right">CANTIDAD</th>
                                                        <th class="text-right">TOTAL</th>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>{{$turno->turno}}</td>
                                                @foreach($serieTasas as $serie => $serieTotal)
                                                    @foreach($turno->detalles as $detalle)
                                                        @if($detalle->serie == $serie )
                                                            <td class="text-right">
                                                                {{$detalle->inicio}}
                                                            </td>
                                                            <td class="text-right">
                                                                {{$detalle->fin}}
                                                            </td>
                                                            <td class="text-right">
                                                                {{$traductor->format($detalle->costo)}}
                                                            </td>
                                                            <td class="text-right">
                                                                {{$detalle->cantidad}}
                                                            </td>
                                                            <td class="text-right">
                                                                {{$traductor->format($detalle->total)}}
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        <tr class="bg-gray">
                                            <td colspan="1" class="text-left"><strong>TOTAL</strong></td>
                                            @foreach($serieTasas as $serie => $serieTotal)
                                                @foreach($turno->detalles as $detalle)
                                                    @if($detalle->serie == $serie)
                                                        <td colspan="4" class="text-right totales-cantidad">
                                                            {{$serieTotal['cantidad']}}
                                                        </td>
                                                        <td class="text-right totales-tasas">
                                                            {{$traductor->format($serieTotal['monto'])}}
                                                        </td>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                <h5>Formas de Pago</h5>
                @if(!$tasaCobro)
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <button type="button" class="btn btn-primary register-payment-btn"><span class="glyphicon glyphicon-plus"></span> Registrar Pago</button>
                    </div>
                </div>
                @endif
                <div class="table-responsive" style="margin-top:15px;margin-bottom:15px">
                    <table id="formas-pago-table" class="table table-condensed text-center">
                        <thead class="bg-primary">
                            <th>Fecha</th>
                            <th>Banco</th>
                            <th>Cuenta</th>
                            <th>Forma de Pago</th>
                            <th>#Depósito/#Lote</th>
                            <th>Monto</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @if($tasaCobro && $tasaCobro->detalles->count()>0)
                                @foreach($tasaCobro->detalles as $pago)
                                    <tr>
                                        <td>{{$pago->fecha}}</td>
                                        <td>{{$pago->banco->nombre}}</td>
                                        <td>{{$pago->cuenta->descripcion}}</td>
                                        <td>{{$pago->tipo}}</td>
                                        <td>{{$pago->ncomprobante}}</td>
                                        <td>{{$traductor->format($pago->monto)}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="total-a-pagar-doc-input" class="col-sm-2 control-label">Total a Cobrar</label>
                                <div class="col-sm-2">
                                    <input autocomplete="off" type="text" class="form-control total-a-pagar-doc-input" readonly value="0,00">
                                </div>
                                <label for="total-diferencia-doc-input" class="col-sm-2 control-label">Diferencia</label>
                                <div class="col-sm-2">
                                    <input autocomplete="off" type="text" class="form-control" id="total-diferencia-doc-input" readonly value="0,00">
                                </div>
                                <label for="total-a-depositar-doc-input" class="col-sm-2 control-label">Total Depositado</label>
                                <div class="col-sm-2">
                                    <input autocomplete="off" type="text" class="form-control" id="total-a-depositar-doc-input" readonly value="0,00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$tasaCobro)
                <div class="row">
                    <div class="col-md-6 col-md-offset-6 text-right">
                        <button type="button" class="consolidar-tasa-btn btn btn-success">Consolidar</button>
                    </div>
                </div>
                @endif
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    @if(!$tasaCobro)
        @foreach ($tasaOps as $tasa)
            @include('tasas.partials.taquillaForm', [
                'tasaOp'       => $tasa,
                'fecha'        => \Carbon\Carbon::createFromFormat('Y-m-d', $tasa->fecha)->format('d/m/Y'),
                'taquilla'     => $tasa->taquilla,
                'turno'        => $tasa->turno,
                'tasas'        => $tasas,
                'aeropuerto'   => $aeropuerto,
                'isSupervisor' => true
            ])
        @endforeach
    @endif