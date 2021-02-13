<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use  App\Models\Estadistica;
use App\Models\EdicionArticulo;
use App\Models\EdicionCapitulo;
use App\Models\EdicionTitulo;
use App\Models\Visita;
use DateTime;
use DateInterval;

class EstadisticasController extends Controller
{
    public function getStadistics(){
        $estadisticas = Estadistica::find(date('Y'));
        $datosChartMod = $this->dataChartMod();
        $datosChartVisit = $this->dataChartVisit();
        return view("Administrador.estadisiticas",
        ['estadisticas' => $estadisticas, 
        'datosModchart' => $datosChartMod, 
        'datosVisitchart' => $datosChartVisit,
        ]);
    }
 
    // funcion para crear los datos de la grafica de ultimos 30 dias de modificaciones.
    private function dataChartMod(){
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

    private function dataChartVisit(){
        $dias = array();
        for($i=30; $i>=0; $i--){
            $fechaHoy = new DateTime('today'); 
            $fechaFetch = $fechaHoy->sub(new DateInterval('P'.$i.'D'));
            $fechaFetch = $fechaHoy->format('Y-m-d');
            
            $visita = Visita::select('contador')->where('fecha', '=', $fechaFetch)->get()->first();
            $cont = ($visita)? $visita->contador : 0 ;

            array_push($dias, ['dia' => $fechaFetch, 'contVisit' => $cont]);
        }
        return $dias;
    }
    

}
