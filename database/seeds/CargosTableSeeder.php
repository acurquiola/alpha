<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
        
		\DB::table('cargos')->insert(array (
			0 => 
			array (
				'id' => 1,
				'nombre' => 'Cargo 1',
				'created_at' => '2015-07-31 08:12:36',
				'updated_at' => '2015-12-07 20:12:47',
			),
		));
	}

}
