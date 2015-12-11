<?php

use Illuminate\Database\Seeder;


class TipoMatriculaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding tipo_aeronave table

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Privado',
            'siglas'      => 'P'

        ]);

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Comercial Privado',
            'siglas'      => 'CP'
        ]);   

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Comercial',
            'siglas'      => 'C'
        ]);  

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Oficial / Gobierno',
            'siglas'      => 'O'
        ]);   

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Escuela',
            'siglas'      => 'E'
        ]); 

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Militar',
            'siglas'      => 'M'
        ]);

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Agrícola',
            'siglas'      => 'A'
        ]); 

        $tipo_matricula=\App\TipoMatricula::firstOrCreate([
            'nombre'      => 'Adiestramiento',
            'siglas'      => 'MR'
        ]);       
    }
}
