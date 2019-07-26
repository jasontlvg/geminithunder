<?php

namespace App\Http\Controllers;

use App\Respuesta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PracticaEncuestaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $respuestas= Respuesta::select('id','respuesta')->get();
        $i=0;

        $preguntas[0] = "Existe una estructura organizacional clara que permite que cada persona conozca su rol y sus responsabilidades.";
        $preguntas[1] = "Existe un área o grupo específico para la mejora continua de los procesos de la empresa, y desde ahí se plantean y se abordan los problemas y la reducción de tiempos de los equipos.";
        $preguntas[2] = "Se tienen objetivos estratégicos para reducir los tiempos de cambios, incrementar la disponibilidad de la maquina o equipo y la reducción de costos relacionadas con las actividades de cambio.";
        $preguntas[3] = "Se cuenta con objetivos establecidos para reducir los desperdicios ocasionados en las actividades de cambios rápidos.";
        $preguntas[4] = "Existe apoyo económico para la implementación de mejoras en el equipo, herramientas, área de trabajo etc. que simplifique y mejore la calidad en las actividades de cambio.";
        $preguntas[5] = "En el proceso de mejora se utilizan herramientas para el análisis de como 5 porqués, diagramas de Pareto, diagramas de causa efecto, ciclo de PDCA, gráficas de control, entre otras que ayudan a identificar las áreas de oportunidad en las actividades de cambios.";
        $preguntas[6] = "Se hacen uso de técnicas complementarias para la mejora de los procesos como 5´s, Poka yoke, Justo a Tiempo, TPM, Kanban, DMAIC, Mapeo de Cadena de Valor, Trabajo Estandarizado, Kaizen, entre otras que apoyan a la eficiencia de los tiempos de cambio.";
        $preguntas[7] = "La implementación de varias metodologías de mejora continua a la vez favorecen a las actividades de cambio rápidos.";
        $preguntas[8] = "Cada vez que se implementa una acción de mejora, se actualizan los procedimientos del cambio.";
        $preguntas[9] = "La alta dirección apoya la implementación de proyectos de cambios rápidos.";
        $preguntas[10] = "Los procedimientos para realizar los cambios rápidos se encuentran documentados.";
        $preguntas[11] = "Al momento de realizar el cambio, se siguen los procedimientos en el orden y secuencia indicada.";
        $preguntas[12] = "Se cuenta con la información del tiempo requerido para realizar cada uno de los cambios.";
        $preguntas[13] = "Cada vez que se implementa una acción de mejora, se actualizan los procedimientos del cambio.";
        $preguntas[14] = "Existe un reporte de las incidencias encontradas en los procesos para la realización de un cambio.";
        $preguntas[15] = "Se tienen identificadas las tareas o actividades necesarias para realizar el cambio rápido.";
        $preguntas[16] = "Existen procedimientos de reajuste que den un enlace directo entre una falla observada en el producto y el parámetro que debe ser reajustado.";
        $preguntas[17] = "Los cambios no planeados en el plan de producción diaria afectan los tiempos de cambios de modelos.";
        $preguntas[18] = "Sólo se utilizan las herramientas, materiales y medios de control establecidos para realizar el cambio.";
        $preguntas[19] = "Las condiciones del entorno (medioambientales, puesto de trabajo, estanterías, etc.) son adecuados para llevar a cabo los cambios rápidos.";
        $preguntas[20] = "Se cuenta con equipo de protección para la seguridad del personal que realiza las tareas de cambios rápidos.";

        return view('practicaEncuesta', compact('preguntas', 'respuestas', 'i'));
    }

    public function saveForm(Request $request){
        $r= $request->all();
        $per= User::find(Auth::id())->practica;
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
