<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasaCierresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasa_cierres', function(Blueprint $table)
		{
			$table->increments('id');

            $table->date('fcierre');

            $table->time('hcierre');

            $table->string('monto', 12);

            $table->string('encargado', 150);

            $table->text('observacion');

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
		Schema::drop('tasa_cierres');
	}

}
