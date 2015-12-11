<?php

use Illuminate\Database\Seeder;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding permission table

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu contrato',
            'slug' => 'menu.contrato'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu factura',
            'slug' => 'menu.factura'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Cliente',
            'slug' => 'menu.cliente'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Módulo',
            'slug' => 'menu.modulo'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Concepto',
            'slug' => 'menu.concepto'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Piloto',
            'slug' => 'menu.piloto'
        ]);


        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Aeronave',
            'slug' => 'menu.aeronave'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Puerto',
            'slug' => 'menu.puerto'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Hangar',
            'slug' => 'menu.hangar'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Modelo Aeronaves',
            'slug' => 'menu.modeloaeronave'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Usuario',
            'slug' => 'menu.usuario'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Cobranza',
            'slug' => 'menu.cobranza'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Estacionamiento',
            'slug' => 'menu.estacionamiento'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Role',
            'slug' => 'menu.role'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Aterrizaje',
            'slug' => 'menu.aterrizaje'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Despegue',
            'slug' => 'menu.despegue'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Carga',
            'slug' => 'menu.carga'
        ]);

        $permission=\App\Permission::firstOrCreate([
            'name' => 'Menu Configuración de Precios SCV',
            'slug' => 'menu.preciosSCV'
        ]);

        
    }
}
