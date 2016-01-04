<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function(Blueprint $table)
		{
			$table->increments('nFactura');
                  $table->integer('aeropuerto_id')->unsigned();
                  $table->foreign('aeropuerto_id')->references('id')->on('aeropuertos');
                  $table->enum('condicionPago', ['Crédito', 'Contado']);
                  $table->string('nControlPrefix', 100);
                  $table->integer('nControl')->unsigned();
                  $table->date('fecha');
                  $table->date('fechaVencimiento');
                  $table->date('fechaControlContrato')->nullable();
                  $table->integer('cliente_id')->unsigned();
                  $table->foreign('cliente_id')->references('id')->on('clientes');
                  $table->integer('modulo_id')->unsigned()->nullable();
                  $table->foreign('modulo_id')->references('id')->on('modulos');
                  $table->integer('contrato_id')->unsigned()->nullable();
                  $table->foreign('contrato_id')->references('id')->on('contratos');
                  $table->float('subtotalNeto')->unsigned();
                  $table->float('descuentoTotal')->unsigned();
                  $table->float('subtotal')->unsigned();
                  $table->float('iva')->unsigned();
                  $table->float('recargoTotal')->unsigned();
                  $table->float('total')->unsigned();
                  $table->integer('nroDosa')->nullable();
                  $table->integer('aterrizaje_id')->unsigned()->nullable();
                  $table->foreign('aterrizaje_id')->references('id')->on('aterrizajes');
                  $table->text('descripcion');
                  $table->text('comentario');
                  $table->char("estado",1);
                  $table->boolean('isImpresa');
                  $table->timestamps();
                  $table->softDeletes();
            });

Schema::create('facturadetalles', function(Blueprint $table)
{
      $table->increments('id');
      $table->integer('factura_id')->unsigned();
      $table->foreign('factura_id')->references('nFactura')->on('facturas');
      $table->integer('concepto_id')->unsigned();
      $table->foreign('concepto_id')->references('id')->on('conceptos');
      $table->integer('cantidadDes')->unsigned();
      $table->float('montoDes')->unsigned();
      $table->float('descuentoPerDes')->unsigned();
      $table->float('descuentoTotalDes')->unsigned();
      $table->float('ivaDes')->unsigned();
      $table->float('recargoPerDes')->unsigned();
      $table->float('recargoTotalDes')->unsigned();
      $table->float('totalDes')->unsigned();
      $table->timestamps();
});

}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
          Schema::drop('facturadetalles');
          Schema::drop('facturas');
    }

}
