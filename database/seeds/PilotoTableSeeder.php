<?php

use Illuminate\Database\Seeder;


class PilotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        //seeding piloto table

        $piloto    = App\Piloto::firstOrCreate([
            'nombre'              => 'ABREU RODRIGUEZ RAUL',
            'nacionalidad_id'     => '232',
            'documento_identidad' => '11061864',
            'telefono'            => '04241312040',
            'licencia'            => '11064864',
            'estado'              => '1'
            ]);    

        $piloto    = App\Piloto::firstOrCreate([
            'nombre'              => 'VELASQUES JOSE',
            'nacionalidad_id'     => '232',
            'documento_identidad' => '2980419',
            'licencia'            => '2980419',
            'estado'              => '1'
            ]);    

        $piloto    = App\Piloto::firstOrCreate([
            'nombre'              => 'RADOMIR ALEKSIC',
            'nacionalidad_id'     => '232',
            'documento_identidad' => '4437969',
            'licencia'            => '4437969',
            'estado'              => '1'
            ]);
    }
}
