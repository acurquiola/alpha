<?php

use Illuminate\Database\Seeder;


class ModeloAeronaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding modelo_aeronaves table

        $modelo_aeronaves=\App\ModeloAeronave::firstOrCreate([
            'modelo'      => '206B3',
            'peso_maximo' => '1500',
            'tipo_id'     => '2'
        ]);
        
        $modelo_aeronaves=\App\ModeloAeronave::firstOrCreate([
            'modelo'      => '8R-GHB',
            'peso_maximo' => '2500',
            'tipo_id'     => '1'
        ]);
        
        $modelo_aeronaves=\App\ModeloAeronave::firstOrCreate([
            'modelo'      => 'A-109',
            'peso_maximo' => '2000',
            'tipo_id'     => '2'
        ]);
        
        $modelo_aeronaves=\App\ModeloAeronave::firstOrCreate([
            'modelo'      => 'A-119',
            'peso_maximo' => '3000',
            'tipo_id'     => '2'
        ]);
        
    }
}
