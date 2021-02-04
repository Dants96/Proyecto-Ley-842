<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use  App\Models\Estadistica;

class EstadisticasController extends Controller
{
    public function getStadistics(){
        $estadisticas = Estadistica::find(date('Y'));
        return view("Administrador.estadisiticas", ['estadisticas' => $estadisticas]);
    }

    public function getChartData(){
        $extra = [
            "some_key" => "some_value",
            "some_key2" => "some_value2",
        ];

        $chart = Chartisan::build()
        ->labels(['First', 'Second', 'Third'])
        ->extra($extra)
        ->dataset('Sample 1', [1, 2, 3])
        ->dataset('Sample 2', [3, 2, 1])
        ->toJSON();
        
        return response($chart, 200)->header('content-type', 'application/json; charset=utf-8');
    }
    

}
