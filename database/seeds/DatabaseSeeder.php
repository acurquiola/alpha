<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('AeropuertosTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionRoleTableSeeder');
		$this->call('UsuariosTableSeeder');
		$this->call('RoleUsuarioTableSeeder');
		$this->call('TipoAeronavesTableSeeder');
		$this->call('TipoMatriculasTableSeeder');
		$this->call('ClientesTableSeeder');
		$this->call('PaisTableSeeder');
		$this->call('NacionalidadMatriculasTableSeeder');
		$this->call('NacionalidadVuelosTableSeeder');
		$this->call('ModeloAeronavesTableSeeder');
		$this->call('HangarsTableSeeder');
		$this->call('HorariosAeronauticosTableSeeder');
		$this->call('CargosVariosTableSeeder');
		$this->call('EstacionamientoAeronavesTableSeeder');
		$this->call('ConceptosTableSeeder');
		$this->call('AeronavesTableSeeder');
		$this->call('PreciosAterrizajesDespeguesTableSeeder');
		$this->call('PreciosCargasTableSeeder');
		$this->call('MontosFijosTableSeeder');
		$this->call('OtrosCargosTableSeeder');
		$this->call('ModulosTableSeeder');
		$this->call('PilotosTableSeeder');
		$this->call('PuertosTableSeeder');
		$this->call('BancosTableSeeder');
		$this->call('BancoscuentasTableSeeder');

		Model::reguard();
		
	}

}