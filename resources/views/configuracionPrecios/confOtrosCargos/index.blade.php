<div class="row invoice-info">
	<div class="col-sm-6 invoice-col">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><span class="ion ion-people-stalker"></span> Filtros de Búsqueda</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form class="form-inline">
					{!! Form::hidden('sortName', null, []) !!}
					{!! Form::hidden('sortType', null, []) !!}
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-angle-right"></i>
							</div>
							<input type="text"  name="nombre_cargo" class="form-control nombre_cargo"  placeholder="Nombre del Cargo"/>
					<input type="hidden" name="aeropuerto_id" value="{{session('aeropuerto')->id}}"></input>
						</div><!-- /.input group -->
					</div>						
					<button type="submit" id="filtrar-btn" class="btn btn-primary pull-right" style="margin-left: 20px"><i class="fa fa-filter"></i></button>
				</form>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><span class="ion ion-people-stalker"></span>Otros Cargos</h3>
			</div><!-- /.box-header -->
			<div class="box-body" id="table-wrapper">
			</div><!-- /.box-body -->
			<!-- <div class="overlay">
				<i class="fa fa-refresh fa-spin"></i>
			</div> -->
		</div><!-- /.box -->

	</div><!-- /.invoice col -->

	<div class="col-sm-4 invoice-col">	
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Registro de Otros Cargos</h3>
			</div>
			<div class="box-body" id="otrosCargos-div">
				<form id="otrosCargos-form">
					<div class="input-group">
						<span class="input-group-addon"><i class="ion ion-android-arrow-dropright"></i></span>
						<input type="text" class="form-control" name="nombre_cargo" placeholder="Descripción">
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon">BsF.</span>
						<input type="text" name="precio_cargo" class="form-control" placeholder="Monto">

						<span class="input-group-addon"><i class="fa fa-money"></i></span>
					</div>
					</br>
					<div class="input-group">
						<select class="form-control" id="conceptoCredito_id"  name="conceptoCredito_id" required>
							<option value="">--Seleccione Concepto - Crédito--</option>
	                        @foreach ($conceptos as $index => $concepto)
	                        <option value="{{$index}}"> {{$concepto}}</option>
	                        @endforeach
						</select>
					</div>
					<div class="input-group">
						<select class="form-control" id="conceptoContado_id"  name="conceptoContado_id" required>
							<option value="">--Seleccione Concepto - Contado--</option>
	                        @foreach ($conceptos as $index => $concepto)
	                        <option value="{{$index}}"> {{$concepto}}</option>
	                        @endforeach
						</select>
					</div>
				</div><!-- /.box-body -->
			</form>
			<div class="box-footer" align="right">
 				<button class="btn btn-default" type="button" id="cancel-otrosCargos-btn">Cancelar </button>
 			    <button class="btn btn-primary" type="submit" id="save-otrosCargos-btn"> Registrar </button>
     		</div><!-- ./box-footer -->
		</div><!-- /.box -->
	</div> <!-- /.col -->
</div> <!-- /.invoice info -->


@section('script')
@parent
<script> 

function getTable(url){

	$('#table-wrapper').load(url)

}
	$(document).ready(function() {

	/*	
    	Listar los registros 
    	*/

	    	$('#filtrar-btn').click(function(e){
	    		e.preventDefault();
	    		var data=$(this).closest('form').serialize();
	    		getTable("{{action('OtrosCargoController@index')}}?"+data);
	    	}).trigger('click');


	    	$('#table-wrapper').delegate('.pagination li a', 'click', function(e){
	    		e.preventDefault();

    	    //Hay que quitar el slash antes del ?, no se como no generarlo pero replace resuelve.
    	    
    	    getTable($(this).attr('href').replace("/?", "?"));
    	})
   	

   	    /*   
            Eliminar registro
            */
            
            $('body').delegate('.eliminarOtroCargo-btn', 'click', function(){
            var tr  =$(this).closest('tr');
            var id  =$(this).data('id');
            var url ="{{action('OtrosCargoController@index')}}/"+id;
            
            // confirm dialog
            alertify.confirm("¿Realmente desea  eliminar este registro?", function (e){
                if (e) {        

                    $.ajax({url: url,
                        method:"DELETE"})
                    .done(function(response, status, responseObject){
                        try{
                            var obj= JSON.parse(responseObject.responseText);
                            if(obj.success==1){
                                $(tr).remove();
                                $('#filtrar-btn').trigger('click');
                                alertify.success(obj.text);
                            }
                        }catch(e){
                            console.log(e);
                            alertify.error('Error procesando la información');
                        }
                    })
                } 
            })
        })

   	/*  
        Guardar un nuevo registro
        */
        $('#save-otrosCargos-btn').click(function(){

            var data=$('#otrosCargos-form').serializeArray();
            
            var overlay=    "<div class='overlay'>\
            <i class='fa fa-refresh fa-spin></i>\
            </div>";
            $('#otrosCargos-div').append(overlay);

            $.ajax(
                {data:data,
                    method:'post',
                    url:"{{action('OtrosCargoController@store')}}"}
                    )
            .always(function(response, status, responseObject){
               $('#otrosCargos-div .overlay').remove();
                if(status=="error"){
                    if(response.status==422){
                        alertify.error(processValidation(response.responseJSON));
                    }
                }else{

                    try{
                        var respuesta=JSON.parse(responseObject.responseText);
                        if(respuesta.success==1)
                        {
                            $('#otrosCargos-form input').val('');
                            $('#save-aeronave-btn').attr('disabled','disabled');
                            $('#filtrar-btn').trigger('click');
                            alertify.success(respuesta.text);
                        }
                        else
                        {
                            alertify.error(respuesta.text);
                        }
                    }
                    catch(e)
                    {
                        alertify.error("Error procensando la información");
                    }
                }
            })
        })
	})

</script>
@endsection('script')