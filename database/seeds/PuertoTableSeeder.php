<?php

use Illuminate\Database\Seeder;


class PuertoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        //seeding pais table

        $puerto = App\Puerto::firstOrCreate([
            'nombre'  => 'Aruba',
            'siglas'  => 'TNCA',
            'estado'  => '1',
            'pais_id' => '15',
        ]);

        $puerto = App\Puerto::firstOrCreate([
            'nombre'  => 'Puerto Ordaz',
            'siglas'  => 'SVPR',
            'estado'  => '1',
            'pais_id' => '232',
        ]);
    }
}
