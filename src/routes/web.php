<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\modoLibreController;
use App\Http\Controllers\editarEjercicioController;
use App\Http\Controllers\OpenAIController;

use App\Http\Middleware\esProfesor;

// Importante: Asegúrate de que los nombres de los espacios de nombres sean correctos
// según la ubicación de tus controladores.

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('home')->group(function () { 
  Route::get('/', [HomeController::class, 'index']); 
});

Route::prefix('ejercicio')->group(function () {
  Route::get('/{id}', [EjercicioController::class, 'index']);
  Route::post('ajaxFormularioQuery', [EjercicioController::class, 'ajaxFormularioQuery']);
});

Route::prefix('admin')->group(function () {
  Route::get('/administracion', [adminController::class, 'administracion']);
  Route::get('/contacto', [adminController::class, 'contacto']);
  Route::post('/editarPerfil', [adminController::class, 'editarPerfil']);
});

Route::prefix('modoLibre')->group(function(){
  Route::get('/', [modoLibreController::class, 'index']);
  Route::post('ajaxFormularioQuery', [modoLibreController::class, 'ajaxFormularioQuery']);
});

Route::get('ajaxVerTabla', [EjercicioController::class, 'ajaxVerTabla']);
Route::get('comprobarTutorial', [EjercicioController::class, 'comprobarTutorial']);
Route::get('ejercicioTerminado', [EjercicioController::class, 'ejercicioTerminado']);

Route::get('/editarEjercicio', [editarEjercicioController::class, 'index'])->middleware(esProfesor::class)->name('editarEjercicio.index');
Route::get('/editarEjercicio/eliminarEjercicio/{id}', [editarEjercicioController::class, 'eliminarEjercicio'])->middleware(esProfesor::class)->name('editarEjercicio.eliminarEjercicio');
Route::get('/editarEjercicio/editar/{id}', [editarEjercicioController::class, 'editar']);
Route::get('/editarEjercicio/estadistica', [editarEjercicioController::class, 'estadistica'])->middleware(esProfesor::class);
Route::get('/editarEjercicio/ajaxMostrarIntento', [editarEjercicioController::class, 'ajaxMostrarIntento'])->middleware(esProfesor::class);
Route::get('/editarEjercicio/ajaxMostrarModoLibre', [editarEjercicioController::class, 'ajaxMostrarModoLibre'])->middleware(esProfesor::class);
Route::post('/editarEjercicio/ajaxValidaQuery', [editarEjercicioController::class, 'ajaxValidaQuery'])->middleware(esProfesor::class);
Route::get('/editarEjercicio/crear', [editarEjercicioController::class, 'crear'])->middleware(esProfesor::class);
Route::get('/editarEjercicio/crearJsonEjercicio', [editarEjercicioController::class, 'crearJsonEjercicio'])->middleware(esProfesor::class);
Route::get('/editarEjercicio/estadisticamlibre', [editarEjercicioController::class, 'estadisticamlibre'])->middleware(esProfesor::class);
Route::get('/editarEjercicio/tasks', [editarEjercicioController::class, 'exportCsv'])->middleware(esProfesor::class);
Route::get('/editarEjercicio/tasksml', [editarEjercicioController::class, 'exportCsvMl'])->middleware(esProfesor::class);

Route::get('open-api', [OpenAIController::class, 'index']);

Auth::routes(['register' => false]);
