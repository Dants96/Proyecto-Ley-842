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


Route::get('/modeltest', function(){
    $datos = Articulo::all();
    echo($datos);
    dd($datos);
    
});

Route::get('/Administrador/inicio',['middleware' => 'auth', function(){
    return view('Administrador.inicio');
}])->name('adminInicio');

//rutas de authh admin
Route::get('login', [AdministradorController::class, 'showLoginForm'])->name('adminLogin');
Route::post('login', [AdministradorController::class, 'login'])->name('adminLogin_post');
Route::post('logout', [AdministradorController::class, 'logout'])->name('adminLogout');

