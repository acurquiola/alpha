<?php

use Illuminate\Database\Seeder;


class TipoAeronaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding tipo_aeronave table

        $tipo_aeronave=\App\TipoAeronave::firstOrCreate([
            'nombre'      => 'Avión'

        ]);

        $tipo_aeronave=\App\TipoAeronave::firstOrCreate([
            'nombre'      => 'Helicóptero'

        ]);       
    }
}
