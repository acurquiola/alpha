<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMontosFijosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('montos_fijos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('unidad_tributaria');
			$table->float('dolar_oficial');
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
		Schema::drop('montos_fijos');
	}

}
