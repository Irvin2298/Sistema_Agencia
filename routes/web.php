<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CiudadanoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\InscripcionController;
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

// Route::resource('agenda', 'AgendaController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('agenda/eliminar/{id}',[AgendaController::class, 'eliminar'])->name('agenda.eliminar');

Route::post('agenda/actualizar/',[AgendaController::class, 'actualizar'])->name('agenda.actualizar');

Route::post('agenda/drag_drop/',[AgendaController::class, 'drag_drop'])->name('agenda.drag_drop');
Route::get('inscribir/{ciudadano}', [App\Http\Controllers\InscripcionController::class, 'inscribir'])->name('inscribir');
Route::post('inscribir/{ciudadano}', [App\Http\Controllers\InscripcionController::class, 'store'])->name('store');
//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('agenda', AgendaController::class);
    Route::resource('ciudadanos', CiudadanoController::class);
    Route::resource('cargos', CargoController::class);
    Route::resource('inscripcion', InscripcionController::class);
});
