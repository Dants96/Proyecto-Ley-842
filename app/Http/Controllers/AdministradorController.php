<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdministradorController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'admins';

    public function username(){
        return 'cedula'; //columna a valorar
    }

    public function showLoginForm(){
        return view('Administrador.login');
    }

    public function authenticated(){
        return redirect()->route('adminInicio');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('inicio');
    }
    
    public function addSection($seccion){
        if(in_array($seccion, array("titulo", "capitulo", "articulo"))){
            return view("Administrador.agregar-{$seccion}");
        }else{
            return redirect()->route('adminInicio');
        }
    }
    public function listarSection($seccion){
        if(in_array($seccion, array("titulo", "capitulo", "articulo"))){
            return view("Administrador.modificar-{$seccion}");
        }else{
            return redirect()->route('adminInicio');
        }
    }

}
