<?php

use Illuminate\Support\Facades\Route;


Route::resource('signo-vital', 'SignoVitalController');
Route::resource('anexos', 'AnexosController'); 
Route::resource('historial_diagnostico', 'HistorialDiagnosticoController'); 