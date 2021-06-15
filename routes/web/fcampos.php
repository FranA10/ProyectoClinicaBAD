<?php

use Illuminate\Support\Facades\Route;


Route::resource('tipo-examen', 'TipoExamenController')->names('ver-tipos-examen');
Route::resource('tipo-anexo', 'TipoAnexoController')->names('ver-tipos-anexo');

Route::get('examenes', 'ExamenMedicoController@lista')->name('ver-examenes');
Route::get('crear_examen','ExamenMedicoController@crearExamen')->name('crear_examen');

// Route::get('ver-examen','ExamenMedicoController@crearExamen')->name('crear_examen');


Route::get('expedientes','ExpedienteController@listar')->name('ver-expedientes');
Route::get('expediente/{oidExpediente}','ExpedienteController@expediente');
Route::get('expediente-crear','ExpedienteController@mostrarCrear')->name('mostrar-crear');
Route::get('obtenerdpersonales','ExpedienteController@obtenerDatosPersonales');
Route::post('crearexpediente','ExpedienteController@crearExpediente')->name('crear-expediente');

Route::get('ver_consulta/{oidConsulta}','ExpedienteController@verConsulta')->name('ver_consulta');
Route::get('ver_alta/{oidAlta}','ExpedienteController@verAlta')->name('ver_alta');
Route::get('ver_examen/{oidExamen}','ExamenMedicoController@verExamen')->name('ver_examen');
Route::get('ver_diagnostico/{oidHistorial}','ExpedienteController@verHistorial')->name('ver_diagnostico');
