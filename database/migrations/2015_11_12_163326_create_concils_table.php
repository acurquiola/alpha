<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('concils', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('encargado', 150);

            $table->string('codbarras', 150);

            $table->string('fVer', 10);

            $table->time('hVer');

            $table->text('serie');

            $table->string('codtas', 4);

            $table->integer('tiptas');

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
		Schema::drop('concils');
	}

}
