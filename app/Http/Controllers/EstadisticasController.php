<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use  App\Models\Estadistica;
use App\Models\EdicionArticulo;
use App\Models\EdicionCapitulo;
use App\Models\EdicionTitulo;
use DateTime;
use DateInterval;

class EstadisticasController extends Controller
{
    public function getStadistics(){
        $estadisticas = Estadistica::find(date('Y'));
        $datosChartMod = $this->dataChartEdc();
        return view("Administrador.estadisiticas", ['estadisticas' => $estadisticas, 'datosModchart' => $datosChartMod]);
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


    
    // funcion para crear los datos de la grafica de ultimos 30 dias de modificaciones.
    private function dataChartEdc(){
        $dias = array();        
        for($i=30; $i>=0; $i--){            
            $fechaHoy = new DateTime('today');   
            $contADC = 0; 
            $contSUP = 0; 
            $contMOD = 0; 

            $fechaFetch = $fechaHoy->sub(new DateInterval('P'.$i.'D'));
            $fechaFetch = $fechaFetch->format('Y-m-d');

            $contADC += EdicionArticulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'ADC')->count('id');
            $contADC += EdicionTitulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'ADC')->count('id');
            $contADC += EdicionCapitulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'ADC')->count('id');

            $contMOD += EdicionArticulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'MOD')->count('id');
            $contMOD += EdicionTitulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'MOD')->count('id');
            $contMOD += EdicionCapitulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'MOD')->count('id');

            $contSUP += EdicionArticulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'SUP')->count('id');
            $contSUP += EdicionTitulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'SUP')->count('id');
            $contSUP += EdicionCapitulo::where('fecha', '=', $fechaFetch)->where('tipo', '=', 'SUP')->count('id');

            array_push($dias, ['dia' => $fechaFetch, 'contADC' => $contADC, 'contMOD' => $contMOD, 'contSUP' => $contSUP]);
        }
        return $dias;        
    }
    

}
