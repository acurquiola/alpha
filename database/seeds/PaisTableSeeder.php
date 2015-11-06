<?php

use Illuminate\Database\Seeder;


class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        //seeding pais table

        $pais    = App\Pais::firstOrCreate([
            'id'     => '13',
            'siglas' => 'AR',
            'nombre' => 'Argentina',
            ]);
            
        $pais    = App\Pais::firstOrCreate([
            'id'     => '232',
            'siglas' => 'VE',
            'nombre' => 'Venezuela',
            ]);
            
        $pais    = App\Pais::firstOrCreate([
            'id'     => '229',
            'siglas' => 'UY',
            'nombre' => 'Uruguay',
            ]);
            
        $pais    = App\Pais::firstOrCreate([
            'id'     => '15',
            'siglas' => 'AW',
            'nombre' => 'Aruba',
        ]);
    }
}
