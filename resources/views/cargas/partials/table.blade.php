
<div class="table-responsive">     
	<table id="carga-table" class="table no-margin">
		<thead class="bg-primary">
			<tr>
                    {!!Html::sortableColumnTitle("Fecha", "fecha")!!}
                    {!!Html::sortableColumnTitle("Nro. Vuelo", "num_vuelo")!!}
                    {!!Html::sortableColumnTitle("Matrícula", "aeronave_id")!!}
                    {!!Html::sortableColumnTitle("Cliente", "cliente_id")!!}
                    <th>Peso Embarcado</th>
                    <th>Peso Desembarcado</th>
                    <th>Monto Total</th>
                    <th>Opciones</th>
               </tr>
          </thead>
               @foreach($cargas as $carga)
               <tr data-id='{{$carga->id}}'>
                    <td class ='fecha-td'>{{$carga->fecha}}</td>
                    <td class ='num_vuelo-td'>{{$carga->num_vuelo}}</td>
                    <td class ='aeronave_id-td'>{{$carga->aeronave->matricula}}</td>
                    <td class ='cliente_id-td'>{{$carga->cliente->nombre}}</td>
                    <td class ="peso_embarcado-td">{{$carga->peso_embarcado}}</td>
                    <td class ="peso_desembarcado-td">{{$carga->peso_desembarcado}}</td>
                    <td class ="peso_desembarcado-td">{{$carga->monto_total}}</td>
                    <td>                         
                         @if($carga->factura_id != NULL)
                        <a target="_blank" class='btn btn-default  btn-sm' href='{{action('FacturaController@getPrint', ["modulo"=>"CARGA", $carga->factura_id])}}'>
                              <span class='glyphicon glyphicon-print'></span>
                        </a>
                         @endif
                         @if($carga->factura_id == NULL)
                         <a href="{{  action('CargaController@getCrearFactura', [$carga->id])}}">
                              <button class='btn btn-info btn-sm facturaCarga-btn'><span class='fa fa-credit-card' title='Facturar'></span></button>
                         </a>                              
                         <button class='btn btn-warning btn-sm editarCarga-btn' data-id='{{$carga->id}}' ><i class='fa fa-edit' title='Editar Información'></i></button>
                         @endif
                         <button class='btn btn-success btn-sm verCarga-btn'><span class='glyphicon glyphicon-eye-open' title='Ver Información'></span></button>
                    </td>
               </tr>   
               @endforeach
          </tbody>
     </table>
</div><!-- /.table-responsive -->
<div class="row">
     <div class="col-xs-12 text-center">
          {!! $cargas->appends(Input::except('page'))->render() !!}
     </div>
</div>
