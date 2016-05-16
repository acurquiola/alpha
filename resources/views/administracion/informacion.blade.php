@extends('app')
@section('content')

<div class="row" id="box-wrapper">
    <div class="col-md-12">
        {!! Form::open(["url" => action("InformacionController@update")]) !!}
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Información general</h3>
                </div>
                <div class="box-body">
                    <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#aeropuertoTab" aria-controls="aeropuertoTab" role="tab" data-toggle="tab">Aeropuerto</a></li>
                        <li role="presentation"><a href="#cuentasBancariasTab" aria-controls="cuentasBancariasTab" role="tab" data-toggle="tab">Cuentas Bancarias</a></li>
                        <li role="presentation"><a href="#tasasTab" aria-controls="tasasTab" role="tab" data-toggle="tab">Tasas</a></li>
                        <li role="presentation"><a href="#estacionamiento" aria-controls="estacionamiento" role="tab" data-toggle="tab">Estacionamiento</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="aeropuertoTab">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="numero-input">Nombre</label>
                                        {!! Form::text('aeropuerto[nombre]', $aeropuerto->nombre , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="numero-input">Siglas</label>
                                        {!! Form::text('aeropuerto[siglas]', $aeropuerto->siglas , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="numero-input">RIF</label>
                                        {!! Form::text('aeropuerto[rif]', $aeropuerto->rif , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="numero-input">NIT</label>
                                        {!! Form::text('aeropuerto[nit]', $aeropuerto->nit , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="numero-input">TelÃ©fono</label>
                                        {!! Form::text('aeropuerto[telefono]', $aeropuerto->telefono , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="inicio-input">Dirección Fiscal</label>
                                        {!! Form::textarea('aeropuerto[direccion]', $aeropuerto->direccion , ["class" => "form-control", "rows" => 3]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="numero-input">Correo Electrónico</label>
                                        {!! Form::text('aeropuerto[email]', $aeropuerto->email , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="numero-input">Director</label>
                                        {!! Form::text('aeropuerto[director]', $aeropuerto->director , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="numero-input">Gerente de Administración</label>
                                        {!! Form::text('aeropuerto[gerente]', $aeropuerto->gerente , ["class" => "form-control"]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="cuentasBancariasTab">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="bancos-input">Bancos</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="banco-input" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" id="add-banco-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="banco-table">
                                            <thead>
                                                <tr><th>Banco</th><th>Acción</th></tr>
                                            </thead>
                                            <tbody>

                                                @if($bancos->count()>0)
                                                    @foreach($bancos as $banco)
                                                        <tr>
                                                            <td><input type="text" class="form-control" value="{{$banco->nombre}}" name="bancos[{{$banco->id}}][nombre]"></td>
                                                            <td><button type="button" class='btn btn-danger remove-porton-btn'><span class='glyphicon glyphicon-minus'></span></button></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tasasTab">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                   
                                    <div class="form-group">
                                        <label for="numero-input">Número de turnos</label>
                                        {!! Form::text('aeropuerto[n_tasas_turnos]', $aeropuerto->n_tasas_turnos , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="cliente-input">Número de taquillas</label>
                                        {!! Form::text('aeropuerto[n_tasas_taquillas]', $aeropuerto->n_tasas_taquillas , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="cliente-input">Serie</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="serie-input" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" id="add-serie-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="serie-table">
                                            <thead>
                                                <tr><th>Serie</th><th>Monto</th><th>Inicio</th><th>Actual</th><th>Acción</th></tr>
                                            </thead>
                                            <tbody>
                                                @if($tasas->count()>0)
                                                    @foreach($tasas as $tasa)
                                                        <tr>
                                                            <td><input class="form-control" value="{{$tasa->nombre}}" name="tasas[{{$tasa->id}}][nombre]"></td>
                                                            <td><input type="text" class="form-control" value="{{$tasa->monto}}" name="tasas[{{$tasa->id}}][monto]"></td>
                                                            <td><input type="text" class="form-control" value="{{$tasa->inicio}}" name="tasas[{{$tasa->id}}][inicio]"></td>
                                                            <td><input type="text" class="form-control" value="" readonly></td>
                                                            <td>
                                                              <div class="checkbox">
                                                                <label>
                                                                  <input type="hidden" value='0' name="tasas[{{$tasa->id}}][cv]" >
                                                                  <input value='1' {{($tasa->cv)?"checked":""}} name="tasas[{{$tasa->id}}][cv]" type="checkbox"> CV
                                                                </label>
                                                              </div>
                                                            </td>
                                                            <td>
                                                              <div class="checkbox">
                                                                <label>
                                                                  <input type="hidden" value='0' name="tasas[{{$tasa->id}}][activa]" >
                                                                  <input value='1' {{($tasa->activa)?"checked":""}} name="tasas[{{$tasa->id}}][activa]" type="checkbox"> Activa
                                                                </label>
                                                              </div>
                                                            </td>
                                                            <td><button class='btn btn-danger remove-concepto-btn'><span class='glyphicon glyphicon-minus'></span></button></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="estacionamiento">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="nTurnos-input">Número de turnos</label>
                                        {!! Form::text('estacionamiento[nTurnos]', $estacionamiento->nTurnos , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="nTaquillas-input">Número de taquillas</label>
                                        {!! Form::text('estacionamiento[nTaquillas]', $estacionamiento->nTaquillas , ["class" => "form-control"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="nTaquillas-input">Costo de tarjeta</label>
                                        {!! Form::text('estacionamiento[tarjetacosto]', $traductor->format($estacionamiento->tarjetacosto) , ["class" => "form-control", 'id'=> 'tarjeta_costo']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="cliente-input">Portón</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="porton-input" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" id="add-porton-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="porton-table">
                                            <thead>
                                                <tr><th>Portón</th><th>Acción</th></tr>
                                            </thead>
                                            <tbody>

                                                @if($portons->count()>0)
                                                    @foreach($portons as $porton)
                                                        <tr>
                                                            <td><input type="text" class="form-control" value="{{$porton->nombre}}" name="portones[{{$porton->id}}][nombre]"></td>
                                                            <td><button type="button" class='btn btn-danger remove-porton-btn'><span class='glyphicon glyphicon-minus'></span></button></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label for="cliente-input">Concepto</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="concepto-input" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" id="add-concepto-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="concepto-table">
                                            <thead>
                                                <tr><th>Concepto</th><th>Monto</th><th>Acción</th></tr>
                                            </thead>
                                            <tbody>
                                                @if($conceptosEstacionamiento->count()>0)
                                                    @foreach($conceptosEstacionamiento as $concepto)
                                                        <tr>
                                                            <td><input class="form-control" value="{{$concepto->nombre}}" name="conceptos[{{$concepto->id}}][nombre]"></td>
                                                            <td><input type="text" class="form-control" value="{{$concepto->costo}}" name="conceptos[{{$concepto->id}}][costo]"></td>
                                                            <td><button class='btn btn-danger remove-concepto-btn'><span class='glyphicon glyphicon-minus'></span></button></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button  type="submit" class="btn btn-primary" id="save-info-btn">Aceptar</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection
@section('script')


<script>
    var conceptosNuevos=0;
    var tasasNuevas=0;
$(function(){

          $('#fecha-inicio-datepicker').datepicker({
            closeText: 'Cerrar',
            prevText: '&#x3C;Ant',
            nextText: 'Sig&#x3E;',
            currentText: 'Hoy',
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
            'Jul','Ago','Sep','Oct','Nov','Dic'],
            dayNames: ['Domingo','Lunes','Martes','MiÃ©rcoles','Jueves','Viernes','SÃ¡bado'],
            dayNamesShort: ['Dom','Lun','Mar','MiÃ©','Jue','Vie','SÃ¡b'],
            dayNamesMin: ['D','L','M','M','J','V','S'],
            weekHeader: 'Sm',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: '',
            dateFormat: "dd/mm/yy"});

    $('#tarjeta_costo').focusout(function(){
        $(this).val(numToComma($(this).val()))
    })

    $('#add-concepto-btn').click(function(){
        var value=$('#concepto-input').val();
        if(value=="")
          return;
      $('#concepto-table tbody').append("<tr>\
        <td><input class='form-control' value='"+value+"' name='conceptosNuevos["+conceptosNuevos+"][nombre]'></td>\
        <td><input type='text' class='form-control' value='0' name='conceptosNuevos["+conceptosNuevos+"][costo]'></td>\
        <td><button class='btn btn-danger remove-concepto-btn'><span class='glyphicon glyphicon-minus'></span></button></td>\
        </tr>");
        conceptosNuevos++;
  });

    $('body').delegate('.remove-concepto-btn, .remove-porton-btn, .remove-serie-btn','click',function(){
        $(this).closest('tr').remove();
    });

    $('#add-porton-btn').click(function(){
        var value=$('#porton-input').val();
        if(value=="")
          return;
      $('#porton-table tbody').append("<tr>\
        <td><input type='text' class='form-control' value='"+value+"' name='portonesNuevos[][nombre]'></td>\
        <td><button type='button' class='btn btn-danger remove-porton-btn'><span class='glyphicon glyphicon-minus'></span></button></td>\
        </tr>");
    });

    $('#add-banco-btn').click(function(){
        var value=$('#banco-input').val();
        if(value=="")
          return;
      $('#banco-table tbody').append("<tr>\
        <td><input type='text' class='form-control' value='"+value+"' name='bancosNuevos[][nombre]'></td>\
        <td><button type='button' class='btn btn-danger remove-porton-btn'><span class='glyphicon glyphicon-minus'></span></button></td>\
        </tr>");
    });

    $('#add-serie-btn').click(function(){
        var value=$('#serie-input').val();
        if(value=="")
          return;
      $('#serie-table tbody').append("<tr>\
        <td><input type='text' class='form-control' value='"+value+"' name='tasasNuevas["+tasasNuevas+"][nombre]'></td>\
        <td><input type='text' class='form-control' value='' name='tasasNuevas["+tasasNuevas+"][monto]'></td>\
        <td><input type='text' class='form-control' value='' name='tasasNuevas["+tasasNuevas+"][inicio]'></td>\
        <td><input type='text' class='form-control' value='' readonly></td>\
        <td>\
            <div class='checkbox'>\
                <label>\
                    <input type='hidden' value='0' name='tasasNuevas["+tasasNuevas+"][cv]' >\
                    <input value='1' name='tasasNuevas["+tasasNuevas+"][cv]' type='checkbox'> CV\
                </label>\
            </div>\
        </td>\
        <td>\
            <div class='checkbox'>\
                <label>\
                    <input type='hidden' value='0' name='tasasNuevas["+tasasNuevas+"][activa]' >\
                    <input value='1' name='tasasNuevas["+tasasNuevas+"][activa]' type='checkbox'> Activa\
                </label>\
            </div>\
        </td>\
        <td><button type='button' class='btn btn-danger remove-serie-btn'><span class='glyphicon glyphicon-minus'></span></button></td>\
        </tr>");
        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
        tasasNuevas++;
    });

});


 </script>

 @endsection