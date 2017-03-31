<div class="table-responsive">     
	<table id="aterrizaje-table" class="table no-margin">
		<thead class="bg-primary">
			<tr>
                    {!!Html::sortableColumnTitle("Fecha", "fecha_conciliacion")!!}
                    {!!Html::sortableColumnTitle("Monto Lote", "monto_lote")!!}
                    {!!Html::sortableColumnTitle("Monto Banco", "monto_banco")!!}
                    {!!Html::sortableColumnTitle("Comisión Bancaria", "comision_bancaria")!!}
                    {!!Html::sortableColumnTitle("Fecha Banco", "fecha_banco")!!}
                    <th>Opciones</th>
               </tr>
          </thead>
          <tbody>
               @if($conciliados->count()==0)
               <tr>
                    <td colspan="6" class="text-center">No se consiguió ningún registro</td>
               </tr>
               @endif
               @foreach($conciliados as $conciliado)
               <tr data-id='{{$conciliado->id}}'>
                    <td class ='fecha_conciliacion-td'>{{$conciliado->fecha_conciliacion }}</td>
                    <td class ='monto_lote-td'>{{$conciliado->monto_lote}}</td>
                    <td class ='monto_banco-td'>{{$conciliado->monto_banco}}</td>
                    <td class ='comision_bancaria-td'>{{$conciliado->comision_bancaria}}</td>
                    <td class ='fecha_banco-td'>{{$conciliado->fecha_banco}}</td>
                    <td>
                         <div class='btn-group  btn-group-sm' role='group' aria-label='...'>
                              <button class='btn btn-danger  btn-sm eliminarConciliacion-btn' data-id='{{$conciliado->id}}' ><i class='fa fa-trash' title='Eliminar Registro'></i></button>
                         </div>
                    </td>
               </tr>   
               @endforeach
          </tbody>
     </table>
</div><!-- /.table-responsive -->
<div class="row">
     <div class="col-xs-12 text-center">
          {!! $conciliados->appends(Input::except('page'))->render() !!}
     </div>
</div>