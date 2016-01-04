@foreach($contratos as $contrato)
    <div class="checkbox">
        <label>
            <input type="checkbox"
            value="{{$contrato->nContrato}}"
            autocomplete="off"
            data-monto="{{($contrato->montoTipo=="Mensual")?$contrato->monto:$contrato->monto/12}}"
            data-finicio="{{\Carbon\Carbon::now()->format('d/m/Y')}}"
            data-ffin="{{\Carbon\Carbon::now()->addMonth()->format('d/m/Y')}}"
            data-concepto_id="{{$contrato->concepto_id}}"
            data-cliente_id="{{$contrato->cliente_id}}"
            data-contrato_id="{{$contrato->contrato_id}}"
            {{($contrato->factura)?"disabled":""}}> {{$contrato->nContrato}} | {{$contrato->cliente->codigo}} | {{$contrato->cliente->nombre}}

        </label>
    </div>
@endforeach