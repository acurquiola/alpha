
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
                    <td>
                         <button class='btn btn-info btn-sm facturarCarga-btn' data-id='{{$carga->id}}' ><i class='fa fa-credit-card' title='Facturar'></i></button>
                         <button class='btn btn-warning btn-sm editarCarga-btn' data-id='{{$carga->id}}' ><i class='fa fa-edit' title='Editar Información'></i></button>
                         <button class='btn btn-danger btn-sm eliminarCarga-btn' data-id='{{$carga->id}}' ><i class='fa fa-trash' title='Eliminar Registro'></i></button>
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