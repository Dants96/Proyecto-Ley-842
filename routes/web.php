<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ContenidoController;
use App\Models\Articulo;

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
    return view('home');
})->name('inicio');

// pagina de no terminados
Route::get('/nobuild', function(){
    return view('notFound');
})->name('noBuild');

Route::get('/test', function(){
    $datos = Articulo::all();
    echo($datos);
    dd($datos);
    
});

Route::get('/Administrador/inicio',['middleware' => 'auth', function(){
    return view('Administrador.inicio');
}])->name('adminInicio');
Route::get('/Administrador', ['middleware' => 'auth', function(){
    return redirect()->route('adminInicio');
}]);

Route::get('/Administrador/agregar/{seccion}',[AdministradorController::class, 'addSection'])->middleware('auth')->name('agregarForm');
Route::post('/Administrador/agregar/titulo',[AdministradorController::class, 'storeTitulo'])->middleware('auth')->name('agregarTitulo');
Route::post('/Administrador/agregar/articulo',[AdministradorController::class, 'storeArticulo'])->middleware('auth')->name('agregarArticulo');
Route::post('/Administrador/agregar/capitulo',[AdministradorController::class, 'storeCapitulo'])->middleware('auth')->name('agregarCapitulo');

Route::get('/Administrador/listar/{seccion}',[AdministradorController::class, 'listarSections'])->middleware('auth')->name('listarSecctions');

Route::get('/Administrador/editar/titulo/{id_seccion}',[AdministradorController::class, 'editTitulo'])->middleware('auth')->name('editarTitulo');
Route::get('/Administrador/editar/articulo/{id_seccion}',[AdministradorController::class, 'editArticulo'])->middleware('auth')->name('editarArticulo');
Route::get('/Administrador/editar/capitulo/{id_seccion}',[AdministradorController::class, 'editCapitulo'])->middleware('auth')->name('editarCapitulo');

Route::get('Administrador/estadisiticas',[AdministradorController::class, 'getStadistics'])->middleware('auth')->name('stadistics');

//rutas de authh admin
Route::get('login', [AdministradorController::class, 'showLoginForm'])->middleware('guest')->name('adminLogin');
Route::post('login', [AdministradorController::class, 'login'])->middleware('guest')->name('adminLogin_post');
Route::post('logout', [AdministradorController::class, 'logout'])->middleware('auth')->name('adminLogout');


Route::get('/nosotros', function () {return view('about');})->name('nosotros');
Route::get('/infoLey842', function () {return view('info-ley');})->name('info');

//rutas Ajax
Route::get('/Administrador/{path}/get/capitulos/from', [ContenidoController::class, 'getCapitulosFrom'])->middleware('auth');
Route::get('/Administrador/{path}/get/articulos/from', [ContenidoController::class, 'getArticulosFrom'])->middleware('auth');
