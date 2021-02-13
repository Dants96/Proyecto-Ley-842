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
        $estadisticas = Estadistica::getCurr();
        $estadisticas->visitas_pagina++;
        $estadisticas->save();
        
        $hoy = date('Y-m-d');
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

    public function getIndexOf($seccion){
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

    // agragar una vista a la seccion espesifica 
    private function agregarVista($seccion, $idSec){
        $estadisticas = Estadistica::getCurr();
        switch ($seccion) {
            case 'titulo':
                $query = Titulo::find($idSec);  
                $estadisticas->num_vistas_titulos ++;
                break;
            case 'capitulo':
                $query = Capitulo::find($idSec);   
                $estadisticas->num_vistas_capitulos ++;             
                break;
            case 'articulo':
                $query = Articulo::find($idSec);  
                $estadisticas->num_vistas_articulos ++;              
                break;
        }
        if($query){
            $query->vistas ++;
            $query->save();            
            $estadisticas->save();
        }         
        
    }

    
    // retorna un array con la informacion enlazada del titulo, sus capitulos y sus articulos
    // esta mousequeherramienta misteriosa va a sernos util mas tarde :v 
    private function getTituloArr($id){
        $titulo = Titulo::findOrFail($id);
        $capitulos = Capitulo::where('id_titulo', '=', $titulo->id)->get();
        $capitulosArr = array();
        foreach($capitulos as $capitulo){
            $articulos = Articulo::where('id_capitulo','=', $capitulo->id)->get();
            array_push($capitulosArr, ['contenido' => $capitulo, 'articulos' => $articulos]);
        }
        return ['contenido'=> $titulo, 'capitulos' => $capitulosArr];
    }

    public function getLeyTitulo($idSc){
        $titulo = $this->getTituloArr($idSc);
        $this->agregarVista('titulo', $idSc);
        return view('titulo', ['titulo' => $titulo, 'loop' => false]);
    }
    
    public function getLeyCapitulo($idSc){
        $capitulo = Capitulo::findOrFail($idSc);
        $titulo_ref = Titulo::select('numero', 'nombre')->where('id', '=', $capitulo->id_titulo)->get()->first();
        $this->agregarVista('capitulo', $idSc);
        return view('capitulo', ['capitulo'=> ['contenido'=>$capitulo, 'articulos'=>Articulo::where('id_capitulo', '=', $capitulo->id)->get()], 'tituloRef'=>$titulo_ref]);
    }
    
    public function getLeyArticulo($idSc){
        $articulo = Articulo::where('id', '=', $idSc)->get()->first();
        $capitulo_ref = Capitulo::select('numero', 'nombre', 'id_titulo')->where('id', '=', $articulo->id_capitulo)->get()->first();
        $titulo_ref = Titulo::select('numero', 'nombre')->where('id', '=', $capitulo_ref->id_titulo)->get()->first();
        $this->agregarVista('articulo', $idSc);
        return view('articulo', ['articulo' => $articulo, 'capituloRef' => $capitulo_ref, 'tituloRef' => $titulo_ref]);
    }

    public function getLeyCompleta(){
        $titIdsArr = Titulo::select('id')->get();
        $titArrs = array();
        foreach ($titIdsArr as $titId){
            array_push($titArrs, $this->getTituloArr($titId->id));
        }
        return view('todoLey',['titulos' => $titArrs]);
    }

}
