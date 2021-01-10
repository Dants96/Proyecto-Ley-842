<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Estadistica;
use App\Models\Titulo;
use App\Models\EdicionTitulo;


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

    // la funcion guarda una modificacion echa a un titulo, @param id del titulo modificado
    // @param2 tipo de midificacion.

    private function addEdicionTitulo($id_titulo, $tipo){
        $registro = new EdicionTitulo();
        $registro->id_administrador = Auth::user()->id;
        $registro->id_titulo = $id_titulo;
        $registro->fecha = date('Y-m-d');
        $registro->tipo = $tipo;
        $registro->save();
    }


    // actualiza el numero de modificaiones en la tabla, @param tipo de modificacion 
    private function sumModEst($tipo){
        switch($tipo){
            case 'ADC':
                $estadistica = Estadistica::latest()->first();
                $estadistica->numero_adiciones ++;
                $estadistica->save();
                break;
            case 'MOD':
                $estadistica = Estadistica::latest()->first();
                $estadistica->numero_modificaciones ++;
                $estadistica->save();
                break;
            case 'SUP':
                $estadisitica = Estadistica::latest()->first();
                $estadisitica->numero_supreciones ++;
                $estadisitica->save();
                break;
            default:
                break;                
        }
    }

    /*retorna la vista de exito , 
    * @param mensaje
    * @param1 nombre del objeto modificado
    * @param2 tipo del objeto modificado
    * @param3 operacion realizada
    */
    private function showSuccess($msg, $nombre, $tipo, $opr){
        $infoProceso = [
            'msg'=> $msg, 
            'objeto_nombre' =>  $nombre,
            'objeto_tipo' =>  $tipo,
            'operacion' => $opr
        ];
        return view('Administrador.proceso-exitoso', ['proceso'=> $infoProceso]);
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

        $this->addEdicionTitulo($titulo->id, 'ADC');
        $this->sumModEst('ADC');

        return $this->showSuccess('Se ha agregado el Titulo', $request->input('nombre_tit'), 'Título', 'adición');

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
