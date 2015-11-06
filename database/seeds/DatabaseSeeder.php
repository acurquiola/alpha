<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call(ModeloAeronaveTableSeeder::class);
		$this->call(PaisTableSeeder::class);
		$this->call(PilotoTableSeeder::class);
		$this->call(PuertoTableSeeder::class);
		$this->call(TipoAeronaveTableSeeder::class);
		$this->call(TipoMatriculaTableSeeder::class);
		$this->call(UsuarioTableSeeder::class);


		Model::reguard();
	}

}