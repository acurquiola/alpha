<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('departamentos')->delete();
        
		\DB::table('departamentos')->insert(array (
			0 => 
			array (
				'id' => 1,
				'nombre' => 'Departamento 1',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
