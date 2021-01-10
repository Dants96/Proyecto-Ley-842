<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
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

Route::get('/modeltest', function(){
    $datos = Articulo::all();
    echo($datos);
    dd($datos);
    
});

Route::get('/Administrador/inicio',['middleware' => 'auth', function(){
    return view('Administrador.inicio');
}])->name('adminInicio');

Route::get('/Administrador/agregar/{seccion}',[AdministradorController::class, 'addSection'])->middleware('auth')->name('agregarForm');
Route::post('/Administrador/agregar/',[AdministradorController::class, 'storeTitulo'])->middleware('auth')->name('agregarTitulo');
Route::get('/Administrador/listar/{seccion}',[AdministradorController::class, 'listarSection'])->middleware('auth')->name('listarSecction');

Route::get('Administrador/estadisiticas',[AdministradorController::class, 'getStadistics'])->middleware('auth')->name('stadistics');

//rutas de authh admin
Route::get('login', [AdministradorController::class, 'showLoginForm'])->middleware('guest')->name('adminLogin');
Route::post('login', [AdministradorController::class, 'login'])->middleware('guest')->name('adminLogin_post');
Route::post('logout', [AdministradorController::class, 'logout'])->middleware('auth')->name('adminLogout');


Route::get('/nosotros', function () {return view('about');})->name('nosotros');
Route::get('/infoLey842', function () {return view('info-ley');})->name('info');