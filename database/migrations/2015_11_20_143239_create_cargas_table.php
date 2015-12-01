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
			$table->integer('aeronave_id')->unsigned();
			$table->foreign('aeronave_id')->references('id')->on('aeronaves');
			$table->integer('num_vuelo')->nullable();
			$table->float('peso_embarcado');
			$table->float('peso_desembarcado');			
			$table->string('observaciones')->nullable();			
			$table->float('monto_total');	
			$table->integer('precio_carga')->unsigned();
			$table->foreign('precio_carga')->references('id')->on('precios_cargas');				
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
		Schema::drop('cargas');
	}

}