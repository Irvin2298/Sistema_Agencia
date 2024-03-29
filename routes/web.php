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
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\DocumentoGeneradoController;
use App\Http\Controllers\ReciboGeneradoController;
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

Route::get('/documentos/documentos_generados', [App\Http\Controllers\DocumentoGeneradoController::class, 'index'])->name('index');

Route::get('/documentos/recibos_generados', [App\Http\Controllers\ReciboGeneradoController::class, 'index'])->name('index');

Route::post('agenda/eliminar/{id}',[AgendaController::class, 'eliminar'])->name('agenda.eliminar');

Route::post('agenda/actualizar/',[AgendaController::class, 'actualizar'])->name('agenda.actualizar');

Route::post('agenda/drag_drop/',[AgendaController::class, 'drag_drop'])->name('agenda.drag_drop');

Route::post('ciudadanos/eliminarId/{id}',[CiudadanoController::class, 'eliminarId'])->name('ciudadanos.eliminar');

Route::post('documentos/nombramientos/eliminarId/{id}',[DocumentoGeneradoController::class, 'eliminarId'])->name('documentosGenerados.eliminar');

Route::post('documentos/recibos/eliminarId/{id}',[ReciboGeneradoController::class, 'eliminarId'])->name('recibosGenerados.eliminar');

Route::post('cargos/eliminar/{id}',[CargoController::class, 'eliminar'])->name('cargos.eliminar');

Route::post('grupos/eliminar/{id}',[GrupoController::class, 'eliminar'])->name('grupos.eliminar');

Route::post('inscripcion/eliminar/{id}',[InscripcionController::class, 'eliminar'])->name('inscripciones.eliminar');

Route::post('mark-as-read',[AgendaController::class, 'markNotificacion'])->name('markNotificacion');

Route::post('documentos/recibo-generado',[DocumentoController::class, 'crearRecibo'])->name('documentos.crearRecibo');
Route::post('documentos/citatorio-generado',[DocumentoController::class, 'crearCitatorio'])->name('documentos.crearCitatorio');

Route::get('documentos/constancia/{idd}',[CalificacionController::class, 'crearConstancia'])->name('documentos.constancia');

Route::get('documentos/documentos_generados',[DocumentoGeneradoController::class, 'index'])->name('documentosGenerados.index');

Route::get('documentos/recibos_generados',[ReciboGeneradoController::class, 'index'])->name('recibosGenerados.index');

Route::post('documentos/nombramiento',[DocumentoController::class, 'crearNombramiento'])->name('documentos.crearNombramiento');

Route::get('documentos/nombramiento/{id}',[DocumentoGeneradoController::class, 'crearNombramiento'])->name('documentosGenerados.crearNombramiento');

Route::get('documentos/recibo/{id}',[ReciboGeneradoController::class, 'crearRecibo'])->name('recibosGenerados.crearRecibo');

// Route::post('/mark-as-read', 'AgendaController@markNotificacion')->name('markNotificacion');

Route::get('inscribir/{ciudadano}', [App\Http\Controllers\InscripcionController::class, 'inscribir'])->name('inscribir');
// Route::post('inscribir/{ciudadano}', [App\Http\Controllers\InscripcionController::class, 'store'])->name('storeInscripcion');
Route::post('inscribir/{ciudadano}', [App\Http\Controllers\InscripcionController::class, 'store'])->name('storeInscripcion');
Route::post('calificar/{inscripcion}', [App\Http\Controllers\CalificacionController::class, 'update'])->name('calificaciones.update');
// Route::post('guardarGrupo/{cargo}', [App\Http\Controllers\GrupoController::class, 'store'])->name('storeGrupo');
Route::post('guardarGrupo/{cargo}', [GrupoController::class, 'store'])
    ->name('storeGrupo');

Route::post('grupos/eliminar/{id}',[GrupoController::class, 'eliminar'])->name('grupos.eliminar');

Route::post('usuarios/eliminar/{id}',[UsuarioController::class, 'eliminar'])->name('usuarios.eliminar');

Route::post('roles/eliminar/{id}',[RolController::class, 'eliminar'])->name('roles.eliminar');
//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('agenda', AgendaController::class);
    Route::resource('ciudadanos', CiudadanoController::class);
    Route::resource('cargos', CargoController::class);
    Route::resource('inscripcion', InscripcionController::class);
    Route::resource('calificacion', CalificacionController::class);
    Route::resource('post', PostController::class);
    Route::resource('grupos', GrupoController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('documentos/nombramientos_generados', DocumentoGeneradoController::class);
    Route::resource('documentos/recibos_generados', ReciboGeneradoController::class);
});

//Ruta para marcar una notificacion como leída
Route::get('marcarunanoti/{id}', [App\Http\Controllers\PostController::class, 'markone_as_read'])->name('marcarunanoti');

// Ruta para marcar como leída las notificaciones
Route::get('mark_as_read', [App\Http\Controllers\PostController::class, 'mark_as_read'])->name('mark_as_read');

// Ruta para eliminar todas sus notifications leídas
Route::get('destroyNotifications', [App\Http\Controllers\PostController::class, 'delet_full_notify_read'])->name('destroyNotifications');

// Ruta para eliminar todas sus notifications ->IMPLEMENTAR SOLO SI ES NECESARIO.............
// Route::get('destroyNotificationsss', function (){
//     app(PostController::class)->delete_todas_noti();
//     return redirect()->back();//te retorna a la misma vista
// })->name('destroyNotificationsss');
