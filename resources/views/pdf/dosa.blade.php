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
<td colspan="1">
</td>
<td  colspan="2">
{{$despegue->aterrizaje->aeronave->peso}}
</td>
</tr>
</table>

<br>
<br>

<table>
<tr>
<td colspan="4" style="border-bottom: 1px solid black; border-top: 1px solid black; ">    
</td>
<td colspan="4" style="border-bottom: 1px solid black; border-top: 1px solid black; ">  
<strong>INFORMACIÓN DEL VUELO</strong>   
</td>
<td colspan="2" style="border-bottom: 1px solid black; border-top: 1px solid black; ">    
</td>
</tr> 
</table>
<br>

<table style="width:100%; border-collapse: collapse; padding:2px">
<tr>
<td  colspan="4">
</td>
<td  colspan="2">
<strong>ATERRIZAJE</strong>
</td>
<td  colspan="1">
</td>
<td  colspan="3">
<strong>DESPEGUE</strong>
</td>
</tr>
<tr>
<td  colspan="4">
<strong><u>PROCEDENCIA/DESTINO</u></strong>
</td>
<td  colspan="2">
{{$despegue->aterrizaje->puerto->nombre}}
</td>
<td colspan="1">
</td>
<td  colspan="3">
{{$despegue->puerto->nombre}}
</td>
</tr>
<tr>
<td colspan="10">
<strong><u>PILOTO</u></strong>
</td>
</tr>
<tr>
<td colspan="1">
</td>
<td  colspan="3">
<strong>Nombre:</strong>
</td>
<td  colspan="3">
{{$despegue->aterrizaje->piloto->nombre}}
</td>
<td  colspan="3">
{{$despegue->piloto->nombre}}
</td>
</tr>
<tr>
<td colspan="1">
</td>
<td  colspan="3">
<strong>Licencia:</strong>
</td>
<td  colspan="3">
{{$despegue->aterrizaje->piloto->licencia}}
</td>
<td  colspan="3">
{{$despegue->piloto->licencia}}
</td>
</tr>
<tr>
<td  colspan="4">
<strong><u>NRO. VUELO</u></strong>
</td>
<td  colspan="2">
{{$despegue->aterrizaje->num_vuelo}}
</td>
<td colspan="1">
</td>
<td  colspan="3">
{{$despegue->num_vuelo}}
</td>
</tr>
<tr>
<td colspan="10">
<strong><u>PASAJEROS</u></strong>
</td>
</tr>
<tr>
<td colspan="1">
</td>
<td  colspan="3">
<strong>Embarcados/Desembarcados</strong>
</td>
<td  colspan="3">
{{$despegue->aterrizaje->desembarqueAdultos+$despegue->aterrizaje->desembarqueInfante+$despegue->aterrizaje->desembarqueTercera}}
</td>
<td  colspan="3">
{{$despegue->embarqueAdultos+$despegue->embarqueInfante+$despegue->embarqueTercera}}
</td>
</tr>
<tr>
<td colspan="1">
</td>
<td  colspan="3">
<strong>En tránsito:</strong>
</td>
<td  colspan="3">
{{$despegue->aterrizaje->desembarqueTransito}}
</td>
<td  colspan="3">
{{$despegue->transitoAdultos+$despegue->transitoInfante+$despegue->transitoTercera}}</td>
</tr>
<tr>
<td  colspan="4">
<strong><u>FECHA</u></strong>
</td>
<td  colspan="2">
{{$despegue->aterrizaje->fecha}}
</td>
<td colspan="1">
</td>
<td  colspan="3">
{{$despegue->fecha}}
</td>
</tr>
<tr>
<td  colspan="4">
<strong><u>HORA</u></strong>
</td>
<td  colspan="2">
{{$despegue->aterrizaje->hora}}
</td>
<td colspan="1">
</td>
<td  colspan="3">
{{$despegue->hora}}
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
@for($i=0; $i<10-$factura->detalles->count();$i++)
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
