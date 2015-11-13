<div class="table-responsive">     
     <table id="despegue-table" class="table no-margin">
          <thead class="bg-primary">
               <tr>
                    {!!Html::sortableColumnTitle("Fecha", "fecha")!!}
                    {!!Html::sortableColumnTitle("Hora", "hora")!!}
                    <!--<th>Matrícula</th>
                         <th>Procedencia</th-->                    
                    {!!Html::sortableColumnTitle("Destino", "puerto_id")!!}
                    {!!Html::sortableColumnTitle("Nro. Vuelo", "num_vuelo")!!}
                    {!!Html::sortableColumnTitle("Cliente", "cliente_id")!!}
                    <th>Opciones</th>
               </tr>
          </thead>
               @foreach($despegues as $despegue)
               <tr data-id='{{$despegue->id}}'>
                    <td class ='fecha-td'>{{$despegue->fecha}}</td>
                    <td class ='hora-td'>{{$despegue->hora}}</td>
                    <td class ='puerto_id-td'>{{(($despegue->puerto)?$despegue->puerto->siglas:"No disponible")}}</td>
                    <td class ='num_vuelo-td'>{{(($despegue->num_vuelo)?$despegue->num_vuelo:"N/A")}}</td>
                    <td class ='cliente_id-td'>{{(($despegue->cliente)?$despegue->cliente->nombre:"No asignado")}}</td>
               </tr>   
               @endforeach
          </tbody>
     </table>
</div><!-- /.table-responsive -->
<div class="row">
     <div class="col-xs-12 text-center">
          {!! $despegues->appends(Input::except('page'))->render() !!}
     </div>
</div>