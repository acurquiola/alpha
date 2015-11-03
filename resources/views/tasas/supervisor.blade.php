 @include('shared.header')
 @include('shared.menu')
              <div class="row" id="box-wrapper">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">Tasas supervisor</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

<div class="row">
<div class="col-xs-10 col-xs-offset-1">
  <h4>Seleccione modo de carga</h4>
  <div class="row" style="margin-bottom:15px">
    <div class="col-xs-6 text-center">
<label class="radio-inline">
  <input type="radio" name="date-radio" id="dia-radio" checked autocomplete="off"> Dia
</label>
</div>
    <div class="col-xs-6  text-center">
<label class="radio-inline">
  <input type="radio" name="date-radio" id="rango-radio" autocomplete="off"> Rango
</label>
</div>
 </div>
   <div class="form-group" id="dia-div">
  <div class="col-xs-8 col-xs-offset-2  text-center">
    <div class="input-group">
<input type="text" id="dia-datepicker" class="form-control" placeholder="Seleccione un dia." autocomplete="off">
<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
  </div>
   </div>
  </div>
     <div class="form-group" style="display:none" id="rango-div">
  <div class="col-xs-6 text-center">
    <div class="input-group">
<input type="text" id="inicial-datepicker" class="form-control" placeholder="Seleccione el dia inicial." autocomplete="off">
<div class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></div>
  </div>
   </div>
     <div class="col-xs-6 text-center">
    <div class="input-group">
<input type="text" id="final-datepicker" class="form-control" placeholder="Seleccione el dia final." autocomplete="off">
<div class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></div>
  </div>
   </div>
  </div>
  <button class="btn btn-default pull-right" id="date-select-panel-btn">Aceptar</button>
   </div>
  </div>
                    </div><!-- /.box-body -->

                  </div><!-- /.box -->
                </div>
              </div>

<div class="modal fade" id="register-payment-modal" tabindex="-1" role="dialog" aria-labelledby="register-payment-modal" aria-hidden="true"
data-backdrop="static">
<div class="modal-dialog">     
  <div class="modal-content">      
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancelar</span></button>         
      <h4 class="modal-title">Registrar una forma de pago</h4>       
    </div>
    <div class="modal-body">       
     <div class="form-horizontal">
              <div class="form-group">
        <label for="forma-modal-input" class="col-sm-2 control-label">Forma de pago</label>
        <div class="col-md-10">
          <select class="form-control" id="forma-modal-input">
            <option>Deposito</option>
            <option>Nota de credito</option>
          </select>
        </div>
      </div>
        <div class="form-group">
        <label for="fecha-modal-input" class="col-sm-2 control-label">Fecha</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="fecha-modal-input" autocomplete='off'>
        </div>
      </div>
        <div class="form-group">
        <label for="banco-modal-input" class="col-sm-2 control-label">Banco</label>
        <div class="col-md-10">
          <select id="banco-modal-input" class="form-control">
            <option>Banco 1</option>
            <option>Banco 2</option>
            <option>Banco 3</option>
          </select>
        </div>
      </div>
        <div class="form-group">
        <label for="cuenta-modal-input" class="col-sm-2 control-label">Cuenta</label>
        <div class="col-md-10">
          <select id="cuenta-modal-input" class="form-control">
            <option>000-000-0-0-0-0000-0000-00</option>
            <option>000-000-0-0-0-0000-0000-00</option>
            <option>000-000-0-0-0-0000-0000-00</option>
          </select>
        </div>
      </div>
              <div class="form-group">
        <label for="deposito-modal-input" class="col-sm-2 control-label">#Deposito/#Lote</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="deposito-modal-input" autocomplete='off'>
        </div>
      </div>
                    <div class="form-group">
        <label for="acta-modal-input" class="col-sm-2 control-label">Acta</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="acta-modal-input" autocomplete='off' readonly value="000000">
        </div>
      </div>
                    <div class="form-group">
        <label for="monto-modal-input" class="col-sm-2 control-label">Monto</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="monto-modal-input" autocomplete='off'>
        </div>
      </div>
</div>
    </div>    
    <div class="modal-footer">       
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
     <button type="button" class="btn btn-primary" id="delete-modal-btn">Aceptar</button>     
   </div>
 </div>  
</div> 
</div>

<div class="modal fade" id="detalle-modal" tabindex="-1" role="dialog" aria-labelledby="register-payment-modal" aria-hidden="true"
data-backdrop="static">
<div class="modal-dialog modal-lg">     
  <div class="modal-content">      
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancelar</span></button>         
      <h4 class="modal-title">Registrar una forma de pago</h4>       
    </div>
    <div class="modal-body">       
     <div class="form-horizontal">
                      <table class="table" id="serie-table">
                        <thead>
                          <th style="min-width:120px">Serie</th>
                          <th>Desde</th>
                          <th>Hasta</th>
                          <th>Cantidad</th>
                          <th>Bs.</th>
                          <th>Monto</th>
                          <th>Accion</th>
                        </thead>
                        <tbody>
                           <tr>
                            <td class="serie-td">
                              <select class="form-control" id="serie-select" autocomplete="off">
                                <option>Serie B</option>
                            <option>Serie C</option>
                          <option>Serie D</option>
                        </select></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="btn btn-primary" id="add-serie-btn"><span class="glyphicon glyphicon-plus"></span></button></td>
                          </tr>
                          <tr>
                            <td class="serie-td"><p class="form-control-static">Serie A</p></td>
                            <td><input class="form-control desde-input" value="1" readonly></td>
                            <td><input class="form-control hasta-input" autocomplete="off" readonly></td>
                            <td>    <div class="input-group">
                              <span class="input-group-btn">
                                <button class="btn btn-danger subtract-tasa" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                              </span>
                              <input class="form-control cantidad-input" value="0" autocomplete="off">
                              <span class="input-group-btn">
                                <button class="btn btn-primary add-tasa" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                              </span>
                            </td>
                            <td><p class="form-control-static bs-input">80</p></td>
                            <td><p class="form-control-static monto-input">0</p></td>
                            <td><button class="btn btn-danger delete-serie-btn"><span class="glyphicon glyphicon-minus"></span></button></td>
                          </tr>
                        </tbody>
                      </table>

<div class="row">
<div class="col-md-11 text-right">
<label>Total</label>
<span id="tasas-total">0</span>
</div>

</div>
      </div>   
     </div>   
    <div class="modal-footer">       
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
     <button type="button" class="btn btn-primary" id="delete-modal-btn">Guardar</button>     
   </div>
 </div>  
</div> 
</div>

               @include('shared.footer')

                <script>



$(document).ready(function(){
$('#dia-datepicker,#final-datepicker,#inicial-datepicker').datepicker({
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

$('#rango-radio').change(function(){
  if($(this)[0].checked==true){
    $('#dia-div').hide();
    $('#rango-div').show();
  }
})
$('#dia-radio').change(function(){
  if($(this)[0].checked==true){
    $('#dia-div').show();
    $('#rango-div').hide();
  }
})
$('#date-select-back-btn').click(function(){
    $('#box-wrapper .box-item').remove();
    $('#date-select-back-panel').hide();
    $('#date-select-panel').show();
})
$('#date-select-panel-btn').click(function(){
var inicial;
var fin;
   var formData=new FormData();
  if($('#dia-radio:checked').length>0){
    var dia=$('#dia-datepicker').val();
            formData.append("inicial",dia);
    formData.append("fin",dia);
    inicial=fin=Date.parse(dia)+86400000;
  }else{
    inicial=$('#inicial-datepicker').val();
    formData.append("inicial",inicial);
    inicial=Date.parse(inicial)+86400000;
    fin=$('#final-datepicker').val();
       formData.append("fin",fin);
    fin=Date.parse(fin)+86400000;
  }
  if(inicial>fin){
    alert("La fecha de inicio no puede ser mayor a la fecha de final.");
  }else{
    $('#date-select-panel').hide();
    $('#date-select-back-panel').show();
  }

    for(var i=inicial;i<=fin;i+=86400000){
var date=$.datepicker.formatDate('dd/mm/yy', new Date(i));
      var box='<div class="col-md-12" class="box-item"> <div class="box box-primary"> <div class="box-header"><div class="row"><div class="col-md-4"> <h3 class="box-title">Acta N 000000</h3></div><div class="col-md-4 text-center"> <h3 class="box-title">'+date+'</h3> </div><div class="col-md-4 text-right"><button data-fecha="'+date+'" class="btn btn-default detalle-btn">Detalle</button> </div></div><div class="box-body"><div class="row"><div class="col-md-4 col-md-offset-4"> <table class="table text-center"> <thead> <th>Serie</th> <th>Monto </th> <tbody> <tr> <td>Serie A</td> <td>00.0</td>  </tr> <tr> <td>Serie B</td> <td>00.0</td>  </tr> <tr> <td>Serie C</td> <td>00.0</td>  </tr> <tr> <td>Serie D</td> <td>00.0</td>  </tr> </tbody> </table></div> </div><div class="row" style="margin:15px 0px"> <div class="col-xs-12 text-right"> <label> Total: 00.0</label> </div> </div> <div class="row"> <div class="col-xs-12 text-right"> <button class="btn btn-primary register-payment-btn"><span class="glyphicon glyphicon-plus"></span> Registrar pago</button> </div> </div> <table class="table"> <thead> <th>Fecha</th> <th>Banco</th> <th>Cuenta</th><th>Forma de pago</th> <th>#Deposito/#Lote</th> <th>Acta</th> <th>Monto</th> </thead> <tbody><tr><td>01/01/15</td><td>Banco 1</td><td>000-000-0-0-0-0000-0000-00</td><td>Deposito</td><td>4365675676</td><td>000000</td><td>00.0</td><td><button class="btn btn-danger remove-payment-btn"><span class="glyphicon glyphicon-minus"></span></button></td></tr></tbody> </table> </div> <div class="box-footer"> <button  class="btn btn-primary">Consolidar</button> </div> </div> </div>';

       $('#box-wrapper').append(box);
}

  

})


$('#box-wrapper').delegate('.register-payment-btn','click',function(){

$('#register-payment-modal').modal('show');

})

$('#box-wrapper').delegate('.detalle-btn','click',function(){

$('#detalle-modal').modal('show');

})

})







      </script>