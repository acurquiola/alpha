<?php

use Illuminate\Database\Seeder;


class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        //seeding usuario table

        $usuario = App\Usuario::firstOrCreate([
            'username'        => 'admin',
            'password'        => bcrypt('12345'),
        ]);  
        //seeding usuario table

        $usuario = App\Usuario::firstOrCreate([
            'username'        => 'supervisor-scv',
            'password'        => bcrypt('12345'),
        ]);  
        //seeding usuario table

        $usuario = App\Usuario::firstOrCreate([
            'username'        => 'recaudacion',
            'password'        => bcrypt('12345'),
        ]);  
    }
}
