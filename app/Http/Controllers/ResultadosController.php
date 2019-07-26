<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\aCambioEncuestaRes;
use App\personaEncuestaRes;
use App\practicaEncuestaRes;
use App\procesoEncuestaRes;
use App\productoEncuestaRes;

class ResultadosController extends Controller
{
    public function index()
    {
//        $personasRes= personaEncuestaRes::where('answered',1)->whereHas('owner', function($query){
//            $query->where('departamento_id','like',2);
//        })->select('p1')->get()->all();
//        return $personasRes;

        $d=2;

        $pACambio=[];
        $pPersona=[];
        $pPractica=[];
        $pProcesos=[];
        $pProducto=[];

        // Numero de Columnas de respuestas
        $aCambioColNum=8;
        $personaCol= 17;

        // Elegir las columnas de la tabla de respuestas, para cada Encuesta
        for($i=1; $i<=8; $i++){
            array_push($pACambio,'p'.$i);
        }

        for($i=1; $i<=$personaCol; $i++){
            array_push($pPersona,'p'.$i);
        }

        for($i=1; $i<=21; $i++){
            array_push($pPractica,'p'.$i);
        }

        for($i=1; $i<=26; $i++){
            array_push($pProcesos,'p'.$i);
        }


        // Obtencion y Filtrado de Respuestas de la Encuesta Personas
        $personasRes= personaEncuestaRes::where('answered',1)->whereHas('owner', function($query) use ($d) {
            $query->where('departamento_id','like',$d);
        })->select($pPersona)->get()->all();
        $resPersonasFiltrado=[];
        for($i=1;$i<=$personaCol;$i++){
            $resPersonasFiltrado[$i]=[];
        }
        foreach ($personasRes as $r){
            for($i=1;$i<=$personaCol;$i++){
                $n='p'.$i;
                array_push($resPersonasFiltrado[$i],$r->$n);
            }
        }
        return $resPersonasFiltrado;
    }
}
