@foreach($contratos as $contrato)
    <div class="checkbox {{(($contrato->hasFacturaByFecha($fecha->year, $fecha->month))?"bg-gray":"")}}">
        <label>
            <input name="contratos-checkbox" type="checkbox"
            {{(($contrato->hasFacturaByFecha($fecha->year, $fecha->month))?"disabled":"")}}
            value="{{$contrato->nContrato}}"
            autocomplete="off"
            data-monto="{{($contrato->montoTipo=="Mensual")?$contrato->monto:$contrato->monto/12}}"
            data-fecha-control-contrato="{{$fecha->format('d/m/Y')}}"
            data-finicio="{{$fecha->format('d/m/Y')}}"
            data-ffin="{{$fecha->copy()->addMonth()->format('d/m/Y')}}"
            data-today="{{$today->format('d/m/Y')}}"
            data-concepto_id="{{$contrato->concepto_id}}"
            data-concepto-iva="{{$contrato->concepto->iva}}"
            data-cliente_id="{{$contrato->cliente_id}}"
            data-cliente_codigo="{{$contrato->cliente->codigo}}"
            data-cliente_nombre="{{$contrato->cliente->nombre}}"
            data-contrato_id="{{$contrato->id}}"
            > {{$contrato->nContrato}} | {{$contrato->cliente->codigo}} |  {{$contrato->cliente->nombre}} | Bs. {{$traductor->format(($contrato->montoTipo=="Mensual")?$contrato->monto:$contrato->monto/12)}} 

        </label>
    </div>
@endforeach