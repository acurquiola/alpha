<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtrosCargosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('otros_cargos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_cargo');
			$table->float('precio_cargo');
			$table->integer('conceptoCredito_id')->unsigned();
			$table->foreign('conceptoCredito_id')->references('id')->on('conceptos');
			$table->integer('conceptoContado_id')->unsigned();
			$table->foreign('conceptoContado_id')->references('id')->on('conceptos');
			$table->integer('preciosOtrosCargos_id')->unsigned();
			$table->foreign('preciosOtrosCargos_id')->references('id')->on('precios_otros_cargos');
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
		Schema::drop('otros_cargos');
	}

}
