<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablasCobranzas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cobros', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('observacion');
            $table->text('hasrecaudos');
            $table->double('montofacturas',15,2);
            $table->double('montodepositado',15,2);
			$table->timestamps();
		});
        Schema::create('cobro_factura', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('factura_id')->unsigned();
            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->integer('cobro_id')->unsigned();
            $table->foreign('cobro_id')->references('id')->on('cobros');
            $table->double('monto',15,2);
            $table->timestamps();
        });
        Schema::create('cobrospagos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->enum('tipo',["D", "NC"]);
            $table->date('fecha');
            $table->integer('banco_id')->unsigned();
            $table->foreign('banco_id')->references('banco_id')->on('bancoscuentas');
            $table->integer('cuenta_id')->unsigned();
            $table->foreign('cuenta_id')->references('id')->on('bancoscuentas');
            $table->string('ncomprobante', 150);
            $table->double('monto', 15, 2);
            $table->integer('cobro_id')->unsigned();
            $table->foreign('cobro_id')->references('id')->on('cobros');
            $table->timestamps();
        });
        Schema::create('ajustes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('cobro_id')->unsigned();
            $table->foreign('cobro_id')->references('id')->on('cobros');
            $table->double('monto', 15, 2);
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
        Schema::drop('ajustes');
        Schema::drop('cobrospagos');
        Schema::drop('cobro_factura');
		Schema::drop('cobros');
	}

}
