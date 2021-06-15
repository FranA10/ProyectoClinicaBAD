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
                
        //profesiones
        $permission9 = Permission::create(['name' => 'listPF', 'description'=>'Ver listado de profesiones']);
        $permission10 = Permission::create(['name' => 'formPF', 'description'=>'Crear una profesión']);
        $permission11 = Permission::create(['name' => 'editFormPF', 'description'=>'Editar una profesión']);
        
        //Codigos de diagnostico
        $permission12 = Permission::create(['name' => 'formCD', 'description'=>'Crear codigo de diagnóstico']);
        $permission13 = Permission::create(['name' => 'listCD', 'description'=>'Ver codigos de diagnostico']);
        $permission14 = Permission::create(['name' => 'editFormCD', 'description'=>'Editar códigos de diagnóstico']);

        //Administracion de Roles
        $permission15 = Permission::create(['name' => 'admin.roles.index', 'description'=>'Ver listado de Roles']);
        $permission16 = Permission::create(['name' => 'admin.roles.edit', 'description'=>'Editar roles']);

        //Administracion de examenes y anexos
        $permission17 = Permission::create(['name' => 'ver-tipos-anexo', 'description'=>'Ver Tipos de anexos']);
        $permission18 = Permission::create(['name' => 'ver-tipos-examen', 'description'=>'Ver Tipos de exámenes']);

        //Examenes clinicos para medicos
        $permission19 = Permission::create(['name' => 'ver-examenes', 'description'=>'Ver examenes de pacientes']);
        $permission20 = Permission::create(['name' => 'crear_examen', 'description'=>'Crear examenes de pacientes']);

        //Datos de expedientes disponibles para el medico
        $permission21 = Permission::create(['name' => 'ver-expedientes', 'description'=>'Ver expedientes de pacientes']);
        $permission22 = Permission::create(['name' => 'crear-expediente', 'description'=>'Crear expedientes de pacientes']);
        
        //Historial de diagnosticos
        $permission23 = Permission::create(['name' => 'ver_historial_diagnostico', 'description'=>'Ver historial de diagnosticos']);
        $permission24 = Permission::create(['name' => 'ver_historial_diagnostico.create', 'description'=>'Crear un diagnostico']);

        //Consultas medicas
        $permission25 = Permission::create(['name' => 'ver_listado_consultas', 'description'=>'Ver listado de consultas médicas']);
        $permission26 = Permission::create(['name' => 'ver_listado_consultas.create', 'description'=>'Crear un diagnostico']);
        $permission27 = Permission::create(['name' => 'ver_listado_consultas.edit', 'description'=>'Editar un diagnostico']);
        $permission37 = Permission::create(['name' => 'ver_horarios', 'description'=>'Añadir datos de horarios']);
        $permission38 = Permission::create(['name' => 'ver_horarios.create', 'description'=>'Crear horarios']);
        
        //Signos vitales
        $permission28 = Permission::create(['name' => 'ver_listado_signos', 'description'=>'Ver listado de signos vitales']);
        $permission29 = Permission::create(['name' => 'ver_listado_signos.create', 'description'=>'Añadir signos vitales']);

        //Citas medicas
        $permission30 = Permission::create(['name' => 'ver_listado_citas', 'description'=>'Ver citas médicas']);
        $permission31 = Permission::create(['name' => 'ver_listado_citas.create', 'description'=>'Crear una cita médica']);
        $permission32 = Permission::create(['name' => 'ver_listado_citas.edit', 'description'=>'Crear una cita médica']);
        $permission33 = Permission::create(['name' => 'ver_listado_citas.generate', 'description'=>'Generar citas medicas (su)']);
        
        //Ver datos de Empleados
        $permission34 = Permission::create(['name' => 'ListDE', 'description'=>'Ver datos de empleados']);
        $permission35 = Permission::create(['name' => 'FormDE', 'description'=>'Añadir datos de empleados']);

        //Ver datos de Pacientes
        $permission36 = Permission::create(['name' => 'FormDP', 'description'=>'Añadir datos de pacientes']);


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
        $permission14,
        $permission15,
        $permission16,
        $permission17,
        $permission18,
        $permission19,
        $permission20,
        $permission21,
        $permission22,
        $permission23,
        $permission24,
        $permission25,
        $permission26,
        $permission27,
        $permission28,
        $permission29,
        $permission30,
        $permission31,
        $permission32,
        $permission33,
        $permission34,
        $permission35,
        $permission36,
        $permission37,
        
        $permission38

    ];

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