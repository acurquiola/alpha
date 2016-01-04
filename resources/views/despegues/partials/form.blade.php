<h5><i align="center" class="fa fa-plane"></i>Información de Aterrizaje</h5>

<div class="form-group" >
  <label for="fecha" class="col-sm-2 control-label" >Fecha</label>
  <div class="col-sm-10">
    {!! Form::text('fecha', null, [ 'class'=>"form-control fecha",  "placeholder"=>"Fecha"]) !!}
  </div>
</div>
<div class="form-group" >
  <label for="hora" class="col-sm-2 control-label" >Hora</label>
  <div class="col-sm-10">
    {!! Form::text('hora', null, [ 'class'=>"form-control hora", "placeholder"=>"Hora"]) !!}
  </div>
</div> 
<div class="form-group">
  <label for="aeronave_id" class="col-sm-2 control-label">Aeronave</label>
  <div class="col-sm-10">
    <select class="form-control no-vacio aeronave" disabled name="aeronave_id" required>
      <option value="">--Seleccione Aeronave--</option>
      @foreach ($aeronaves as $aeronave)
      <option data-modelo="{{$aeronave->modelo_id}}" data-nombremodelo="{{$aeronave->modelo->modelo}}" data-cliente="{{$aeronave->cliente_id}}" data-tipo="{{$aeronave->tipo_id}}" data-tipoV="{{$aeronave->tipo->nombre}}" value="{{$aeronave->id}}" {{(($aterrizaje->aeronave_id == $aeronave->id)?"selected":"")}}> {{$aeronave->matricula}}</option>
      @endforeach           
    </select>
  </div>
</div>
<div class="form-group">
  <label for="cliente_id" class="col-sm-2 control-label">Cliente</label>
  <div class="col-sm-10">
    <select name="cliente_id" class="form-control cliente">
      <option value="">--Seleccione Cliente--</option>
      @foreach ($clientes as $index=>$cliente)
      <option value="{{$index}}" {{(($aterrizaje->cliente_id == $index)?"selected":"")}}> {{$cliente}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <label for="puerto_id" class="col-sm-2 control-label">Procedencia</label>
  <div class="col-sm-10">               
    <select name="puerto_id" class="form-control puerto">
      <option value="">--Seleccione Destino--</option>
      @foreach ($puertos as $puerto)
      <option  data-nacionalidad="{{$puerto->pais_id}}" value="{{$puerto->id}}" {{(($aterrizaje->puerto_id == $puerto->id)?"selected":"")}}> {{$puerto->nombre}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <label for="piloto_id" class="col-sm-2 control-label">Piloto</label>
  <div class="col-sm-10">                                                           
    <select name="piloto_id" class="form-control piloto">
      <option value="">--Seleccione Piloto--</option>
      @foreach ($pilotos as $piloto)
      <option data-ci="{{$piloto->documento_identidad}}" value="{{$piloto->id}}" {{(($aterrizaje->piloto_id == $piloto->id)?"selected":"")}}> {{$piloto->nombre}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <label for="tipoMatricula_id" disabled class="col-sm-2 control-label">Tipo de Vuelo</label>
  <div class="col-sm-10"> 
    <select name="tipoMatricula_id" class="form-control tipo_vuelo">
      <option value="">--Seleccione Tipo de Vuelo--</option>
      @foreach ($tipoMatriculas as $tipoMatricula)
      <option value="{{$tipoMatricula->id}}" {{(($aterrizaje->tipoMatricula_id == $tipoMatricula->id)?"selected":"")}}> {{$tipoMatricula->nombre}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group" >
  <label for="num_vuelo" class="col-sm-2 control-label" >Número de Vuelo</label>
  <div class="col-sm-10">
    {!! Form::text('num_vuelo', 'N/A', [ 'class'=>"form-control num_vuelo",  "placeholder"=>"Número de Vuelo"]) !!}
  </div>
</div>
<h5>
  <i class="fa fa-money"></i>
  Cobros
  <small>Conceptos a facturar</small>
</h5> 

<div class="form-inline  pull-right">
  <!-- Condición de Pago -->
  <div class="form-group">
    <label><strong>Condición de pago: </strong></label>
    <div class="input-group">
      <select name="condicionPago" id="condicionPago-select" class="form-control">
        <option value="">Seleccione</option>
        <option value="Contado"> Contado</option>
        <option value="Crédito"> Crédito</option>
      </select>
      <div class="input-group-addon">
      </div>                    
    </div><!-- /.input group -->
  </div><!-- /.form group -->
</div>  
<br>            
<div class="form-inline">
  <div class="form-group" >
    
    <label>
      {!! Form::checkbox('cobrar_formulario', '1', true) !!}
      Formulario
    </label>
    <br>
    <br>
    <label >
      {!! Form::checkbox('cobrar_AterDesp', '1', true) !!}
      Aterrizaje y Despegue
    </label>
  </div><!-- /.form group -->
  <!-- Tiempo de Estacionamiento-->
  <div class="form-group " style="margin-left: 30px">
    <label>
      {!! Form::checkbox('cobrar_estacionamiento', '1', true) !!}
      Estacionamiento
    </label> 
    <br> 
    <label>Tiempo: </label>
    <div class="input-group" style="width: 150px">
      <input type="text" class="form-control" id="tiempo_estacionamiento" name="tiempo_estacionamiento" readonly />
      <div class="input-group-addon">
        min
        <i class="ion ion-clock"></i>
      </div>
    </div><!-- /.input group -->
  </div><!-- /.form group -->  

  <div class="form-group" style="margin-left: 20px">
    <label>
      {!! Form::checkbox('cobrar_puenteAbordaje','1', true) !!}
      Puentes de Abordaje
    </label>
    <br> 
    <div class="input-group" style="width:100px">
      <div class="input-group-addon">
        #
      </div>
      <input type="number" class="form-control" min="1" name="numero_puenteAbordaje" />
    </div><!-- /.input group -->
    <div class="input-group" style="width:140px">
      <input type="number" class="form-control"  min="1" name="tiempo_puenteAbord"  />
      <div class="input-group-addon">
        horas
        <i class="ion ion-clock"></i>
      </div>
    </div><!-- /.input group -->
  </div><!-- /.form group --> 


  <div class="form-inline" style="margin-top: 20px">
    <label>
      {!! Form::checkbox('cobrar_carga', '1', true) !!}
      Carga
    </label>
    <div class="form-group">
      <br> 
      <div class="input-group" style="width:170px; margin-right: 10px">
        <input type="text" name="peso_embarcado" placeholder="Embarcado" id="peso_embarcado" placeholder="Peso Embarcado" class="form-control no-vacio"/>
        <div class="input-group-addon">
          Kg(s) <i class="ion ion-soup-can-outline"></i>
        </div>
      </div><!-- /.input group -->
      <div class="input-group" style="width:190px">
        <input type="text"  name="peso_desembarcado" placeholder="Desembarcado" id="peso_desembarcado" placeholder="Peso Desembarcado" class="form-control no-vacio"/>
        <div class="input-group-addon ">
          Kg(s) <i class="ion ion-soup-can-outline"></i>
        </div>
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <div class="form-group" style="margin-left: 20px">
      <label>
        {!! Form::checkbox('cobrar_otrosCargos', '1', true) !!}
        Otros Cargos
      </label>
      <br> 
      {!! Form::select('otrosCargo_id[]', $otrosCargos, null, [ 'class'=>"form-control chosen-select otrosCargos-select", "multiple"=>"true",  "autocomplete"=>"off", 'id'=>"otros_cargos-select"]) !!}
    </div><!-- /.form group -->
  </div>
  <hr>
  <h5>
    <i class="fa fa-user"></i>
    Pasajeros
    <small>Embarcados y en Tránsito</small>
  </h5>
  <div class="form-inline">
    <label><i class="ion ion-android-plane col-md-2"> </i><strong> EMBARCADOS</strong></label>
    <!-- Pasajeros adultos -->
    <div class="form-group">
      <label>Adultos:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <input type="number" name="embarqueAdultos"  value="0"  class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Pasajeros Infantes-->
    <div class="form-group">
      <label>Infantes:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-android-happy"></i>
        </div>
        <input type="number" name="embarqueInfante"  value="0"  class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->


    <!-- Pasajeros tercera edad -->
    <div class="form-group ">
      <label>Tercera Edad:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <input type="number" name="embarqueTercera"  value="0"  class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->
  </div>
  <br>
  <div class="form-inline">

    <label><i class="ion ion-android-plane col-md-2"> </i><strong>EN TRÁNSITO</strong></label>

    <!-- Pasajeros adultos -->
    <div class="form-group">
      <label>Adultos:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <input type="number" name="transitoAdultos"  value="0"  class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Pasajeros Infantes-->
    <div class="form-group">
      <label>Infantes:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-android-happy"></i>
        </div>
        <input type="number" name="transitoInfante"  value="0"  class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->


    <!-- Pasajeros tercera edad -->
    <div class="form-group  ">
      <label>Tercera Edad:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <input type="number" name="transitoTercera"  value="0"  class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->
  </div>
  <br>
  <div class="form-inline">
    <label style="margin-right: 25px"><i class="ion ion-android-plane col-md-2" > </i><strong>TOTALES</strong></label>
    <!-- Pasajeros adultos -->
    <div class="form-group ">
      <label>Adultos:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <input type="number"   value="0" disabled class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Pasajeros Infantes-->
    <div class="form-group ">
      <label>Infantes:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-android-happy"></i>
        </div>
        <input type="number"   value="0" disabled  class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Pasajeros tercera edad -->
    <div class="form-group" >
      <label>Tercera Edad:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <input type="number"   value="0" disabled class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->

    <!-- Total de Pasajeros -->
    <div class="form-group">

      <label>Total:</label>
      <div class="input-group" style="width:80px">
        <input type="number" value="0" disabled class="form-control" />
      </div><!-- /.input group -->
    </div><!-- /.form group -->
  </div>