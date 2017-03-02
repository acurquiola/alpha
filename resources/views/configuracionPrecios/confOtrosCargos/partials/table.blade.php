<div class="table-responsive">     
	<table id="aterrizaje-table" class="table no-margin">
		<thead class="bg-primary">
			<tr>
                    {!!Html::sortableColumnTitle("Nombre", "nombre_cargo")!!}
                    {!!Html::sortableColumnTitle("Monto (BsF.)", "precio_cargo")!!}
                    <th>Opciones</th>
               </tr>
          </thead>
               @foreach($otros_cargos as $otro_cargo)
               <tr data-id='{{$otro_cargo->id}}'>
                    <td class ='nombre-td'>{{$otro_cargo->nombre_cargo}}</td>
                    <td class ='monto-td'>{{ $traductor->format($otro_cargo->precio_cargo)}}</td>
                    <td>
                         <button class='btn btn-warning btn-sm editarOtroCargo-btn' data-id='{{$otro_cargo->id}}' ><i class='glyphicon glyphicon-pencil' title='Editar Información'></i></button>
                         <button class='btn btn-danger btn-sm eliminarOtroCargo-btn' data-id='{{$otro_cargo->id}}' ><i class='glyphicon glyphicon-trash' title='Eliminar Registro'></i></button>
                    </td>
               </tr>   
               @endforeach
          </tbody>
     </table>
</div><!-- /.table-responsive -->
<div class="row">
     <div class="col-xs-12 text-center">
          {!! $otros_cargos->appends(Input::except('page'))->render() !!}
     </div>
</div>