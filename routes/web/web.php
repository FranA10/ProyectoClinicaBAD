<?php

use Illuminate\Support\Facades\Route;
//use admin\UsuarioController;
use admin\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Procesos Almacenados Configuracion Inicial
Route::get('procesosRoot', 'RootConfigController@vistaProceso')->name('configuracionRoot');
Route::post('ejecutarProcesoES', 'RootConfigController@ejecutarES')->name('crearES');
Route::post('ejecutarProcesoGN', 'RootConfigController@ejecutarGN')->name('crearGN');
Route::post('ejecutarProcesoPSCI', 'RootConfigController@ejecutarPSCI')->name('crearPSCI');

//Centros Hospitalarios
Route::get('guardarFormCentro', 'CentroHospitalarioController@crearCentros')->name('formularioCentros');
Route::post('saveCentro', 'CentroHospitalarioController@save')->name('save');
Route::get('listarCentro', 'CentroHospitalarioController@mostrarCentros')->name('listCentro');
Route::delete('eliminarCentro/{id}','CentroHospitalarioController@eliminarCentros')->name('deleteCentro');
Route::get('editarFormCentro/{id}','CentroHospitalarioController@actualizarCentros')->name('editFormCentro');
Route::patch('editarCentro/{id}','CentroHospitalarioController@editarCentro')->name('editCentro');

//Tipo Sangre
Route::get('procesoTipoSangre', 'TipoSangreController@vistaProceso')->name('formTS');
Route::post('ejecutarProceso', 'TipoSangreController@ejecutar')->name('crearTS');
Route::get('listarTipoSangre', 'TipoSangreController@mostrarTipos')->name('listarTS');
Route::delete('eliminarTipo/{id}','TipoSangreController@eliminarTipo')->name('deleteTS');

//Profesion
Route::get('guardarFormProfesion', 'ProfesionController@verFormProfesion')->name('formPF');
Route::post('saveProfesion', 'ProfesionController@guardarProfesion')->name('savePF');
Route::get('listarProfesiones', 'ProfesionController@mostrarProfesiones')->name('listPF');
Route::delete('eliminarProfesion/{id}','ProfesionController@eliminarProfesion')->name('deletePF');
Route::get('editarFormProfesion/{id}','ProfesionController@actualizarProfesion')->name('editFormPF');
Route::patch('editarProfesion/{id}','ProfesionController@editarProfesion')->name('editPF');

//Catalogo Dignosticos
Route::get('guardarFormCatDig', 'CatDiagnosticoController@verFormCatDig')->name('formCD');
Route::post('saveCatDig', 'CatDiagnosticoController@guardarCatDig')->name('saveCD');
Route::get('listarCatDig', 'CatDiagnosticoController@mostrarCatDig')->name('listCD');
Route::delete('eliminarCatDig/{id}','CatDiagnosticoController@eliminarCatDig')->name('deleteCD');
Route::get('editarFormCatDig/{id}','CatDiagnosticoController@actualizarCatDig')->name('editFormCD');
Route::patch('editarCatDig/{id}','CatDiagnosticoController@editarCatDig')->name('editCD');

//Administracion de usuarios y roles
//ejemplo de ruta protegida
//Route::resource('/usuarios', UsuarioController::class)->middleware('can:admin.usuarios')->names('admin.usuarios');
Route::resource('usuarios', UsuarioController::class)->names('admin.usuarios');
Route::resource('roles', RoleController::class)->names('admin.roles');


//Administracion datos de empleados
Route::get('EmpList', 'DatosEmpleadoController@MostrarEmpleados')->name('ListDE');
Route::get('FormularioEmpleado', 'DatosEmpleadoController@FormEmp')->name('FormDE');
Route::post('SaveEmpleado', 'DatosEmpleadoController@savePerson')->name('saveDE');

//Administracion datos de pacientes
//Route::get('PactList', 'DatosEmpleadoController@MostrarEmpleados')->name('ListDE');
Route::get('FormularioPaciente', 'DatosEmpleadoController@FormPac')->name('FormDP');
//Route::post('SavePaciente', 'DatosEmpleadoController@savePerson')->name('saveDE');