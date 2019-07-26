<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Respuesta;
use App\personaEncuestaRes;
use App\User;


class PersonasEncuestaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $respuestas= Respuesta::select('id','respuesta')->get();
        $i=0;

        $preguntas[0] = "El equipo encargado de los cambios de modelo cuenta con habilidades y experiencia profesional.";
        $preguntas[1] = "Existe una cultura organizacional hacia la mejora continua de procesos y del desarrollo y satisfacción de los miembros de la empresa.";
        $preguntas[2] = "Todos los involucrados en la implementación de los cambios rápidos conocen el proceso.";
        $preguntas[3] = "Las personas encargadas de realizar los cambios rápidos conocen el funcionamiento y mantenimiento de la máquina y/o equipo.";
        $preguntas[4] = "Las personas involucradas en implementar los cambios rápidos cuentan con un programa de capacitación y entrenamiento para trabajar el equipo y uso de herramientas.";
        $preguntas[5] = "Existe un compromiso de la alta gerencia para involucrarse y comprometerse en las mejora de las actividades de cambios rápidos.";
        $preguntas[6] = "El personal encargado de realizar las actividades está comprometido y entiende de manera clara la importancia de realizar la actividad en el menor tiempo.";
        $preguntas[7] = "Las personas involucradas a las actividades de cambios rápidos deben poseer capacidad y disposición para ejecutar varias tareas en los proceso de cambios (polifuncionalidad).";
        $preguntas[8] = "En la medida que él personas posee mayor especialización en el equipo, los tiempos de las actividades de cambios rápidos se reducen.";
        $preguntas[9] = "La calidad con que se realiza las tareas individuales en la secuencia de actividades de los cambios rápidos impacta en el tiempo en que el equipo está disponible para correr el modelo sin generar desperdicios y cumpliendo con los requerimientos.";
        $preguntas[10] = "Los roles de las personas que participan en las actividades de cambios rápidos, son asignados de acuerdo a su experiencia, conocimientos y habilidades lo que permite tener mayor resultados en el proceso.";
        $preguntas[11] = "La comunicación verbal, escrita y visual entre las personas involucradas en las actividades de cambios rápidos es un factor importante para la realización de las tareas.";
        $preguntas[12] = "El liderazgo de los responsables de los proyectos de cambios rápidos, motivan a las personas y dan claridad de los objetivos para un desempeño favorable.";
        $preguntas[13] = "La motivación del personal incide positivamente en el desempeño de las actividades de cambios rápidos, principalmente en la calidad en las tareas, comunicación, trabajo en equipo y logro de los objetivos planteados.";
        $preguntas[14] = "La persona responsable de dirigir, gestionar o administrar los proyectos de cambios rápidos colaboran en la planeación, seguimiento, gestión de recursos, supervisión, coordinación del personal, generan estadísticas, resuelven las incidencias y problemas y comunican los resultados de manera eficiente.";
        $preguntas[15] = "El número de personas involucradas en las actividades de cambios rápidos son suficiente para lograr la eficiencia en los tiempos de cambio.";
        $preguntas[16] = "La carga de trabajo de las personas que intervienen en el equipo es adecuada.";

        return view('personasEncuesta', compact('preguntas', 'respuestas', 'i'));
    }

    public function saveForm(Request $request){
        $r= $request->all();
        $per= User::find(Auth::id())->persona;
        for($i=1; $i<sizeof($r); $i++){
            $x= 'p'.$i;
            $per->$x= $r[$i];
        }
        $per->answered= 1;
        $per->save();
        return redirect(route('home'));

    }
}
