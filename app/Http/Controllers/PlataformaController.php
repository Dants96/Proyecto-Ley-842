<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadistica;
use App\Models\Visita;


class PlataformaController extends Controller
{
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
}
