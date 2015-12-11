<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('footers', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('footer', 200);

            $table->dateTime('fecha_registro');

            $table->string('usuario', 100);

            $table->string('status', 1);

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
		Schema::drop('footers');
	}

}
