<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Models\Estadistica;

class EstadisticasController extends Controller
{
    public function getStadistics(){
        $estadisticas = Estadistica::find(date('Y'));
        return view("Administrador.estadisiticas", ['estadisticas' => $estadisticas]);
    }

}
