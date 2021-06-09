<?php

use Illuminate\Support\Facades\Route;


Route::resource('tipo-examen', 'TipoExamenController');
Route::resource('tipo-anexo', 'TipoAnexoController');

Route::get('examenes', 'ExamenMedicoController@lista');
Route::get('crear-examen','ExamenMedicoController@crearExamen')->name('crear_examen');