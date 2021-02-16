<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EdicionTitulo;
use App\Models\EdicionCapitulo;
use App\Models\EdicionArticulo;
use App\Models\Titulo;
use App\Models\Capitulo;
use App\Models\Articulo;
use DateTime;

class ContenidoController extends Controller
{
    // funciones de respuesta a Ajax 
    public function getCapitulosFrom(Request $request){
        $capitulos_list = Capitulo::select('capitulos.id', 'capitulos.nombre', 'capitulos.numero', 'titulos.numero as titulo', 'capitulos.activo')->join('titulos', 'capitulos.id_titulo', '=', 'titulos.id')->where('capitulos.activo', '=', true)->where('id_titulo', '=', $request->input('id_from'))->get();
        return response(json_encode($capitulos_list), 200)->header('content-type', 'text/plain');
    }    
    public function getArticulosFrom(Request $request){
        $articulos_list = Articulo::select('id', 'nombre', 'numero', 'contenido', 'activo')->where('activo', '=', true)->where('id_capitulo', '=', $request->input('id_from'))->get();
        return response(json_encode($articulos_list), 200)->header('content-type', 'text/plain');
    }
    // Informe datos Modificaciones
    private function getArrayInforme($seccion){
        $selectArr = [
        "edicion_{$seccion}s.id_administrador",
        "administradores.nombres",
        "administradores.apellidos",
        "administradores.cedula", 
        "edicion_{$seccion}s.id_{$seccion}",
        "{$seccion}s.nombre", 
        "edicion_{$seccion}s.tipo", 
        "edicion_{$seccion}s.created_at"
        ];

        $arr = null;
        switch($seccion){
            case 'articulo':
                $arr = EdicionArticulo::select($selectArr)->join("administradores", 
                "edicion_{$seccion}s.id_administrador", 
                "=", 
                "administradores.id")->join("{$seccion}s", 
                "edicion_{$seccion}s.id_{$seccion}", 
                "=", 
                "{$seccion}s.id")->get();
                break;
            case 'capitulo':
                $arr = EdicionCapitulo::select($selectArr)->join("administradores", 
                "edicion_{$seccion}s.id_administrador", 
                "=", 
                "administradores.id")->join("{$seccion}s", 
                "edicion_{$seccion}s.id_{$seccion}", 
                "=", 
                "{$seccion}s.id")->get();
                break;
            case 'titulo':
                $arr = EdicionTitulo::select($selectArr)->join("administradores", 
                "edicion_{$seccion}s.id_administrador", 
                "=", 
                "administradores.id")->join("{$seccion}s", 
                "edicion_{$seccion}s.id_{$seccion}", 
                "=", 
                "{$seccion}s.id")->get();
                break;
        }
        return $arr;
    }

    private function getDescMod($tipoMod){
        switch ($tipoMod) {
            case "ADC":
                return "Adición";
                break;
            case "MOD":
                return "Edición";
                break;
            case "SUP":
                return "Eliminación";
                break;
        }
    }

    // Retorna la lista de parametro pero con los objetos del query agregados como un item array
    private function createItemVisita($query, $array, $seccion){
        foreach($query as $item){
            $newItem = [
                'id' => $item->id,
                'numero' => $item->numero,
                'nombre' => $item->nombre,
                'vistas' => $item->vistas,
                'creado' => $item->created_at->format('Y-m-d'),
                'modificado' => $item->fecha_modificacion,
                'paragrafo' => ($seccion == 'Artículo')? (($item->paragrafo)? 'si':'no'):'No aplica',
                'tipoSeccion' => $seccion
            ];
            array_push($array, $newItem);
        }
        return $array;
    }

    public function getInforme(Request $request){

        switch($request->input('source')){
            case 'modificaciones':
                $titulos = $this->getArrayInforme('titulo');
                $capitulos = $this->getArrayInforme('capitulo');
                $articulos = $this->getArrayInforme('articulo');
                $informeArr = array();

                foreach($titulos as $item){
                    //$fecha = new DateTime($item->created_at);
                    $newItem = [
                    'idAdmin' => $item->id_administrador,
                    'nomAdmin' => $item->nombres . $item->apellidos,
                    'cedulaAdmin' => $item->cedula,
                    'idSeccion' => $item->id_titulo,
                    'nomSeccion' => $item->nombre,
                    'tipoMod' => $this->getDescMod($item->tipo),
                    'fechaMod' => $item->created_at->format('Y-m-d H:m:s'),
                    'tipoSeccion' => 'Titulo'
                    ];
                    array_push($informeArr, $newItem);
                }

                foreach($capitulos as $item){
                    //$fecha = new DateTime($item->created_at);
                    $newItem = [
                    'idAdmin' => $item->id_administrador,
                    'nomAdmin' => $item->nombres . $item->apellidos,
                    'cedulaAdmin' => $item->cedula,
                    'idSeccion' => $item->id_capitulo,
                    'nomSeccion' => $item->nombre,
                    'tipoMod' => $this->getDescMod($item->tipo),
                    'fechaMod' => $item->created_at->format('Y-m-d H:m:s'),
                    'tipoSeccion' => 'Capitulo'
                    ];
                    array_push($informeArr, $newItem);
                }

                foreach($articulos as $item){
                    //$fecha = new DateTime($item->created_at);
                    $newItem = [
                    'idAdmin' => $item->id_administrador,
                    'nomAdmin' => $item->nombres . $item->apellidos,
                    'cedulaAdmin' => $item->cedula,
                    'idSeccion' => $item->id_articulo,
                    'nomSeccion' => $item->nombre,
                    'tipoMod' => $this->getDescMod($item->tipo),
                    'fechaMod' => $item->created_at->format('Y-m-d H:m:s'),
                    'tipoSeccion' => 'Articulo'
                    ];
                    array_push($informeArr, $newItem);
                }
                                
                return view('administrador.informe', ['infoArr' => $informeArr, 'source' => 'Modificaciónes']);

            case 'vistas':
                $titulos = Titulo::select('id', 'nombre', 'numero', 'vistas', 'created_at', 'fecha_modificacion')->get();
                $capitulos = Capitulo::select('id', 'nombre', 'numero', 'vistas', 'created_at', 'fecha_modificacion')->get();;
                $articulos = Articulo::select('id', 'nombre', 'numero', 'vistas', 'created_at', 'fecha_modificacion', 'paragrafo')->get();;
                $informeArr = array();
                $informeArr = $this->createItemVisita($titulos, $informeArr, 'Título');
                $informeArr = $this->createItemVisita($capitulos, $informeArr, 'Capítulo');
                $informeArr = $this->createItemVisita($articulos, $informeArr, 'Artículo');                

                return view('administrador.informe', ['infoArr' => $informeArr, 'source' => 'Vistas']);    
            default : 
                return view('administrador.informe', ['source' => '404']);
        }

      
    }

    

        
}
