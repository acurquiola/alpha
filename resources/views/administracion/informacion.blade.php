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
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Aeropuerto</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tasas</a></li>
                        <li role="presentation"><a href="#estacionamiento" aria-controls="profile" role="tab" data-toggle="tab">Estacionamiento</a></li>
                        <li role="presentation"><a href="#metas" aria-controls="profile" role="tab" data-toggle="tab">Metas</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="home">
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
                                        <label for="numero-input">Teléfono</label>
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
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                   
                                    <div class="form-group">
                                        <label for="numero-input">Número de turnos</label>
                                        <input class="form-control" id="numero-input" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="cliente-input">Número de taquillas</label>
                                        <input class="form-control" id="numero-input" type="text">
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
                        <div role="tabpanel" class="tab-pane active" id="metas">
                            <div class="row">
                                <div class="col-md-12">
                                        <h3>Metas</h3>
                                        <div role="tabpanel" id="meta-tabs">

                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs margin-bottom" role="tablist">
                                                <li role="presentation" class="active"><a href="#new-meta-tab" aria-controls="new-meta-tab" role="tab" data-toggle="tab"><span class="text-primary glyphicon glyphicon-plus"></span></a></li>

                                                @foreach($metas as $meta)
                                                    <li role="presentation"><a href="#meta-{{$meta->id}}-tab" aria-controls="meta-{{$meta->id}}-tab" role="tab" data-toggle="tab">{{$meta->fecha_inicio}}</a></li>
                                                @endforeach
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="new-meta-tab">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="fecha-inicio-input" class="col-xs-2 control-label" >Fecha inicio</label>
                                                            <div class="col-xs-4">
                                                                <input autocomplete="off" value="{{\Carbon\Carbon::now()->format("d/m/Y")}}" class="form-control" id="fecha-inicio-datepicker" name="metaFechaInicio">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-4">
                                                                <select id="concepto-meta-select">
                                                                    @foreach($conceptos as $pkey => $concepto)
                                                                        <option value="{{$pkey}}">{{$concepto}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <input class="form-control text-right" autocomplete="off" id="monto-meta-gobernacion-input"  type="text" placeholder="Meta Gobernación">
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <input class="form-control text-right" autocomplete="off" id="monto-meta-saar-input"  type="text" placeholder="Meta SAAR">
                                                            </div>
                                                            <div class="col-xs-1">
                                                                <button type="button" class="btn btn-primary add-concepto-meta-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <table class="table" id="new-meta-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Concepto</th>
                                                                            <th>Meta Gobernación</th>
                                                                            <th>Meta SAAR</th>
                                                                            <th>Acción</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                @foreach($metas as $meta)
                                                    <div role="tabpanel" class="tab-pane" id="meta-{{$meta->id}}-tab">
                                                        <div class="form-horizontal">
                                                            <div class="form-group">
                                                                <label for="fecha-inicio-input" class="col-xs-2 control-label" >Fecha Inicio</label>
                                                                <div class="col-xs-4">
                                                                    <p class="form-control-static">{{$meta->fecha_inicio}}</p>
                                                                </div>
                                                                <label for="fecha-inicio-input" class="col-xs-2 control-label" >Fecha Fin</label>
                                                                <div class="col-xs-4">
                                                                    <p class="form-control-static">{{$meta->fecha_fin}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xs-12">
                                                                    <table class="table" id="new-meta-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Concepto</th>
                                                                                <th>Meta Gobernación</th>
                                                                                <th>Meta SAAR</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($meta->detalles as $detalle)
                                                                                <tr>
                                                                                    <td>{{$detalle->concepto->nompre}}</td>
                                                                                    <td>{{$detalle->gobernacion_meta}}</td>
                                                                                    <td>{{$detalle->saar_meta}}</td>
                                                                                </tr>

                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
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

$(document).ready(function(){

          $('#fecha-inicio-datepicker').datepicker({
            closeText: 'Cerrar',
            prevText: '&#x3C;Ant',
            nextText: 'Sig&#x3E;',
            currentText: 'Hoy',
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
            'Jul','Ago','Sep','Oct','Nov','Dic'],
            dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
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


    $('#new-meta-tab').delegate('.add-concepto-meta-btn','click',function(){

      var concepto=$('#concepto-meta-select').val();
      if(concepto==""){
        alertify.error("Debe seleccionar un concepto.");
        return;
      }
      if($('input[name="conceptoMeta[]"][value="'+concepto+'"]').length>0){
              alertify.error("El concepto seleccionado ya existe en la tabla.");
              return;
      }
      var conceptoText=$('#concepto-meta-select option:selected').text();
      var montoSaar=$('#monto-meta-saar-input').val();
      var montoGobernacion=$('#monto-meta-gobernacion-input').val();
      $('#new-meta-table tbody').prepend(
      '<tr><td>'+conceptoText+'<input type="hidden" value="'+
        concepto
        +'" name="conceptoMeta[]" ></td><td> <input class="form-control text-right" value="'+
        montoGobernacion
        +'" name="montoGobernacion[]"></td><td><input class="form-control text-right" value="'+
        montoSaar
        +'" name="montoSaar[]"></td><td><button class="btn btn-danger remove-meta-btn" type="button"><span class="glyphicon glyphicon-minus"></span> </td></tr>')

        $('#monto-meta-saar-input').val('');
        $('#monto-meta-gobernacion-input').val('');
  })

    $('#concepto-meta-select').chosen({width:"100%"})

    $('#add-concepto-btn').click(function(){
        var value=$('#concepto-input').val();
        if(value=="")
          return;
        var index= $('#concepto-table tbody tr').length;
      $('#concepto-table tbody').append("<tr>\
        <td><input class='form-control' value='"+value+"' name='conceptosNuevos["+index+"][nombre]'></td>\
        <td><input type='text' class='form-control' value='0' name='conceptosNuevos["+index+"][costo]'></td>\
        <td><button class='btn btn-danger remove-concepto-btn'><span class='glyphicon glyphicon-minus'></span></button></td>\
        </tr>");
  });

    $('body').delegate('.remove-concepto-btn, .remove-porton-btn, .remove-meta-btn','click',function(){
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


});


 </script>

 @endsection