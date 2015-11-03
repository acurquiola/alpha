 @include('shared.header')
 @include('shared.menu')

   <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title">Tasas-taquilla</h3>
                      <span class="pull-right">Fecha: 00/00/0000</span>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                      <div class="form-horizontal">
                        <div class="form-group">
                          <label for="turno-input" class="control-label col-md-2 col-md-offset-8">Turno</label>
                          <div class="col-md-2">
                            <select class="form-control" id="turno-input">
                              <option>Turno 1</option>
                              <option>Turno 2</option>
                              <option>Turno 3</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="taquilla-input" class="control-label col-md-2 col-md-offset-8">Taquilla</label>
                          <div class="col-md-2">
                            <select class="form-control" id="taquilla-input">
                              <option>Taquilla 1</option>
                              <option>Taquilla 2</option>
                              <option>Taquilla 3</option>
                              <option>Control de vuelo</option>
                            </select>
                          </div>
                        </div>
                      </div>



                      <table class="table" id="serie-table">
                        <thead>
                          <th style="min-width:150px">Serie</th>
                          <th>Desde</th>
                          <th>Hasta</th>
                          <th>Cantidad</th>
                          <th style="min-width:150px">Monto</th>
                          <th style="min-width:150px">Sub-total</th>
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
                            <td><input class="form-control hasta-input" autocomplete="off"></td>
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






                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button  class="btn btn-primary">Guardar</button>
                    </div>

                  </div><!-- /.box -->




                </div>

              </div>
  @include('shared.footer')


      <script>

function calcularMonto(e,increment){

var row=$(e).closest('tr');
var montoInput=$(row).find('.monto-input');
var bsInput=$(row).find('.bs-input');
var hastaInput=$(row).find('.hasta-input');
var desdeInput=$(row).find('.desde-input');
var cantidadInput=$(row).find('.cantidad-input');
var cantidad=$(cantidadInput).val();
cantidad=parseInt(cantidad);
cantidad=(isNaN(cantidad)?0:cantidad);
cantidad+=increment;
if(cantidad<0) cantidad=0;
$(montoInput).text(parseFloat($(bsInput).text())*cantidad);
$(cantidadInput).val(cantidad);
$(hastaInput).val(parseInt($(desdeInput).val())+cantidad-1);
var total=0;
$('.monto-input').each(function(){
  total+=parseFloat($(this).text());
})
$('#tasas-total').text(total);

}

$(document).ready(function(){



$('#add-serie-btn').click(function(){
if($('#serie-select option').length==0)
  return;
var option=$('#serie-select option:selected');
var serie=$(option).text();
$(option).remove();
$('#serie-table tbody').append('<tr> <td class="serie-td"><p class="form-control-static">'+serie+'</p></td> <td><input class="form-control desde-input" value="1" readonly></td> <td><input class="form-control hasta-input"></td> <td> <div class="input-group"> <span class="input-group-btn"> <button class="btn btn-danger subtract-tasa" type="button"><span class="glyphicon glyphicon-minus"></span></button> </span> <input class="form-control cantidad-input" value="0"> <span class="input-group-btn"> <button class="btn btn-primary add-tasa" type="button"><span class="glyphicon glyphicon-plus"></span></button> </span> </td> <td><p class="form-control-static bs-input">80</p></td> <td><p class="form-control-static monto-input">0</p></td> <td><button class="btn btn-danger delete-serie-btn"><span class="glyphicon glyphicon-minus"></span></button></td> </tr>');

})

$('#serie-table').delegate('.delete-serie-btn','click',function(){

var row=$(this).closest('tr');
var serie=$(row).find('.serie-td').text();
$('#serie-select').append('<option>'+serie+'</option>');
$(row).remove();
})


$('#serie-table').delegate('.subtract-tasa','click',function(){

calcularMonto(this,-1);
})

$('#serie-table').delegate('.add-tasa','click',function(){
calcularMonto(this,1);
})

$('#serie-table').delegate('.cantidad-input','keyup',function(){
calcularMonto(this,0);
})
var hastaTimeOut=null;
$('#serie-table').delegate('.hasta-input','keyup',function(){

clearTimeout(hastaTimeOut);
var input=this;
hastaTimeOut=setTimeout(function(){
  var row=$(input).closest('tr');
var hastaInput=$(row).find('.hasta-input').val();
var desdeInput=$(row).find('.desde-input').val();
  desdeInput=parseInt(desdeInput);
  hastaInput=parseInt(hastaInput);
hastaInput=(isNaN(hastaInput)?0:hastaInput);
var cantidad=hastaInput-desdeInput+1;
console.log(desdeInput,hastaInput);
$(row).find('.cantidad-input').val(cantidad);
calcularMonto(input,0);},500)

})


})







      </script>