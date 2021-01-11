<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capitulo;

class ContenidoController extends Controller
{
    public function getCapitulos(Request $request){
        $capitulos_list = Capitulo::select('id', 'nombre', 'numero')->where('id_titulo', '=', $request->input('id_titulo'))->get();
        return response(json_encode($capitulos_list), 200)->header('content-type', 'text/plain');
    }
}
