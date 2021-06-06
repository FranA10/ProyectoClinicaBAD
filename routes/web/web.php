<?php

use Illuminate\Support\Facades\Route;

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

//Centros Hospitalarios
Route::get('guardarFormCentro', 'CentroHospitalarioController@crearCentros')->name('formularioCentros');
Route::post('saveCentro', 'CentroHospitalarioController@save')->name('save');
Route::get('listarCentro', 'CentroHospitalarioController@mostrarCentros')->name('listCentro');
Route::delete('eliminarCentro/{id}','CentroHospitalarioController@eliminarCentros')->name('deleteCentro');
Route::get('editarFormCentro/{id}','CentroHospitalarioController@actualizarCentros')->name('editFormCentro');
Route::patch('editarCentro/{id}','CentroHospitalarioController@editarCentro')->name('editCentro');
