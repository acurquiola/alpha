@foreach($contratos as $contrato)
    <div class="checkbox">
        <label>
            <input type="checkbox"
            {{(($contrato->hasFacturaByFecha($fecha->year, $fecha->month))?"disabled":"")}}
            value="{{$contrato->nContrato}}"
            autocomplete="off"
            data-monto="{{($contrato->montoTipo=="Mensual")?$contrato->monto:$contrato->monto/12}}"
            data-fecha-control-contrato="{{$fecha->format('d/m/Y')}}"
            data-finicio="{{$fecha->day(($contrato->diaGeneracion!=0)?$contrato->diaGeneracion:1)->format('d/m/Y')}}"
            data-ffin="{{$fecha->addMonth()->format('d/m/Y')}}"
            data-concepto_id="{{$contrato->concepto_id}}"
            data-cliente_id="{{$contrato->cliente_id}}"
            data-contrato_id="{{$contrato->id}}"
            > {{$contrato->nContrato}} | {{$contrato->cliente->codigo}} | {{$contrato->cliente->nombre}}

        </label>
    </div>
@endforeach