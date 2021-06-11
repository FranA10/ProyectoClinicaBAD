<?php

use Illuminate\Support\Facades\Route;


Route::resource('signo-vital', 'SignoVitalController');
Route::resource('anexos', 'AnexosController'); 
Route::resource('historial_diagnostico', 'HistorialDiagnosticoController'); 
Route::resource('cat_diagnostico', 'CategoriaDiagnosticoController'); 
Route::resource('consulta_medica', 'ConsultaMedicaController'); 
Route::resource('citas_medicas', 'CitasMedicasController'); 
Route::get('ejecutarview','CitasMedicasController@vistaBD');


