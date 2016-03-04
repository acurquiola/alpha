<div class="table-responsive">     
     <table id="despegue-table" class="table no-margin">
          <thead class="bg-primary">          
               <tr>
                    <th colspan="4" style="vertical-align: middle" class="text-center">DESPEGUE</td>
                    <th colspan="4" style="vertical-align: middle" class="text-center">ATERRIZAJE</td>
                    <th colspan="3" style="vertical-align: middle" class="text-center">GENERAL</td>
               </tr>
               <tr>
                    {!!Html::sortableColumnTitle("Fecha", "fecha")!!}
                    {!!Html::sortableColumnTitle("Puerto", "puerto_id")!!}
                    {!!Html::sortableColumnTitle("Vuelo", "num_vuelo")!!}
                    {!!Html::sortableColumnTitle("Piloto", "piloto_id")!!}
                    <th>Fecha</th>                  
                    <th>Puerto</th>                  
                    <th>Vuelo</th>    
                    <th>Piloto</th>    
                    <th>Matrícula</th>
                    {!!Html::sortableColumnTitle("Cliente", "cliente_id")!!}
                    <th>Opciones</th>
               </tr>
          </thead>
               @if($despegues->count()==0)
               <tr>
                    <td colspan="11" class="text-center">No se consiguió ningún registro</td>
               </tr>
               @endif
               @foreach($despegues as $despegue)
               <tr data-id='{{$despegue->id}}' data-aterrizaje='{{$despegue->aterrizaje_id}}'>
                    <td class ='horaFecha-td'>{{$despegue->fecha}} {{$despegue->hora}}</td>
                    <td class ='puerto_id-td'>{{(($despegue->puerto)?$despegue->puerto->siglas:"No disponible")}}</td>
                    <td class ='num_vuelo-td'>{{(($despegue->num_vuelo)?$despegue->num_vuelo:"N/A")}}</td>
                    <td class ='piloto_id-td'>{{(($despegue->piloto)?$despegue->piloto->nombre:"N/A")}}</td>                    
                    <td class ='horaFecha-td'>{{$despegue->aterrizaje->fecha}} {{$despegue->aterrizaje->hora}}</td>
                    <td class ='puerto_id-td'>{{(($despegue->aterrizaje->puerto)?$despegue->aterrizaje->puerto->siglas:"No disponible")}}</td>
                    <td class ='num_vuelo-td'>{{(($despegue->aterrizaje->num_vuelo)?$despegue->aterrizaje->num_vuelo:"N/A")}}</td>
                    <td class ='piloto_id-td'>{{(($despegue->aterrizaje->piloto)?$despegue->aterrizaje->piloto->nombre:"N/A")}}</td>      
                    <td class ='matricula-td'>{{$despegue->aterrizaje->aeronave->matricula}}</td>
                    <td class ='cliente_id-td'>{{(($despegue->cliente)?$despegue->cliente->nombre:"No asignado")}}</td> 
                    <td>
                         @if($despegue->tipoMatricula_id == '4')
                                   <button class='btn btn-success btn-sm verDespegue-btn'><span class='glyphicon glyphicon-eye-open' title='Ver Información'></span></button>
                              @else
                              <div class='btn-group  btn-group-sm' role='group' aria-label='...'>
                                   @if($despegue->factura_id != NULL)
                                       <a target="_blank" class='btn btn-default  btn-sm' href='{{action('FacturaController@getPrint', ["modulo"=>"DOSAS", $despegue->factura_id])}}'>
                                             <span class='glyphicon glyphicon-print'></span>
                                       </a>
                                        @if(isset($despegue->factura) && $despegue->factura->condicionPago == 'Contado')
                                            <a class='btn btn-primary  btn-sm'  href='{{action('DespegueController@getGenerarCobranza', [$despegue->id])}}' @if($despegue->factura->estado == 'C') disabled @endif >
                                                  <span class='fa fa-money'></span>
                                            </a>
                                        @endif
                                   @endif
                                   @if($despegue->factura_id == NULL)
                                        <a href="{{  action('DespegueController@getCrearFactura', [$despegue->id])}}">
                                             <button class='btn btn-info btn-sm facturarDespegue-btn'><span class='fa fa-credit-card' title='Crear Dosa'></span></button>
                                        </a>
                                        <button class='btn btn-warning  btn-sm editarDespegue-btn' data-id='{{$despegue->id}}'><span class='glyphicon glyphicon-pencil' title='Editar Registro'></span></button>
                                        <button class='btn btn-danger  btn-sm eliminarDespegue-btn' data-id='{{$despegue->id}}'><span class='glyphicon glyphicon-trash' title='Eliminar Registro'></span></button>
                                   @endif
                              </div>
                         @endif
                    </td>
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
