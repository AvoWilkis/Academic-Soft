<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\AsignacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//para el inicio
Route::get('/cursos', [CursoController::class, 'index']);

//para el registro
Route::get('/cursos/registrar', [CursoController::class, 'create']);

//para el guardado
Route::post('/cursos/registrar', [CursoController::class, 'store']);

//para el edit
Route::get('/cursos/actualizar/{id}', [CursoController::class, 'edit']);

//para el update
Route::put('/cursos/actualizar/{id}', [CursoController::class, 'update']);

//para el estado
Route::get('/cursos/estado/{id}', [CursoController::class, 'estado']);

//Asignaciones

Route::get('/asignaciones', [AsignacionesController::class, 'index']);

Route::get('/asignaciones/registrar', [AsignacionesController::class, 'create']);

Route::post('/asignaciones/registrar', [AsignacionesController::class, 'store']);

Route::get('/asignaciones/actualizar/{id}', [AsignacionesController::class, 'edit']);
Route::put('/asignaciones/actualizar/{id}', [AsignacionesController::class, 'update']);
Route::get('/asignaciones/estado/{id}', [AsignacionesController::class, 'estado']);

// Route::resource('tareas', TareasController::class);

Route::get('/tareas', [TareasController::class, 'index'])->name('tareas.index');
Route::get('/tareas/registrar', [TareasController::class, 'create'])->name('tareas.create');
Route::post('/tareas/registrar', [TareasController::class, 'store'])->name('tareas.store');
Route::get('/tareas/actualizar/{id}', [TareasController::class, 'edit'])->name('tareas.edit');
Route::put('/tareas/actualizar/{id}', [TareasController::class, 'update'])->name('tareas.update');
Route::get('/tareas/estado/{id}', [TareasController::class, 'estado'])->name('tareas.estado');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
