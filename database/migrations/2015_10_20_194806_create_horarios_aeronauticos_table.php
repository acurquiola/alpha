<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosAeronauticosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */	public function up()
	{
		Schema::create('horarios_aeronauticos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->time('operaciones_inicio');
			$table->time('operaciones_fin');
			$table->time('sol_salida');
			$table->time('sol_puesta');	
			$table->integer('formularioCredito_id')->unsigned();
			$table->foreign('formularioCredito_id')->references('id')->on('conceptos');
			$table->integer('formularioContado_id')->unsigned();
			$table->foreign('formularioContado_id')->references('id')->on('conceptos');		
			$table->integer('habilitacionCredito_id')->unsigned();
			$table->foreign('habilitacionCredito_id')->references('id')->on('conceptos');		
			$table->integer('habilitacionContado_id')->unsigned();
			$table->foreign('habilitacionContado_id')->references('id')->on('conceptos');	
			$table->integer('abordajeCredito_id')->unsigned();
			$table->foreign('abordajeCredito_id')->references('id')->on('conceptos');		
			$table->integer('abordajeContado_id')->unsigned();
			$table->foreign('abordajeContado_id')->references('id')->on('conceptos');		
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
		Schema::drop('horarios_aeronauticos');
	}

}
