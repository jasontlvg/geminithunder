<?php

namespace App\Http\Controllers;

use App\Respuesta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class aCambioEncuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $respuestas= Respuesta::select('id','respuesta')->get();
        $i=0;

        $preguntas[0] = "El tiempo que se le invierte al desmontaje o cambiar los elementos que ya no son necesarios para la fabricación de un nuevo producto son relativamente cortos.";
        $preguntas[1] = "El tiempo del ensamblaje de los elementos para la fabricación del nuevo producto son relativamente cortos, debido al cumplimiento de los principios de ensamblaje.";
        $preguntas[2] = "Están claramente definidos las actividades del montaje como: ubicación, orientación, temperatura, velocidad, movimientos, limpieza, purga, etc. por lo que sus tiempos son cortos.";
        $preguntas[3] = "Existe un número mínimo de ajustes en el proceso y están claramente definidos los criterios por lo que los tiempos son mínimos.";
        $preguntas[4] = "Las operaciones del cambio están clasificadas y analizadas en operaciones internas y externas para su optimización.";
        $preguntas[5] = "Los programas de producción permiten planificar, organizar y coordinar estratégicamente todas las actividades previas al nuevo producto.";
        $preguntas[6] = "Las actividades externas se inician en tiempo y forma, lo que permite agilizar las actividades internas al proceso de cambio.";
        $preguntas[7] = "Existe una validación y control del conjunto de valores ajustados, así como pruebas, controles de calidad e indicadores del set up.";

        return view('acambioEncuesta', compact('preguntas', 'respuestas', 'i'));
    }

    public function saveForm(Request $request){
        $r= $request->all();
        $per= User::find(Auth::id())->aCambio;
        for($i=1; $i<sizeof($r); $i++){
            $x= 'p'.$i;
            try{
                $per->$x= $r[$i];
            }catch (\Exception $e){
                return 'Error';
            }
        }
        $per->answered= 1;
        $per->save();
        return redirect(route('home'));

    }
}
