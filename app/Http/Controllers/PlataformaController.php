<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Capitulo;
use App\Models\Titulo;
use App\Models\Estadistica;
use App\Models\Visita;


class PlataformaController extends Controller
{
    // agrega las vistas al dia actual en la base de datos , si no hay lo crea
    private function agregarVisita(){
        $year = date('Y');
        $estadisticas = Estadistica::find($year);
        $estadisticas->visitas_pagina++;
        $estadisticas->save();
        
        $hoy = date('Y-d-m');
        $visita_diaria = visita::where('fecha','=', $hoy)->first();
        if($visita_diaria){
            $visita_diaria->contador++;
        }else{
            $visita_diaria = new Visita();
            $visita_diaria->fecha = $hoy;
            $visita_diaria->contador = 1;
        }
        $visita_diaria->save();
    }

    public function getInicio(){
        $this->agregarVisita();
        return view('home');
    }

    public function getIndeOf($seccion){
        switch($seccion){
            case 'Títulos':
                $titulos = Titulo::select('id', 'numero', 'nombre')->get();
                return view('indices', ['seccion' => $seccion, 'source' => $titulos]);
                break;
            case 'Capítulos':
                $source = array();
                $titulos = Titulo::select('id', 'nombre', 'numero')->get();
                foreach($titulos as $titulo){
                    $capitulos = Capitulo::select('id', 'numero', 'nombre')->where('id_titulo', '=', $titulo->id)->get();
                    array_push($source, ['numero' => $titulo->numero, 'nombre' => $titulo->nombre, 'capitulos' => $capitulos]);
                }
                return view('indices', ['seccion' => $seccion, 'source' => $source]);                
                break;
                
            case 'Artículos':
                $source = array();
                $titulos = Titulo::select('id', 'nombre', 'numero')->get();
                foreach($titulos as $titulo){
                    $capitulos = Capitulo::select('id', 'numero', 'nombre')->where('id_titulo', '=', $titulo->id)->get();
                    $capArray = array();
                    foreach($capitulos as $capitulo){
                        $articulos =  Articulo::select('id', 'numero', 'nombre')->where('id_capitulo', '=', $capitulo->id)->get();
                        array_push($capArray, ['nombre' => $capitulo->nombre, 'numero' => $capitulo->numero, 'articulos' => $articulos]);
                    }
                    array_push($source, ['nombre' => $titulo->nombre, 'numero' => $titulo->numero, 'capitulos' => $capArray]);
                }
                return view('indices', ['seccion' => $seccion, 'source' => $source]);
                break;
        }


        return abort(404);

    }

    // retorna un array con la informacion enlazada del titulo sus capitulos y sus articulos
    private function getTituloArr($id){
        $titulo = Titulo::find($id);
        $Capitulos = Capitulo::where('id_titulo', '=', $id)->get();
        $capituloArr = array();
        foreach($capitulos as $capitulo){
            
        }

    }

    public function getLeyTitulo($idSc){
        return $idSc;
    }
    public function getLeyCapitulo($idSc){

    }
    public function getLeyArticulo($idSc){

    }
}
