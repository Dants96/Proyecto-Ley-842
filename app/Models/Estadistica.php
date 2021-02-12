<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Estadistica extends Model
{
    use HasFactory;



    // retornara el registro de la tabla estadisiticas de el año actual, en caso de no existir lo creara y lo retornara 
    static function getCurr(){
        $estCurr = Estadistica::find(date('Y'));
        if($estCurr){
            return $estCurr;
        }else{
            DB::insert('insert into estadisticas (
                id, 
                visitas_pagina, 
                numero_modificaciones, 
                numero_adiciones, 
                numero_supreciones,
                num_vistas_articulos,
                num_vistas_capitulos, 
                num_vistas_titulos, 
                created_at, 
                updated_at
                ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [date(year), 0,0,0,0,0,0,0, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]
            );
            $estCurr = Estadistica::find(date('Y'));
            return $estCurr;
        }
        
    }
}

