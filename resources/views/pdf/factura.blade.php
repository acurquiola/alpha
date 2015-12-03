<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="8">
</td>
<td  colspan="2">
<strong>FACTURA:</strong> {{$factura->nFactura}}
</td>
</tr>
<tr>
<td  colspan="8">
</td>
<td  colspan="2">
<strong>FECHA:</strong> {{$factura->fecha}}
</td>
</tr>
</table>

<br>
<br>
<br>

<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="8">
<strong>CLIENTE:</strong> {{$factura->cliente->nombre}}
</td>
</tr>
<tr>
<td  colspan="4">
<strong>DIRECCIÓN FISCAL:</strong> {{$factura->cliente->direccion}}
</td>
<td  colspan="2">
<strong>RIF:</strong> {{$factura->cliente->rif}}
</td>
<td  colspan="2">
<strong>NIT:</strong> {{$factura->cliente->nit}}
</td>
</tr>
<tr>
<td  colspan="4">
<strong>TELÉFONO:</strong> {{$factura->cliente->telefono}}
</td>
<td  colspan="4">
<strong>CONDICIÓN DE PAGO:</strong> {{$factura->condicionPago}}
</td>
</tr>
</table>

<br>
<br>
<br>

<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="2">
<strong>Código</strong>
</td>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="6">
<strong>Concepto</strong>
</td>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="2">
<strong>Monto</strong>
</td>
</tr>
@foreach($factura->detalles as $detalle)
<tr>
<td colspan="2" >
{{$detalle->concepto->codpre}}
</td>
<td colspan="6" >
{{$detalle->concepto->nompre}}
</td>
<td colspan="2" >
{{$detalle->totalDes}}
</td>
</tr>
@endforeach

<tr> <td colspan="10">
@for($i=0; $i<34-$factura->detalles->count();$i++)
<br>
@endfor
</td></tr>
<tr><td colspan="10" style="border-bottom: 1px solid black;"></td></tr>
<tr>
<td colspan="8" >
</td>
<td colspan="2" >
{{$factura->subtotal}}
</td>
</tr>
<tr>
<td colspan="6" >
</td>
<td colspan="2" >
<strong>IVA</strong> {{$factura->iva}}
</td>
<td colspan="2" >
{{$factura->iva*$factura->subtotal/100}}
</td>
</tr>
<tr>
<td colspan="6" >
</td>
<td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;">
<strong>TOTAL GENERAL</strong>
</td>
<td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-right: 1px solid black;text-align:left" >
{{$factura->total}}
</td>
</tr>
</table>
