<?php

use Illuminate\Support\Facades\Route;


Route::resource('tipo-examen', 'TipoExamenController')->names('ver-tipos-examen');
Route::resource('tipo-anexo', 'TipoAnexoController')->names('ver-tipos-anexo');

Route::get('examenes', 'ExamenMedicoController@lista')->name('ver-examenes');
Route::get('crear-examen','ExamenMedicoController@crearExamen')->name('crear_examen');

Route::get('ver-examen','ExamenMedicoController@crearExamen')->name('crear_examen');


Route::get('expedientes','ExpedienteController@listar')->name('ver-expedientes');
Route::get('expediente/{oidExpediente}','ExpedienteController@expediente');
Route::get('expediente-crear','ExpedienteController@mostrarCrear')->name('mostrar-crear');
Route::get('obtenerdpersonales','ExpedienteController@obtenerDatosPersonales');
Route::post('crearexpediente','ExpedienteController@crearExpediente')->name('crear-expediente');