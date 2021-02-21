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
        return view('administrador.login');
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
                return view("administrador.agregar-{$seccion}",['numero'=> Titulo::all('numero')->max('numero') + 1]);
                
            case 'articulo':
                return view("administrador.agregar-{$seccion}", ["titulos" => Titulo::select('id', 'nombre', 'numero', 'activo')->where('activo', '=', 1)->get()]);
                
            case 'capitulo':
                return view("administrador.agregar-{$seccion}", ["titulos" => Titulo::select('id', 'nombre', 'numero', 'activo')->where('activo', '=', 1)->get()]);
                
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
        if(in_array($tipo, ['ADC', 'MOD', 'SUP'])){
            $estadistica = Estadistica::latest()->first();
            switch($tipo){
                case 'ADC':
                    $estadistica->numero_adiciones ++;
                    break;
                case 'MOD':
                    $estadistica->numero_modificaciones ++;
                    break;
                case 'SUP':
                    $estadistica->numero_supreciones ++;
                    break;                
            }
            $estadistica->save();
        }
    }

    /*retorna la vista de exito , 
    * @param mensaje
    * @param1 nombre del objeto modificado
    * @param2 tipo del objeto modificado
    * @param3 operacion realizada
    */
    private function showSuccess($msg, $nombre, $tipo, $opr, $numero){
        $infoProceso = [
            'msg'=> $msg, 
            'objeto_nombre' =>  $nombre,
            'objeto_tipo' =>  $tipo,
            'objeto_numero' =>  $numero,
            'operacion' => $opr
        ];
        return view('administrador.proceso-exitoso', array('proceso' => $infoProceso));
    }

    public function storeTitulo(Request $request){
        $this->validate($request, [
            'nombre_tit' => 'required|max:100',
        ]);
        
        $titulo = new Titulo();
        $titulo->nombre = $request->input('nombre_tit');
        $titulo->numero = intval(Titulo::all('numero')->max('numero')) + 1;
        $titulo->fecha_modificacion = date('Y-m-d');
        $titulo->save();

        $this->addEdicion('titulo', $titulo->id, 'ADC');

        return $this->showSuccess('Se ha agregado el Titulo', $request->input('nombre_tit'), 'Título', 'adición', $titulo->numero);

    }

    public function storeArticulo(Request $request){
        $this->validate($request, [
            'nombre_articulo' => 'required|max:100',
            'capitulo' => 'required|numeric|exists:capitulos,id',
            'contenido' => 'required'
        ]);
        
        $articulo = new Articulo();
        $capitulo_id = $request->input('capitulo');
        $articulo->nombre = $request->input('nombre_articulo');
        $articulo->numero = (Articulo::all('id')->max('id')) + 1;
        $articulo->fecha_modificacion = date('Y-m-d');
        $articulo->contenido = $request->input('contenido');
        $articulo->id_capitulo = $capitulo_id;
        $articulo->paragrafo = true;
        $articulo->save();

        $this->addEdicion('articulo',$articulo->id, 'ADC');

        return $this->showSuccess('Se ha agregado el Artículo', $request->input('nombre_articulo'), 'Artículo', 'adición', $articulo->numero);
    }

    public function storeCapitulo(Request $request){
        $this->validate($request, [
            'nombre_capitulo' => 'required|max:100',            
            'titulo' => 'required|numeric|exists:titulos,id'
        ]);
        
        $capitulo = new Capitulo();
        $titulo_id = $request->input('titulo');
        $capitulo->nombre = $request->input('nombre_capitulo');
        $capitulo->numero = (Capitulo::where('id_titulo', '=', $titulo_id)->get('numero')->max('numero')) + 1;
        $capitulo->fecha_modificacion = date('Y-m-d');
        $capitulo->id_titulo = $titulo_id;
        $capitulo->save();

        $this->addEdicion('capitulo',$capitulo->id, 'ADC');
        
        return $this->showSuccess('Se ha agregado el Capítulo', $request->input('nombre_capitulo'), 'Capítulo', 'adición', $capitulo->numero);
    }

    public function listarSections($seccion, $accion){        
        
        if(!in_array($accion, ['MOD', 'SUP'])){return abort(404);}

        switch($seccion){
            case 'titulos':
                return view("administrador.listar-secciones", ['accion' => $accion,'secciones'=> Titulo::select('id', 'numero', 'nombre', 'activo')->where('activo', '=', true)->get(), 'seccion'=>'Título']);
            case 'capitulos':                
                return view("administrador.listar-secciones", ['accion' => $accion,'secciones'=> Titulo::select('id', 'numero', 'nombre', 'activo')->where('activo', '=', true)->get(), 'seccion'=>'Capítulo']);
            case 'articulos':
                $capitulos = Capitulo::select('capitulos.id', 'capitulos.nombre', 'capitulos.numero', 'titulos.numero as titulo', 'titulos.activo')->join('titulos', 'capitulos.id_titulo', '=', 'titulos.id')->where('titulos.activo', '=', true)->get();
                return view("administrador.listar-secciones", ['accion' => $accion,'secciones'=> $capitulos, 'seccion'=>'Artículo']);  
            default:
                return abort(404);            
        }
    }

    public function vistaEditTitulo($id_seccion){
        return view('administrador.modificar-titulo')->with('infold', Titulo::findOrFail($id_seccion)); ;
    }
    public function vistaEditCapitulo($id_seccion){
        $titlo = Titulo::select('id', 'nombre', 'numero')->where('id', '=', Capitulo::findOrFail($id_seccion)->id_titulo)->get()->first();
        return view('administrador.modificar-capitulo', ["titulos" => Titulo::all('id', 'nombre', 'numero'),
                    "tituloq"=>$titlo])->with('infold', Capitulo::findOrFail($id_seccion)); ;
    }
    public function vistaEditArticulo($id_seccion){
        $capto = Capitulo::select('id', 'nombre', 'numero','id_titulo')->where('id', '=', Articulo::findOrFail($id_seccion)->id_capitulo)->get()->first();
        $titlo = Titulo::select('id', 'nombre','numero')->where('id', '=', $capto->id_titulo)->get()->first();
        return view('administrador.modificar-articulo', 
                    ["titulos" => Titulo::all('id', 'nombre', 'numero'), "capitulos" => Capitulo::select('id', 'nombre', 'numero')->where('id_titulo', '=', $capto->id_titulo)->get(),
                    "capituloq"=>$capto, "tituloq"=>$titlo])->with('infold', Articulo::findOrFail($id_seccion));
    }   

    public function editTitulo(Request $request, $id_seccion){
        $this->validate($request, [
            'nombre_tit' => 'required|max:100',
        ]);
        
        $titulo = Titulo::findOrFail($id_seccion);
        $titulo->nombre = $request->input('nombre_tit');
        $titulo->numero = intval(Titulo::all('numero')->max('numero')) + 1;
        $titulo->fecha_modificacion = date('Y-m-d');
        //return $titulo;
        $titulo->save();

        $this->addEdicion('titulo', $titulo->id, 'MOD');

        return $this->showSuccess('Se ha modificado el Título', $request->input('nombre_tit'), 'Título', 'edición', $titulo->numero);

    }

    public function editCapitulo(Request $request, $id_seccion){
        $this->validate($request, [
            'nombre_capitulo' => 'required|max:100',            
            'titulo' => 'required|numeric|exists:titulos,id'
        ]);
        
        $capitulo = Capitulo::findOrFail($id_seccion);
        $capitulo->nombre = $request->input('nombre_capitulo');
        $capitulo->numero = (Capitulo::where('id', '=', $id_seccion)->get('numero')->first()->numero);
        $capitulo->fecha_modificacion = date('Y-m-d');
        $capitulo->id_titulo = $request->input('titulo');
        //return $capitulo;
        $capitulo->save();

        $this->addEdicion('capitulo',$capitulo->id, 'MOD');
        
        return $this->showSuccess('Se ha modificado el Capítulo', $request->input('nombre_capitulo'), 'Capítulo', 'edición', $capitulo->numero);
    }

    public function editArticulo(Request $request, $id_seccion){

        $this->validate($request, [
            'nombre_articulo' => 'required|max:100',
            'contenido' => 'required'
        ]);
        
        $articulo = Articulo::findOrFail($id_seccion);
        $articulo->nombre = $request->input('nombre_articulo');
        $articulo->numero = (Articulo::select('numero')->where('id','=',$id_seccion)->get()->first()->numero);
        $articulo->fecha_modificacion = date('Y-m-d');
        $articulo->contenido = $request->input('contenido');
        //$array_cap = explode(". ", $request->input('capitulo'));
        //$num_cap = $array_cap[0]; $nom_cap = $array_cap[1];
        //$articulo->id_capitulo = (Capitulo::select('id')->where([['nombre','=',$nom_cap],['numero','=',$num_cap]])->get()->first()->id);
        $articulo->id_capitulo = $request->input('capitulo');
        $articulo->paragrafo = true;
        //return $articulo;
        $articulo->save();

        $this->addEdicion('articulo',$articulo->id, 'MOD');

        return $this->showSuccess('Se ha modificado el Artículo', $request->input('nombre_articulo'), 'Artículo', 'edición', $articulo->numero);
    }

    function eliminar(Request $request){
        $sesrc = null;
        switch ($request->input('seccion')) {
            case 'articulo':
                $sesrc = Articulo::select('id', 'activo', 'nombre', 'numero')->where('activo', '=', true)->where('id', '=', $request->input('id'))->get()->first();
                break;
            case 'capitulo':
                $sesrc = Capitulo::select('id', 'activo', 'nombre', 'numero')->where('activo', '=', true)->where('id', '=', $request->input('id'))->get()->first();
                break;
            case 'titulo':
                $sesrc = Titulo::select('id', 'activo', 'nombre', 'numero')->where('activo', '=', true)->where('id', '=', $request->input('id'))->get()->first();
                break;            
            default:
                return abort(404);
                break;
        }

        if($sesrc){
            $sesrc->activo = false;
            $sesrc->save();
            $this->addEdicion($request->input('seccion'), $sesrc->id, 'SUP');
            return $this->showSuccess('Se ha eliminado el '.$request->input('seccion'), $sesrc->nombre, $request->input('seccion'), 'eliminacion', $sesrc->numero);
        }else{
            return abort(404);
        }
    }

}