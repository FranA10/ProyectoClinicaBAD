<?php

use Illuminate\Support\Facades\Route;


Route::resource('signo-vital', 'SignoVitalController')->names('ver_listado_signos');
Route::resource('anexos', 'AnexosController'); 
Route::resource('historial_diagnostico', 'HistorialDiagnosticoController')->names('ver_historial_diagnostico'); 
Route::resource('cat_diagnostico', 'CategoriaDiagnosticoController'); 
Route::resource('consulta_medica', 'ConsultaMedicaController')->names('ver_listado_consultas'); 
Route::resource('citas_medicas', 'CitasMedicasController'); 
Route::resource('horarios', 'HorariosController')->names('ver_horarios'); 

Route::get('ejecutarview','CitasMedicasController@vistaBD');


