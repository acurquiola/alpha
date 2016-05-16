@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tasas</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <select class="form-control" id="turno-input">
                            @for($i=1; $i<=$aeropuerto->n_tasas_turnos; $i++)
                                <option value="{{$i}}">Turno {{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" id="taquilla-input">
                            @for($i=1; $i<=$aeropuerto->n_tasas_taquillas; $i++)
                                <option value="{{$i}}">Taquilla {{$i}}</option>
                            @endfor
                            <option value="CV">Control de vuelo</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group" id="dia-div">
                                <div class="col-xs-8 col-xs-offset-2  text-center">
                                    <div class="input-group">
                                        <input type="text" id="dia-datepicker" class="form-control" placeholder="Seleccione un dia." autocomplete="off">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-default pull-right" id="date-select-panel-btn" data-url="{{action('TasaController@getOperacion')}}"><span class="hidden-sm">Aceptar</span> <span class="glyphicon glyphicon-share-alt"></span></button>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div id="consultas_wrapper">
    </div>
</div>
@endsection

@section('script')
  <script>
    @include('tasas.partials.script')
  </script>
@endsection
