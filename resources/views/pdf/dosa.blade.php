<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="7">
</td>
<td  colspan="3">
<strong>FACTURA:</strong> {{$factura->nFactura}}
</td>
</tr>
<tr>
<td  colspan="7">
</td>
<td  colspan="3">
<strong>FECHA:</strong> {{$factura->fecha}}
</td>
</tr>
<tr>
<td  colspan="7">
</td>
<td  colspan="3">
<strong>CONDICIÓN DE PAGO:</strong> {{$factura->condicionPago}}</td>
</tr>
<tr>
<td  colspan="7">
</td>
<td  colspan="3">
<strong>NRO. DOSA:</strong> 
</td>
</tr>
</table>

<br>
<br>

<table>
<tr>
<td colspan="3">		
</td>
<td colspan="5" style="border-bottom: 1px solid black">	
<strong>			FACTURACIÓN DE CONCEPTOS AERONÁUTICOS</strong> 	
</td>
<td colspan="2">		
</td>
</tr>	
</table>
<br>
<br>
<br>

<table>
<tr>
<td colspan="4" style="border-bottom: 1px solid black; border-top: 1px solid black; ">		
</td>
<td colspan="4" style="border-bottom: 1px solid black; border-top: 1px solid black; ">	
<strong>INFORMACIÓN DEL CLIENTE</strong> 	
</td>
<td colspan="2" style="border-bottom: 1px solid black; border-top: 1px solid black; ">		
</td>
</tr>	
</table>
<br>

<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="10">
<strong>CLIENTE:</strong> {{$factura->cliente->nombre}}
</td>
</tr>
<tr>
<td  colspan="10">
<strong>DIRECCIÓN FISCAL:</strong> {{$factura->cliente->direccion}}
</td>
</tr>
<tr>
<td  colspan="3">
<strong>RIF:</strong> {{$factura->cliente->rif}}
</td>
</tr>
</table>

<table>
<tr>
<td colspan="4" style="border-bottom: 1px solid black; border-top: 1px solid black; ">		
</td>
<td colspan="4" style="border-bottom: 1px solid black; border-top: 1px solid black; ">	
<strong>INFORMACIÓN DE LA AERONAVE</strong> 	
</td>
<td colspan="2" style="border-bottom: 1px solid black; border-top: 1px solid black; ">		
</td>
</tr>	
</table>
<br>

<br>

<table style="width:100%;">
<tr>
<td colspan="1">
</td>
<td  colspan="2">
<strong><u>MATRÍCULA</u></strong>
</td>
<td colspan="1">
</td>
<td  colspan="2">
<strong><u>MODELO</u></strong>
</td>
<td colspan="1">
</td>
<td  colspan="2">
<strong><u>PESO</u></strong>
</td>
</tr>
<tr>
<td colspan="1">
</td>
<td  colspan="1">
{{$despegue->aterrizaje->aeronave->matricula}}
</td>
<td colspan="2">
</td>
<td  colspan="2">
{{$despegue->aterrizaje->aeronave->modelo->modelo}}
</td>
<td colspan="2">
</td>
<td  colspan="1">
{{$despegue->aterrizaje->aeronave->modelo->peso_aeronave}}
</td>
</tr>
</table>

<br>

<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="2">
</td>
<td  colspan="3">
<strong>ATERRIZAJE</strong>
</td>
<td  colspan="2">
</td>
<td  colspan="3">
<strong>DESPEGUE</strong>
</td>
</tr>
<tr>
<td  colspan="5">
<strong>PROCEDENCIA:</strong>
</td>
<td  colspan="5">
<strong>DESTINO:</strong> 
</td>
</tr>
<tr>
<td  colspan="3">
<strong>PILOTO:</strong>
</td>
<td  colspan="2">
<strong>LICENCIA:</strong>
</td>
<td  colspan="3">
<strong>PILOTO:</strong> 
</td>
<td  colspan="2">
<strong>LICENCIA:</strong> 
</td>
</tr>
<tr>
<td  colspan="5">
<strong>NRO. VUELO:</strong>
</td>
<td  colspan="5">
<strong>NRO. VUELO:</strong> 
</td>
</tr>
<tr>
<td  colspan="5">
<strong>PASAJEROS</strong>
</td>
<td  colspan="5">
<strong>PASAJEROS</strong>
</td>
</tr>
<tr>
<td  colspan="3">
<strong>Embarcados:</strong> 
</td>
<td  colspan="2">
<strong>En Tránsito:</strong>
</td>
<td  colspan="3">
<strong>Embarcados:</strong> 
</td>
<td  colspan="2">
<strong>En Tránsito:</strong> 
</td>
</tr>
<tr>
<td  colspan="3">
<strong>FECHA:</strong>
</td>
<td  colspan="2">
<strong>HORA:</strong> 
</td>
<td  colspan="3">
<strong>FECHA:</strong> 
</td>
<td  colspan="2">
<strong>HORA:</strong>
</td>
</tr>
</table>
<br>
<br>
<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="1">
</td>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="7">
<strong>Concepto</strong>
</td>
<td style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="2">
<strong>Monto</strong>
</td>
</tr>
@foreach($factura->detalles as $detalle)
<tr>
<td colspan="1" >
</td>
<td colspan="7" >
{{$detalle->concepto->nompre}}
</td>
<td colspan="2" >
{{$detalle->totalDes}}
</td>
</tr>
@endforeach
<tr> <td colspan="10">
@for($i=0; $i<20-$factura->detalles->count();$i++)
<br>
@endfor
</td></tr>
<tr><td colspan="10" style="border-bottom: 1px solid black;"></td></tr>
<tr>
<td colspan="6" >
</td>
<td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;">
<strong>TOTAL FACTURADO</strong>
</td>
<td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-right: 1px solid black;text-align:left" >
{{$factura->total}}
</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>

<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="5">
<strong>Operador</strong>
</td>
<td  colspan="5">
</td>
</tr>
<tr>
<td  colspan="5"  style="border-top: 1px solid black;">
<strong>Firma/Sello Autorizado Sección de Operaciones y Control de Vuelos</strong> 
</td>
<td colspan="1"></td>
<td  colspan="4" style="border-top: 1px solid black;">
<strong>Firma/Sello Autorizado Línea Aérea</strong> 
</td>
</tr>
</table>
