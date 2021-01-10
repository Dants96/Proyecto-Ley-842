<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Titulo;

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

    public function storeTitulo(Request $request){
        $this->validate($request, [
            'nombre_tit' => 'required|max:100',
            'numero_tit' => 'required|numeric|max:999|unique:titulos,numero',
        ]);
        
        $titulo = new Titulo();
        $titulo->nombre = $request->input('nombre_tit');
        $titulo->numero = $request->input('numero_tit');
        $titulo->fecha_modificacion = date('Y-m-d');
        $titulo->save();

        echo '<script language="javascript">alert("El Titulo ha sido registrado exitosamente");</script>';

        return redirect()->route('adminInicio');

    }

    public function listarSection($seccion){
        if(in_array($seccion, array("titulo", "capitulo", "articulo"))){
            return view("Administrador.modificar-{$seccion}");
        }else{
            return redirect()->route('adminInicio');
        }
    }

    public function getStadistics(){
        return view("Administrador.estadisiticas");
    }

}
