<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosVariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cargos_varios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('eq_formulario');
			$table->float('eq_derechoHabilitacion');
			$table->float('eq_usoAbordajeSinHab');
			$table->float('eq_usoAbordajeConHab');
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
		Schema::drop('cargos_varios');
	}

}
