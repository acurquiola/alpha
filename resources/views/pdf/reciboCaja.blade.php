<table  style="width:100%; border-collapse: collapse; padding:2px; font-size: 8px">
<tr>
<td  colspan="7">
</td>
<td  colspan="3">
</td>
</tr>
<tr>
<td  colspan="8">
</td>
<td  colspan="2">
<strong>FECHA: </strong> {{$cobro->fecha}}
</td>
</tr>
<tr>
<td  colspan="7">
</td>
<td  colspan="3">
</td>
</tr>
<tr>
<td  colspan="7">
</td>
<td  colspan="3">
</td>
</tr>
</table>
<br>
<br>


<table style="width:100%; border-collapse: collapse; padding:2px; font-size: 8px">
<tr>
<td  colspan="7">
<strong>NRO. COBRO:</strong> {{$cobro->id}}
</td>
<td  colspan="3" class="pull-right">
<strong>MONTO:</strong> {{$traductor->format($cobro->montodepositado)}}
</td>
</tr>
<tr>
<td  colspan="7">
<strong>HEMOS RECIDO DE:</strong> {{$cobro->cliente->nombre}}
</td>
</tr>
<tr>
<td  colspan="7">
<strong>LA CANTIDAD DE:</strong> {{$traductor->numtoletras($cobro->montodepositado)}}
</td>
</tr>
<tr>
<td  colspan="7">
<strong>POR CONCEPTO DE:</strong> {{$cobro->observacion}}
</td>
</tr>
</table>

<br>
<br>
<br>
<table>
<tr>
<td colspan="2" style="border-bottom: 1px solid black; text-align:center">
<strong>FORMA DE PAGO</strong>
</td>
<td colspan="2" style="border-bottom: 1px solid black; text-align:center">
<strong>MONTO</strong>
</td>
<td colspan="2" style="border-bottom: 1px solid black; text-align:center">
<strong>REF</strong>
</td>
<td colspan="5" style="border-bottom: 1px solid black; text-align:center">
<strong>BANCO</strong>
</td>
<td colspan="4" style="border-bottom: 1px solid black; text-align:center">
<strong>CUENTA</strong>
</td>
<td colspan="2" style="border-bottom: 1px solid black; text-align:center">
<strong>FECHA</strong>
</td>
</tr>
<tr>
<td colspan="2" >
</td>
<td colspan="2" >
</td>
<td colspan="2">
</td>
<td colspan="2" >
</td>
<td colspan="2" >
</td>
<td colspan="2" >
</td>
</tr>
@foreach($cobro->pagos as $index => $pago)
<tr>
<td colspan="2" style=" text-align:center; font-size: 7px" >
{{$pago->tipo}}
</td>
<td colspan="2" style="text-align:right; font-size: 7px" >
{{$traductor->format($pago->monto)}}
</td>
<td colspan="2"  style="text-align:center; font-size: 7px">
{{$pago->ncomprobante}}
</td>
<td colspan="5" style="text-align:center; font-size: 7px">
{{$pago->banco->nombre}}
</td>
<td colspan="4" style="text-align:center; font-size: 7px">
{{$pago->cuenta->descripcion}}
</td>
<td colspan="2" style="text-align:center; font-size: 7px">
{{$pago->fecha}}
</td>
</tr>
@endforeach
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="5">
<strong></strong>
</td>
<td  colspan="5">
</td>
</tr>
<tr>
<td  colspan="5"  >
</td>
<td colspan="1"></td>
<td  colspan="4" style="border-top: 1px solid black;">
<strong>RECIBE CONFORME</strong>
</td>
</tr>
</table>
