<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capitulo;
use App\Models\Articulo;
use App\Models\EdicionTitulo;
use App\Models\EdicionCapitulo;
use App\Models\EdicionArticulo;
use DateTime;

class ContenidoController extends Controller
{
    // funciones de respuesta a Ajax 
    public function getCapitulosFrom(Request $request){
        $capitulos_list = Capitulo::select('capitulos.id', 'capitulos.nombre', 'capitulos.numero', 'titulos.numero as titulo')->join('titulos', 'capitulos.id_titulo', '=', 'titulos.id')->where('id_titulo', '=', $request->input('id_from'))->get();
        return response(json_encode($capitulos_list), 200)->header('content-type', 'text/plain');
    }    
    public function getArticulosFrom(Request $request){
        $articulos_list = Articulo::select('id', 'nombre', 'numero', 'contenido')->where('id_capitulo', '=', $request->input('id_from'))->get();
        return response(json_encode($articulos_list), 200)->header('content-type', 'text/plain');
    }
    // Informes 
    private function getArrayInforme($seccion){

        $selectArr = ["edicion_{$seccion}s.id",
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

    public function getInforme(Request $request){
        $titulos = $this->getArrayInforme('titulo');
        $capitulos = $this->getArrayInforme('capitulo');
        $articulos = $this->getArrayInforme('articulo');
        $informeArr = array();

        foreach($titulos as $item){
            $fecha = new DateTime($item->created_at);
            $newItem = ['id' => $item->id,
             'idAdmin' => $item->id_administrador,
             'nomAdmin' => $item->nombres . $item->apellidos,
             'cedulaAdmin' => $item->cedula,
             'idSeccion' => $item->id_titulo,
             'nomSeccion' => $item->nombre,
             'tipoMod' => $item->tipo,
             'fechaMod' => $fecha->format('Y-m-d H:m:s'),
             'tipoSeccion' => 'Titulo'
            ];
            array_push($informeArr, $newItem);
        }

        foreach($capitulos as $item){
            $fecha = new DateTime($item->created_at);
            $newItem = ['id' => $item->id,
             'idAdmin' => $item->id_administrador,
             'nomAdmin' => $item->nombres . $item->apellidos,
             'cedulaAdmin' => $item->cedula,
             'idSeccion' => $item->id_capitulo,
             'nomSeccion' => $item->nombre,
             'tipoMod' => $item->tipo,
             'fechaMod' => $fecha->format('Y-m-d H:m:s'),
             'tipoSeccion' => 'Capitulo'
            ];
            array_push($informeArr, $newItem);
        }

        foreach($articulos as $item){
            $fecha = new DateTime($item->created_at);
            $newItem = ['id' => $item->id,
             'idAdmin' => $item->id_administrador,
             'nomAdmin' => $item->nombres . $item->apellidos,
             'cedulaAdmin' => $item->cedula,
             'idSeccion' => $item->id_articulo,
             'nomSeccion' => $item->nombre,
             'tipoMod' => $item->tipo,
             'fechaMod' => $fecha->format('Y-m-d H:m:s'),
             'tipoSeccion' => 'Articulo'
            ];
            array_push($informeArr, $newItem);
        }

        return view('administrador.informe', ['infoArr' => $informeArr]);
    }
}
