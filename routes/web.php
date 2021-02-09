<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\PlataformaController;
use App\Models\Capitulo;
use App\Models\Estadistica;
use App\Models\EdicionArticulo;
use App\Models\EdicionTitulo;
use App\Models\EdicionCapitulo;

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


Route::get('/', [PlataformaController::class, 'getInicio'])->name('inicio');

// pagina de no terminados
Route::get('/nobuild', function(){
    return view('notFound');
})->name('noBuild');

Route::get('/test', function(){
    $arraRq = ["edicion_articulos.id",
    "edicion_articulos.id_administrador",
    "administradores.nombres",
    "administradores.apellidos",
    "administradores.cedula", 
    "edicion_articulos.id_articulo",
    "articulos.nombre", 
    "edicion_articulos.tipo", 
    "edicion_articulos.created_at"
];
    $result = EdicionArticulo::select($arraRq)->join(["administradores", 
     "edicion_articulos.id_administrador", 
     "=", 
     "administradores.id"
    ])->join("articulos", "edicion_articulos.id_articulo", "=", "articulos.id")->get();
    echo $result;
    //echo print_r(DB::select('select capitulos.id, capitulos.nombre, capitulos.numero, titulos.numero as titulo_numero FROM capitulos JOIN titulos WHERE capitulos.id_titulo = titulos.id'));
});

//rutas de auth admin
Route::get('login', [AdministradorController::class, 'showLoginForm'])->middleware('guest')->name('adminLogin');
Route::post('login', [AdministradorController::class, 'login'])->middleware('guest')->name('adminLogin_post');
Route::post('logout', [AdministradorController::class, 'logout'])->middleware('auth')->name('adminLogout');


Route::group(['prefix' => 'Administrador', 'middleware' => 'auth'], function(){
    //index administrador
    Route::get('/', function(){
        return redirect()->route('adminInicio');
    });
    Route::get('/inicio', function(){
        return view('Administrador.inicio');
    })->name('adminInicio');
    //rutas de agregar
    Route::get('/agregar/{seccion}',[AdministradorController::class, 'addSection'])->name('agregarForm');
    Route::post('/agregar/titulo',[AdministradorController::class, 'storeTitulo'])->name('agregarTitulo');
    Route::post('/agregar/articulo',[AdministradorController::class, 'storeArticulo'])->name('agregarArticulo');
    Route::post('/agregar/capitulo',[AdministradorController::class, 'storeCapitulo'])->name('agregarCapitulo');
    //rutas de editar
    Route::get('/listar/{seccion}',[AdministradorController::class, 'listarSections'])->name('listarSecctions');
    Route::get('/editar/titulo/{id_seccion}',[AdministradorController::class, 'editTitulo'])->name('editarTitulo');
    Route::get('/editar/articulo/{id_seccion}',[AdministradorController::class, 'editArticulo'])->name('editarArticulo');
    Route::get('/editar/capitulo/{id_seccion}',[AdministradorController::class, 'editCapitulo'])->name('editarCapitulo');
    //rutas de estadisticas 
    Route::get('/estadisticas',[EstadisticasController::class, 'getStadistics'])->name('stadistics');
    //rutas Ajax
    Route::get('/{path}/get/capitulos/from', [ContenidoController::class, 'getCapitulosFrom']);
    Route::get('/{path}/get/articulos/from', [ContenidoController::class, 'getArticulosFrom']);
    //chartisan 
    Route::get('/estadisticas/chartData', [EstadisticasController::class, 'getChartData'])->name('getChartData');
    //Rutas de informes
    Route::get('/informe', [ContenidoController::class, 'getInforme'])->name('getInforme');
});


Route::get('/nosotros', function () {return view('about');})->name('nosotros');
Route::get('/infoLey842', function () {return view('info-ley');})->name('info');


