<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="8">
</td>
<td  colspan="2">
<strong>FACTURA:</strong> {{$factura->nFacturaPrefix}}-{{$factura->nFactura}}
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
<strong>TELÉFONO:</strong> {{$factura->cliente->telefonos}}
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
<strong>Nro.</strong>
</td>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="6">
<strong>Concepto</strong>
</td>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="2">
<strong>Monto (Bs.)</strong>
</td>
</tr>
@foreach($factura->detalles as $index => $detalle)
<tr>
<td colspan="2" >
{{$index + 1}}
</td>
<td colspan="6" >
{{$detalle->concepto->nompre}}
</td>
<td colspan="2" >
{{$traductor->format($detalle->totalDes)}}
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
Bs. {{$traductor->format($factura->subtotal)}}
</td>
</tr>
<tr>
<td colspan="6" >
</td>
<td colspan="2" >
<strong>IVA</strong> ({{$traductor->format($factura->iva*100)}}%)
</td>
<td colspan="2" >
{{$traductor->format($factura->iva*$factura->subtotal)}}
</td>
</tr>
<tr>
<td colspan="6" >
</td>
<td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;">
<strong>TOTAL GENERAL</strong>
</td>
<td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-right: 1px solid black;text-align:left" >
<strong>Bs. </strong>{{number_format($factura->total,2)}}
</td>
</tr>
<tr>
<td colspan="6" >
MONTO EN LETRAS:
</td>
<td colspan="4">
</td>
</tr>
<tr>
<td colspan="6" >
SON: {{$traductor->numtoletras($factura->total)}}
</td>
<td colspan="4">
</td>
</tr>
</table>
