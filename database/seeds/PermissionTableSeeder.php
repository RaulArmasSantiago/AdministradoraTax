<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuarios del sistema
        Permission::create([
            'name'          => 'Super Usuario',
            'slug'          => 'users.root',
            'description'   => 'Puede ver todo de todos'
        ]);
        Permission::create([
            'name'          => 'Administrador',
            'slug'          => 'users.manager',
            'description'   => 'Permite ver todo lo relacionado a sus usuarios'
        ]);
        Permission::create([
            'name'          => 'Mostrador',
            'slug'          => 'users.reception',
            'description'   => 'Usuario de mostrador'
        ]);
    }
}
