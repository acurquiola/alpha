@extends('app')
@section('content')
              <div class="row" id="box-wrapper">
                <!-- left column -->
                <div class="col-md-6">
                  <h3>Cobranza</h3>
                </div>

              </div>
              <div class="row" id="box-wrapper">

                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header">
                      <h3 class="box-title"> </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <h3>{{$cobro->cliente->codigo}} <small>{{$cobro->cliente->nombre}}</small></h3>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>




              </div>
@endsection
