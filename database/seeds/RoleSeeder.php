<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Recepcionista']);
        $role3 = Role::create(['name' => 'Laboratorista']);
        $role4 = Role::create(['name' => 'Fisioterapista']);
        $role5 = Role::create(['name' => 'Paciente']);
        $role6 = Role::create(['name' => 'Enfermeria']);
        $role7 = Role::create(['name' => 'Cardiologo']);


        $permission1 = Permission::create(['name' => 'admin.usuarios.index',
                                            'description'=>'Ver listado de usuarios']);
        $permission2 = Permission::create(['name' => 'admin.usuarios.edit',
                                            'description'=>'Asignar roles a usuario']);
        // $permission3 = Permission::create(['name' => 'admin.usuarios.update',
        //                                     'description'=>'']);
        // $permission4 = Permission::create(['name' => 'admin.usuarios',
        //                                     'description'=>'']);
        $role1->syncPermissions([$permission1,$permission2]);
    }
}
