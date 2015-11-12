<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaTasasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ta_tasas', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('codtas');

            $table->string('serie', 3);

            $table->string('femision', 10);

            $table->time('hemision');

            $table->string('tiptas', 12);

            $table->string('status', 12);

            $table->string('encargado', 150);

            $table->string('codbarras', 150);

            $table->string('fVer', 10);

            $table->time('hVer');

            $table->float('valor', 14, 2);

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
		Schema::drop('ta_tasas');
	}

}
