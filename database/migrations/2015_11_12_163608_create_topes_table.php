<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topes', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('nombre_archivo', 100);

            $table->string('ruta_imagen', 200);

            $table->date('fecha');

            $table->boolean('status');

            $table->string('aeropuerto', 200);

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
		Schema::drop('topes');
	}

}
