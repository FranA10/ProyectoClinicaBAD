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
        $role5 = Role::create(['name' => 'Cardiologo']);
        $role6 = Role::create(['name' => 'Medico general']);
        $role7 = Role::create(['name' => 'Enfermera']);
        $role8 = Role::create(['name' => 'Paciente']);

        //Asignacion de roles a usuario
        $permission1 = Permission::create(['name' => 'admin.usuarios.index', 'description'=>'Ver listado de usuarios']);
        $permission2 = Permission::create(['name' => 'admin.usuarios.edit', 'description'=>'Asignar roles a usuario']);

        //Centros hospitalarios
        $permission3 = Permission::create(['name' => 'listCentro', 'description'=>'Ver centros hospitalarios']);
        $permission4 = Permission::create(['name' => 'formularioCentros', 'description'=>'Agregar un nuevo centro hospitalario']);
        $permission5 = Permission::create(['name' => 'editFormCentro', 'description'=>'Editar un centro hospitalario']);

        //Configuraciones iniciales del sistema
        $permission6 = Permission::create(['name' => 'configuracionRoot', 'description'=>'Configurar datos iniciales del sistema']);
        $permission7 = Permission::create(['name' => 'formTS', 'description'=>'Generar tipos de sangre']);

        //tipos de sangre
        $permission8 = Permission::create(['name' => 'listarTS', 'description'=>'Ver tipos de sangre']);
        $permission9 = Permission::create(['name' => 'listPF', 'description'=>'Ver listado de profesiones']);
        
        //profesiones
        $permission10 = Permission::create(['name' => 'formPF', 'description'=>'Crear una profesión']);
        $permission11 = Permission::create(['name' => 'editFormPF', 'description'=>'Editar una profesión']);
        
        //Codigos de diagnostico
        $permission12 = Permission::create(['name' => 'formCD', 'description'=>'Crear codigo de diagnóstico']);
        $permission13 = Permission::create(['name' => 'listCD', 'description'=>'Ver codigos de diagnostico']);
        $permission14 = Permission::create(['name' => 'editFormCD', 'description'=>'Editar códigos de diagnóstico']);

        $todos= [$permission1,
        $permission2,
        $permission3,
        $permission4,
        $permission5,
        $permission6,
        $permission7,
        $permission8,
        $permission9,
        $permission10, 
        $permission11,
        $permission12,
        $permission13,
        $permission14];

        //PARA ROL DE ADMINISTRADOR
        $role1->syncPermissions($todos);

        //PARA RECEPCIONISTA
        $role2->syncPermissions([
            
            $permission10,
            $permission11,
          
        ]);
        
        //Permisos para medicos
        $role4->syncPermissions([$permission12, $permission13, $permission14]);
        $role5->syncPermissions([$permission12, $permission13, $permission14]);
        $role6->syncPermissions([$permission12, $permission13, $permission14]);

    }
}
