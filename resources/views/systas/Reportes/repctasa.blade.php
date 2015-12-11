@extends('app')
@section('content')
    <div class="row" id="box-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Tasas emitidas detallado</h3>
                </div>

                <div class="box-body text-right">

                    <!-- lOGIN -->
                    <form action="reportes/ctasa.php" method="post" name="form" target="_blank" class="form-horizontal" >

                    <!-- Fecha -->
                    <div class="form-group">
                    <label class="control-label col-md-2">Fecha: </label>
                    		  	<div class="col-md-6">
                    <input type="text" name="f" value="<?= date ("d/m/Y")?>" class="form-control"/>
                     </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-2">Usuario: </label>
                    <div class="col-md-6">
                    <select name="u" id="u" class="form-control">
                    <option value="" selected="selected">Seleccione Usuario</option>

                    </select>
                    </div>
                    </div>

                    <!-- Botones de Accion -->
                    <div class="inputBtn">
                    <input type="submit" name="bConsulta" value="Enviar" class="btn btn-default"/>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection