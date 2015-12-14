<?php

use Illuminate\Database\Seeder;

class AeropuertosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('aeropuertos')->delete();
        
		\DB::table('aeropuertos')->insert(array (
			0 => 
			array (
				'id' => 1,
				'nombre' => 'PZO',
				'created_at' => '2015-07-31 08:14:28',
				'updated_at' => '2015-07-31 08:14:28',
			),
			1 => 
			array (
				'id' => 2,
				'nombre' => 'CBL',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'nombre' => 'SEU',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
