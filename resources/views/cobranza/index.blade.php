@extends('app')
@section('content')

<ol class="breadcrumb">
  <li><a href="{{url('principal')}}">Inicio</a></li>
  <li><a href="{{ URL::to('cobranza/Todos/main') }}">Cobranza</a></li>
  <li><a class="active">Cobranza - {{$modulo->nombre}}</a></li>
</ol>
    <div class="row" id="box-wrapper">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Filtros</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body text-right"  id="container">
				{!! Form::open(["url" => action('CobranzaController@index',[$modulo->nombre]), "method" => "GET", "class"=>"form-inline"]) !!}
				{!! Form::hidden('sortName', array_get( $input, 'sortName'), []) !!}
				{!! Form::hidden('sortType', array_get( $input, 'sortType'), []) !!}
				<div class="form-group">
					{{-- por los momentos lo colocare en id pero debe ser el numero de factura --}}
					{!! Form::hidden('cobroIdOperator', array_get( $input, 'cobroIdOperator'), ['id' => 'cobroIdOperator', 'class' => 'operator-input', 'autocomplete'=>'off']) !!}
					<div class="input-group">
						<div class="input-group-btn">
							<button style="max-height:37px" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="operator-text">{{array_get( $input, 'cobroIdOperator')}}</span></button>
							<ul class="dropdown-menu operator-list">
								<li><a href="#">>=</a></li>
								<li><a href="#"><=</a></li>
								<li><a href="#">=</a></li>
							</ul>
						</div>
						{!! Form::text('id', array_get( $input, 'id'), [ 'class'=>"form-control", 'style' => 'padding-left:2px', 'placeholder'=>'Número factura', 'style'=>'max-width:112px']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::text('clienteNombre', array_get( $input, 'clienteNombre'), [ 'class'=>"form-control", 'placeholder'=>'Cliente', 'style'=>'max-width:100px']) !!}
				</div>
				<div class="form-group">
					{!! Form::hidden('fechaOperator', array_get( $input, 'fechaOperator'), ['id' => 'fechaOperator', 'class' => 'operator-input', 'autocomplete'=>'off']) !!}
					<div class="input-group">
						<div class="input-group-btn">
							<button style="max-height:37px" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="operator-text">{{array_get( $input, 'fechaOperator')}}</span></button>
							<ul class="dropdown-menu operator-list">
								<li><a href="#">>=</a></li>
								<li><a href="#"><=</a></li>
								<li><a href="#">=</a></li>
							</ul>
						</div>
						{!! Form::text('fecha', array_get( $input, 'fecha'), ['id'=>'f-datepicker', 'class'=>"form-control", 'placeholder'=>'Fecha de inicio', 'style' => 'padding-left:2px', 'placeholder'=> 'Fecha de emisión', 'style'=>'max-width:112px']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::hidden('pagadoOperator', array_get( $input, 'pagadoOperator'), ['id' => 'pagadoOperator', 'class' => 'operator-input', 'autocomplete'=>'off']) !!}
					<div class="input-group">
						<div class="input-group-btn">
							<button style="max-height:37px" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="operator-text">{{array_get( $input, 'pagadoOperator')}}</span></button>
							<ul class="dropdown-menu operator-list">
								<li><a href="#">>=</a></li>
								<li><a href="#"><=</a></li>
								<li><a href="#">=</a></li>
							</ul>
						</div>
						{!! Form::text('pagado', array_get( $input, 'total'), [ 'class'=>"form-control", 'style' => 'padding-left:2px', 'placeholder'=>'Pagado', 'style'=>'max-width:100px']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::hidden('depositadoOperator', array_get( $input, 'depositadoOperator'), ['id' => 'depositadoOperator', 'class' => 'operator-input', 'autocomplete'=>'off']) !!}
					<div class="input-group">
						<div class="input-group-btn">
							<button style="max-height:37px" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="operator-text">{{array_get( $input, 'depositadoOperator')}}</span></button>
							<ul class="dropdown-menu operator-list">
								<li><a href="#">>=</a></li>
								<li><a href="#"><=</a></li>
								<li><a href="#">=</a></li>
							</ul>
						</div>
						{!! Form::text('depositado', array_get( $input, 'depositado'), [ 'class'=>"form-control", 'style' => 'padding-left:2px', 'placeholder'=>'Depositado', 'style'=>'max-width:100px']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::text('observacion', array_get( $input, 'observacion'), [ 'class'=>"form-control", 'placeholder'=>'Observación', 'style'=>'max-width:150px']) !!}
				</div>
				<button type="submit" class="btn btn-default">Buscar</button>
				<a class="btn btn-default" href="{{action('FacturaController@index',[$modulo->nombre])}}">Reset</a>
				{!! Form::close() !!}




				{{--                       --}}
			</div>
		</div>
	</div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Cobranza - {{$modulo->nombre}}</h3>
                </div>
                <div class="box-body"  id="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="list-group">
                                <li class="list-group-item" data-id="1">
                                    <div class="media">
                                        <div class="pull-right media-right">
                                            <div class="btn-group-vertical  btn-group-xs" role="group" aria-label="...">
                                                <a class="btn btn-primary" href="{{action('CobranzaController@create', [$modulo->nombre]) }}">&nbsp;<span class="glyphicon glyphicon-plus"></span>&nbsp;</a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Crear un nuevo cobro</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">

                                    <table class="table text-center">
                                        <thead class="bg-primary">
                                            <tr>
                                                {!!Html::sortableColumnTitle("Numéro", "nContrato")!!}
                                                {!!Html::sortableColumnTitle("Cliente", "clienteNombre")!!}
                                                {!!Html::sortableColumnTitle("Fecha", "clienteNombre")!!}
                                                {!!Html::sortableColumnTitle("Monto pagado", "conceptoNombre")!!}
                                                {!!Html::sortableColumnTitle("Monto depositado", "fechaInicio")!!}
                                                {!!Html::sortableColumnTitle("Observaciones", "fechaVencimiento")!!}
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cobros as $cobro)
                                                <tr>
                                                    <td class='text-justify'>{{$cobro->id}}</td>
                                                    <td style="text-align: left">{{$cobro->cliente->nombre}}</td>
                                                    <td>{{$cobro->created_at}}</td>
                                                    <td style="text-align: right">{{$traductor->format($cobro->montofacturas)}}</td>
                                                    <td style="text-align: right">{{$traductor->format($cobro->montodepositado)}}</td>
                                                    <td class='text-justify'>{{$cobro->observacion}}</td>
                                                    <td>
                                                        <div class='btn-group  btn-group-sm' role='group' aria-label='...'>
                                                            <a class='btn btn-primary' href='{{action('CobranzaController@show', [$modulo->nombre,$cobro->id])}}'><span class='glyphicon glyphicon-eye-open'></span></a>
                                                            <button class='btn btn-danger delete-cobro-btn' data-id="{{$cobro->id}}"><span class='glyphicon glyphicon-remove'></span></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                </div>
            </div>
        </div>
    </div>





@endsection
@section('script')
<script>

$(function(){

$('.delete-cobro-btn').click(function(){
    var tr=$(this).closest('tr');
    var id=$(this).data("id");
    var url="{{url('cobranza/'.$modulo->nombre.'/cobro')}}/"+id;
    alertify.confirm("Desea eliminar el cobro seleccionado?", function (e) {
        if (e) {
            $.ajax({url: url,
            method:"DELETE"})
            .done(function(response, status, responseObject){
                try{
                    var obj= JSON.parse(responseObject.responseText);
                    if(obj.success==1){
                    $(tr).remove();
                        alertify.success(obj.text);
                    }else{
                        alertify.error(obj.text);
                    }
                }catch(e){
                    console.log(e);
                    alertify.error("Error en el servidor");
                }
            })
        }
    });

    })
})

</script>

@endsection