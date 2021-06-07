<?php

use Illuminate\Support\Facades\Route;


Route::resource('tipo-examen', 'TipoExamenController');
Route::resource('tipo-anexo', 'TipoAnexoController');

Route::get('prueba', 'ExamenMedicoController@ejemplo');