<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capitulo;
use App\Models\Articulo;

class ContenidoController extends Controller
{
    public function getCapitulosFrom(Request $request){
        $capitulos_list = Capitulo::select('id', 'nombre', 'numero')->where('id_titulo', '=', $request->input('id_from'))->get();
        return response(json_encode($capitulos_list), 200)->header('content-type', 'text/plain');
    }    
    public function getArticulosFrom(Request $request){
        $articulos_list = Articulo::select('id', 'nombre', 'numero', 'contenido')->where('id_capitulo', '=', $request->input('id_from'))->get();
        return response(json_encode($articulos_list), 200)->header('content-type', 'text/plain');
    }
}
