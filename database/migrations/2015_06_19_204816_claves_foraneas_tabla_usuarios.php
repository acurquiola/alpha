<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClavesForaneasTablaUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("usuarios", function(Blueprint $table)
		{

    		$table->foreign('departamento_id')->references('id')->on('departamentos');
    		$table->foreign('aeropuerto_id')->references('id')->on('aeropuertos');
    		$table->foreign('cargo_id')->references('id')->on('cargos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("usuarios", function(Blueprint $table)
		{
			//
		});
	}

}
