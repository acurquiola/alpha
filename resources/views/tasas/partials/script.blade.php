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
}

$(function(){

    $('#dia-datepicker').datepicker();

    $('#date-select-panel-btn').click(function(e){
        e.preventDefault();
        var $wrapper=$('#consultas_wrapper');
        var dia=$('#dia-datepicker').val();
        var taquilla=$('#taquilla-input').val();
        var turno=$('#turno-input').val();
        var $btn= $(this);
        $wrapper.html('');
        $.ajax({
            url:$btn.data('url'),
            data:{fecha:dia, taquilla:taquilla, turno:turno}
        }).done(function(response, status, responseObject){
            $wrapper.append(response);
        });

    });

    $('body').delegate('#add-serie-btn', 'click', function(){
        if($('#serie-select option[disabled]:selected').length>0)
          return;
        var $option=$('#serie-select option:selected');
        var serie=$option.text();
        var value=$option.val();
        var inicio=$option.data('inicio');
        var monto=$('#monto-input').val();
        $option.attr('disabled', '');
        $('#serie-table tbody').append(
            '<tr> ' +
                '<td class="serie-td">' +
                    '<input type="hidden" name="serie[]" class="serie-val" value="'+value+'">' +
                    '<p class="form-control-static">'+serie+'</p>' +
                '</td> ' +
                '<td>' +
                    '<input name="desde[]" class="form-control text-right desde-input" value="'+inicio+'">' +
                '</td> ' +
                '<td>' +
                    '<input name="hasta[]" class="form-control text-right hasta-input">' +
                '</td> ' +
                '<td> ' +
                    '<div class="input-group"> ' +
                        '<span class="input-group-btn"> ' +
                            '<button type="button" class="btn btn-danger subtract-tasa" type="button">' +
                                '<span class="glyphicon glyphicon-minus"></span>' +
                            '</button> ' +
                        '</span> ' +
                        '<input name="cantidad[]" class="form-control  text-center cantidad-input" value="0"> ' +
                        '<span class="input-group-btn"> ' +
                            '<button type="button" class="btn btn-primary add-tasa" type="button">' +
                                '<span class="glyphicon glyphicon-plus"></span>' +
                            '</button> ' +
                        '</span> ' +
                    '</div> ' +
                '</td> ' +
                '<td>' +
                    '<input type="hidden" name="monto[]" class="serie-val" value="'+monto+'">' +
                    '<p class="form-control-static text-right bs-input">'+monto+'</p>' +
                '</td> ' +
                '<td>' +
                    '<p class="form-control-static text-right monto-input">0</p>' +
                '</td> ' +
                '<td>' +
                    '<button type="button" class="btn btn-danger delete-serie-btn">' +
                        '<span class="glyphicon glyphicon-minus"></span>' +
                    '</button>' +
                '</td> ' +
            '</tr>');

    })

    $('body').delegate('.delete-serie-btn','click',function(){

        var $row=$(this).closest('tr');
        var serieVal=$row.find('.serie-val').val();
        $('#serie-select option[value="'+serieVal+'"]').removeAttr('disabled');
        $row.remove();
    })


    $('body').delegate('.subtract-tasa','click',function(){
        calcularMonto(this,-1);
    })

    $('body').delegate('.add-tasa','click',function(){
        calcularMonto(this,1);
    })

    $('body').delegate('.cantidad-input','keyup',function(){
        calcularMonto(this,0);
    })
    var hastaTimeOut=null;
    $('body').delegate('.hasta-input, .desde-input','keyup',function(){

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
        $(row).find('.cantidad-input').val(cantidad);
        calcularMonto(input,0);},500)

    })

    $('body').delegate('.save-tasa-btn','click',function(e){
        e.preventDefault();
        var $btn= $(this);
        var $form= $btn.closest('form');
        var $consulta= $form.closest('.consulta');
        var canUpload=true;
        var isSupervisor=$form.data('isSupervisor')=="true";
        $form.find('.hasta-input, .desde-input').each(function(index, value){
            if($(value).val()=="")
                canUpload=false;
        })
        if(canUpload)
            $.ajax({
                url: $form.data('url'),
                data:$form.serializeArray(),
                method: "POST"
            }).always(function(response, status, responseObject){
                if(status!="error"){
                    if(isSupervisor){
                        $consulta.html(response);
                    }else{
                        $('#consultas_wrapper').html(response);
                    }
                    alertify.success('Los datos han sido guardados.');
                }else
                    alertify.error('Error procesando los datos en el servidor.');
            });
    })

})
