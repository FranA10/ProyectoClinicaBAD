<?php

use Illuminate\Support\Facades\Route;


Route::resource('tipo-examen', 'TipoExamenController');
Route::resource('tipo-anexo', 'TipoAnexoController');

Route::get('examenes', 'ExamenMedicoController@lista');
Route::get('crear-examen','ExamenMedicoController@crearExamen')->name('crear_examen');

Route::get('expedientes','ExpedienteController@listar');
Route::get('expediente/{oidExpediente}','ExpedienteController@expediente');
Route::get('expediente-crear','ExpedienteController@mostrarCrear');
Route::get('obtenerdpersonales','ExpedienteController@obtenerDatosPersonales');
Route::post('crearexpediente','ExpedienteController@crearExpediente');