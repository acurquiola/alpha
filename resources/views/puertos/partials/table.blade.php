<div class="table-responsive">
	<table id="puerto-table" class="table no-margin">
		<thead class="bg-primary">
			<tr>
                    {!!Html::sortableColumnTitle("Nombre", "nombre")!!}
                    {!!Html::sortableColumnTitle("Nomenclatura", "siglas")!!}
                    {!!Html::sortableColumnTitle("País", "pais_id")!!}
                    <th>Opciones</th>
               </tr>
          </thead>
          <tbody>
               @foreach($puertos as $puerto)
               <tr data-id='{{$puerto->id}}'>
                    <td class='nombre-td'>{{$puerto->nombre}}</td>
                    <td class='siglas-td'>{{$puerto->siglas}}</td>
                    <td class='pais_id-td'>{{$puerto->pais->nombre}}</td>
                    <td>
                         <button class='btn {{($puerto->estado==1)?"btn-primary":"btn-default"}} btn-sm activarPuerto-btn' data-id='{{$puerto->id}}'><i class='glyphicon glyphicon-adjust' title='{{($puerto->estado==1)?"Puerto Habilitado":"Puerto Inhabilitado"}}'></i></button>
                         <button class='btn btn-warning btn-sm editarPuerto-btn' data-id='{{$puerto->id}}'><i class='glyphicon glyphicon-pencil' title='Editar Información'></i></button>
                         <button class='btn btn-danger  btn-sm eliminarPuerto-btn' data-id='{{$puerto->id}}'><i class='glyphicon glyphicon-trash' title='Eliminar Registro'></i></button>
                    </td>
               </tr>   
               @endforeach
               <h6 class="table-info pull-right">Total de Registros: {{$puerto->count()}}</h6>
          </tbody>
     </table>
</div><!-- /.table-responsive -->
<div class="row">
     <div class="col-xs-12 text-center">
          {!! $puertos->appends(Input::except('page'))->render() !!}
     </div>
</div>