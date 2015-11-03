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
                        <div role="tabpanel" class="tab-pane active" id="home">
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
                                    
                                    <div class="form-group">
                                        <label for="cliente-input">Serie</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="serie-input">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" id="add-serie-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="serie-table">
                                            <thead>
                                                <tr><th>Serie</th><th>Acción</th></tr>
                                            </thead>
                                            <tbody>
                                                <tr><td>A</td><td><button class='btn btn-danger remove-serie-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>
                                                <tr><td>B</td><td><button class='btn btn-danger remove-serie-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>
                                                <tr><td>C</td><td><button class='btn btn-danger remove-serie-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>
                                                <tr><td>Exonerado</td><td><button class='btn btn-danger remove-serie-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label for="cliente-input">Precios</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="precio-input">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" id="add-precio-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="precio-table">
                                            <thead>
                                                <tr><th>Precio</th><th>Acción</th></tr>
                                            </thead>
                                            <tbody>
                                                <tr><td>85</td><td><button class='btn btn-danger remove-precio-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>
                                                <tr><td>170</td><td><button class='btn btn-danger remove-precio-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>
                                                <tr><td>0</td><td><button class='btn btn-danger remove-precio-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>
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
                                                @foreach($portons as $porton)
                                                    <tr>
                                                        <td><input type="text" class="form-control" value="{{$porton->nombre}}" name="portones[{{$porton->id}}][nombre]"></td>
                                                        <td class="text-right"><button class='btn btn-danger remove-porton-btn'><span class='glyphicon glyphicon-minus'></span></button></td>
                                                    </tr>
                                                @endforeach
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
                                                @foreach($conceptos as $concepto)
                                                    <tr>
                                                        <td><input class="form-control" value="{{$concepto->nombre}}" name="conceptos[{{$concepto->id}}][nombre]"></td>
                                                        <td><input type="text" class="form-control" value="{{$concepto->costo}}" name="conceptos[{{$concepto->id}}][costo]"></td>
                                                        <td class="text-right"><button class='btn btn-danger remove-concepto-btn'><span class='glyphicon glyphicon-minus'></span></button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="metas">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Metas Ley de Presupuesto (Gobernación)</h3>
                                    <div role="tabpanel" id="meta-gobernacion-tabs">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" id="new-meta-gobernacion-li"><a aria-controls="new-meta-gobernacion-tab" role="tab" data-toggle="tab"><span class="text-primary glyphicon glyphicon-plus"></span></a></li>
                                            <li role="presentation" class="active"><a href="#current-meta-gobernacion-tab" aria-controls="current-meta-gobernacion-tab" role="tab" data-toggle="tab">01/01/2015</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane" id="new-meta-gobernacion-tab"></div>
                                            <div role="tabpanel" class="tab-pane active" id="current-meta-gobernacion-tab">
                                                <div class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="cliente-input" class="col-xs-1 control-label">Concepto</label>
                                                        <div class="col-xs-4">
                                                            <select class="concepto-meta-gobernacion-select">
                                                                <option>Tasa internacionales</option>
                                                                <option>Tasa nacionales</option>
                                                                <option>Formulario</option>
                                                                <option>Aterrizaje</option>
                                                                <option>...</option>
                                                            </select>
                                                        </div>
                                                        <label for="cliente-input" class="col-xs-1 control-label">Monto</label>
                                                        <div class="col-xs-4">
                                                            <input class="form-control monto-meta-gobernacion-input"  type="text">
                                                        </div>
                                                        <div class="col-xs-1">
                                                            <button class="btn btn-primary add-concepto-meta-gobernacion-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-6 col-xs-offset-3">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr><th>Concepto</th><th>Monto</th></tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr><td>Formulario</td><td>100</td></tr>
                                                                    <tr><td>Aterrizaje</td><td>582387</td></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Metas SAAR</h3>
                                        <div role="tabpanel" id="meta-saar-tabs">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" id="new-meta-saar-li"><a  aria-controls="new-meta-saar-tab" role="tab" data-toggle="tab"><span class="text-primary glyphicon glyphicon-plus"></span></a></li>
                                        <li role="presentation" class="active"><a href="#current-meta-saar-tab" aria-controls="current-meta-saar-tab" role="tab" data-toggle="tab">01/01/2015</a></li>

                                        </ul>

                                        <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane" id="new-meta-saar-tab"></div>
                                                <div role="tabpanel" class="tab-pane active" id="current-meta-saar-tab">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="cliente-input" class="col-xs-1 control-label">Concepto</label>
                                                            <div class="col-xs-4">
                                                                <select class="concepto-meta-saar-select">
                                                                    <option>Tasa internacionales</option>
                                                                    <option>Tasa nacionales</option>
                                                                    <option>Formulario</option>
                                                                    <option>Aterrizaje</option>
                                                                    <option>...</option>
                                                                </select>
                                                            </div>
                                                            <label for="cliente-input" class="col-xs-1 control-label">Monto</label>
                                                            <div class="col-xs-4">
                                                                <input class="form-control monto-meta-saar-input"  type="text">
                                                            </div>
                                                            <div class="col-xs-1">
                                                                <button class="btn btn-primary add-concepto-meta-saar-btn"><span class="glyphicon glyphicon-plus"></span></button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-6 col-xs-offset-3">
                                                                <table class="table">
                                                                <thead>
                                                                    <tr><th>Concepto</th><th>Monto</th></tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr><td>Formulario</td><td>100</td></tr>
                                                                    <tr><td>Aterrizaje</td><td>582387</td></tr>
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      console.log(e);
  console.log(e.target); // newly activated tab
  console.log(e.relatedTarget); // previous active tab
})

    $('#new-meta-gobernacion-li').click(function(e){

      var tabName='meta-gobernacion-tab';
      var ul=$(this).closest('ul');
      $(this).after('<li role="presentation"><a href="#'+tabName+'" aria-controls="'+tabName+'" role="tab" data-toggle="tab">00/05/2015</a></li>');
      var newTab=$('#current-meta-gobernacion-tab').clone();
      $(newTab).attr('id',tabName);
      $('#current-meta-gobernacion-tab .form-group:eq(0)').remove();
      $('#meta-gobernacion-tabs .tab-content').prepend($(newTab).prop('outerHTML'));
      $(ul).find('li:eq(1) a').tab('show');
  })

    $('#meta-gobernacion-tabs').delegate('.add-concepto-meta-gobernacion-btn','click',function(){
      var tab=$(this).closest('.tab-pane');
      var table=$(tab).find('table');
      var concepto=$(tab).find('.concepto-meta-gobernacion-select').val();
      var monto=$(tab).find('.monto-meta-gobernacion-input').val();
      $(table).prepend('<tr><td>'+concepto+'</td><td>'+monto+'</td></tr>')
  })

    $('.concepto-meta-gobernacion-select').chosen({width:"100%"})
    $('#add-serie-btn').click(function(){
        var value=$('#serie-input').val();
        if(value=="")
          return;
      $('#serie-table tbody').append("<tr><td>"+value+"</td><td><button class='btn btn-danger remove-serie-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>");
  });
    $('#serie-table').delegate('.remove-serie-btn','click',function(){
        $(this).closest('tr').remove();
    });

    $('#new-meta-saar-li').click(function(){
      var tabName='meta-saar-tab';
      var ul=$(this).closest('ul');
      $(this).after('<li role="presentation"><a href="#'+tabName+'" aria-controls="'+tabName+'" role="tab" data-toggle="tab">00/05/2015</a></li>');
      var newTab=$('#current-meta-saar-tab').clone();
      $(newTab).attr('id',tabName);
      $('#current-meta-saar-tab .form-group:eq(0)').remove();
      $('#meta-saar-tabs .tab-content').prepend($(newTab).prop('outerHTML'));
      $(ul).find('li:eq(1) a').tab('show');
  })

    $('#meta-saar-tabs').delegate('.add-concepto-meta-saar-btn','click',function(){
      var tab=$(this).closest('.tab-pane');
      var table=$(tab).find('table');
      var concepto=$(tab).find('.concepto-meta-saar-select').val();
      var monto=$(tab).find('.monto-meta-saar-input').val();
      $(table).prepend('<tr><td>'+concepto+'</td><td>'+monto+'</td></tr>')
  })

    $('.concepto-meta-saar-select').chosen({width:"100%"})

    $('#add-serie-btn').click(function(){
        var value=$('#serie-input').val();
        if(value=="")
          return;
      $('#serie-table tbody').append("<tr><td>"+value+"</td><td><button class='btn btn-danger remove-serie-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>");
  });

    $('#serie-table').delegate('.remove-serie-btn','click',function(){
        $(this).closest('tr').remove();
    });

    $('#add-precio-btn').click(function(){
        var value=$('#precio-input').val();
        if(value=="")
          return;
      $('#precio-table tbody').append("<tr><td>"+value+"</td><td>" +
       "<button class='btn btn-danger remove-precio-btn'><span class='glyphicon glyphicon-minus'></span></button></td></tr>");
  });

    $('#precio-table').delegate('.remove-precio-btn','click',function(){
        $(this).closest('tr').remove();
    });

    $('#add-concepto-btn').click(function(){
        var value=$('#concepto-input').val();
        if(value=="")
          return;
      $('#concepto-table tbody').append("<tr>\
        <td><input class='form-control' value='"+value+"' name='conceptos[][nombre]'></td>
        <td><input type='text' class='form-control' value='0' name='conceptos[][costo]'></td>
        <td><button class='btn btn-danger remove-concepto-btn'><span class='glyphicon glyphicon-minus'></span></button></td>\
        </tr>");
  });

    $('#concepto-table').delegate('.remove-concepto-btn','click',function(){
        var tr=$(this).closest('tr');
        if($(tr).data('id') == undefined){
            $(tr).remove();
        }else{
            $(tr).hide().addClass('deleted');
        }
    });

    $('#add-porton-btn').click(function(){
        var value=$('#porton-input').val();
        if(value=="")
          return;
      $('#porton-table tbody').append("<tr>\
        <td><input type='text' class='form-control' value='"+value+"' name='portonesNuevos[][nombre]'></td>
        <td><button class='btn btn-danger remove-porton-btn'><span class='glyphicon glyphicon-minus'></span></button></td>\
        </tr>");
  });

<td class="text-right"><button class='btn btn-danger remove-porton-btn'><span class='glyphicon glyphicon-minus'></span></button></td>
    $('#porton-table').delegate('.remove-porton-btn','click',function(){
        var tr=$(this).closest('tr');
        if($(tr).data('id') == undefined){
            $(tr).remove();
        }else{
            $(tr).hide().addClass('deleted');
        }
    });

});


 </script>

 @endsection