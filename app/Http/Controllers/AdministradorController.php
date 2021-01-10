<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Estadistica;
use App\Models\Titulo;
use App\Models\Capitulo;
use App\Models\Articulo;
use App\Models\EdicionTitulo;
use App\Models\EdicionCapitulo;
use App\Models\EdicionArticulo;


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
        switch($seccion){
            case 'titulo':
                return view("Administrador.agregar-{$seccion}");
                
            case 'articulo':
                return view("Administrador.agregar-{$seccion}", ["capitulos" => Capitulo::all('id', 'nombre')]);
                
            case 'capitulo':
                return view("Administrador.agregar-{$seccion}", ["titulos" => Titulo::all('id', 'nombre')]);
                
            default:
                return redirect()->route('adminInicio');

        }
    }

    // la funcion guarda una modificacion echa a un titulo, @param id del titulo modificado
    // @param2 tipo de midificacion.

    private function addEdicion($seccion, $id_seccion, $tipo){
        switch($seccion){
            case 'titulo':
                $registro = new EdicionTitulo();
                $registro->id_titulo = $id_seccion;
                break;
            case 'capitulo':
                $registro = new EdicionCapitulo();
                $registro->id_capitulo = $id_seccion;
                break;
            case 'articulo':
                $registro = new EdicionArticulo();
                $registro->id_articulo = $id_seccion;
                break;
            default:
                return false;
        }
        $registro->id_administrador = Auth::user()->id;        
        $registro->fecha = date('Y-m-d');
        $registro->tipo = $tipo;
        $registro->save();

        $this->sumModEst($tipo);
        return true;
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
        return view('Administrador.proceso-exitoso', array('proceso' => $infoProceso));
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

        $this->addEdicion('titulo', $titulo->id, 'ADC');

        return $this->showSuccess('Se ha agregado el Titulo', $request->input('nombre_tit'), 'Título', 'adición');

    }

    public function storeArticulo(Request $request){
        $this->validate($request, [
            'nombre_articulo' => 'required|max:100',
            'numero_articulo' => 'required|numeric|max:999',
            'capitulo' => 'required|numeric|exists:capitulos,id',
            'contenido' => 'required'
        ]);
        
        $articulo = new Articulo();
        $articulo->nombre = $request->input('nombre_articulo');
        $articulo->numero = $request->input('numero_articulo');
        $articulo->fecha_modificacion = date('Y-m-d');
        $articulo->contenido = $request->input('contenido');
        $articulo->id_capitulo = $request->input('capitulo');
        $articulo->save();

        $this->addEdicion('articulo',$articulo->id, 'ADC');

        return $this->showSuccess('Se ha agregado el Artículo', $request->input('nombre_articulo'), 'Artículo', 'adición');
    }

    public function storeCapitulo(Request $request){
        $this->validate($request, [
            'nombre_capitulo' => 'required|max:100',
            'numero_capitulo' => 'required|numeric|max:999',
            'titulo' => 'required|numeric|exists:titulos,id'
        ]);
        
        $capitulo = new Capitulo();
        $capitulo->nombre = $request->input('nombre_capitulo');
        $capitulo->numero = $request->input('numero_capitulo');
        $capitulo->fecha_modificacion = date('Y-m-d');
        $capitulo->id_titulo = $request->input('titulo');
        $capitulo->save();

        $this->addEdicion('capitulo',$capitulo->id, 'ADC');
        
        return $this->showSuccess('Se ha agregado el Capítulo', $request->input('nombre_capitulo'), 'Capítulo', 'adición');
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
