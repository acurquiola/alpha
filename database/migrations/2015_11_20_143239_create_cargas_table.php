<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cargas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha');
			$table->integer('cliente_id')->unsigned();
			$table->foreign('cliente_id')->references('id')->on('clientes');
			$table->integer('num_vuelo')->nullable();
			$table->float('peso_embarcado');
			$table->float('peso_desembarcado');			
			$table->string('observaciones');			
			$table->float('monto_total');			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cargas');
	}

}
