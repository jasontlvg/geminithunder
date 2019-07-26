<?php

namespace App\Http\Controllers;

use App\Respuesta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcesosEncuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $respuestas= Respuesta::select('id','respuesta')->get();
        $i=0;

        $preguntas[0] = "Los indicadores como tiempos de cambios y recursos utilizados para poner en marcha el nuevo producto son medidos y monitoreados.";
        $preguntas[1] = "Los tiempos de cambios son mayores en los procesos que se realizan manualmente.";
        $preguntas[2] = "La automatización de los equipos es una alternativa para la reducción de tiempos de cambio.";
        $preguntas[3] = "Los ajustes son realizados con un mínimo esfuerzo, rápida apertura y cierre.";
        $preguntas[4] = "Se utilizan sistema de fijación modular para facilitar los montajes y ensamblajes de piezas de la máquina.";
        $preguntas[5] = "Existen equipos que manejan accesorios y herramientas exclusivas del fabricante que en ocasiones atrasa el proceso de cambio de modelo.";
        $preguntas[6] = "Las herramientas, partes, accesorios necesarios para realizar el montaje y desmontaje se encuentran organizados y ubicadas cerca de la máquina y/o equipo.";
        $preguntas[7] = "El equipo cuenta con dispositivos de liberación rápida que facilita las actividades de desmontaje, ensambles y montajes del equipo.";
        $preguntas[8] = "El equipo utiliza elementos de ajustes rápidos como: tornillos de una vuelta, un movimiento o métodos combinados, herramientas de torque, arandelas, etc.";
        $preguntas[9] = "Existe un buen acceso para el transporte y manipulación del equipo para realizar los cambios rápidos.";
        $preguntas[10] = "Se cuenta con elementos especiales de transporte para el movimiento de materiales y herramientas, como pallet Jack, grúas portátiles, carros de accesorios y transportadores.";
        $preguntas[11] = "La limpieza del equipo, herramientas y el área de trabajo es un elemento importante en la actividad de cambio.";
        $preguntas[12] = "Se utilizan materiales ligeros en los moldes y en el equipo que facilitan la instalación, transporte y mantenimiento.";
        $preguntas[13] = "Existen pocos mecanismos para realizar las actividades de cambio y no es necesario cambiar piezas completas o conexiones de tuberías.";
        $preguntas[14] = "Las herramientas tienen pocos accesorios y se utilizan pocas herramientas manuales en las actividades de cambio.";
        $preguntas[15] = "Las partes y herramientas esenciales para el cambio se encuentran estandarizadas.";
        $preguntas[16] = "Se utilizan dispositivos de sujeción para mantener objetos fijos en un sitio con un esfuerzo mínimo.";
        $preguntas[17] = "Existen universalidad en las herramientas, herrajes y piezas utilizadas en los procesos.";
        $preguntas[18] = "Los equipos son tolerantes a la fabricación de modelos respecto a sus dimensiones, resistencia, peso, etc.";
        $preguntas[19] = "Las piezas defectuosas son identificadas y separadas.";
        $preguntas[20] = "Se utilizan sistemas a prueba y error (poka-yoke), para evitar errores y garantizar la calidad y la seguridad en las actividades de cambios rápidos.";
        $preguntas[21] = "Las configuraciones productivas como: talleres, centros de trabajo, líneas de producción, fabricación modular, fabricación continua, etc., que maneja la empresa tienen un efecto sobre los tiempos de cambios rápidos.";
        $preguntas[22] = "Existen mecanismos y/o controles para lograr y mantener la precisión de las piezas de cambio y garantizar la calidad del producto.";
        $preguntas[23] = "Con una revisión visual se puede saber si los materiales, herramientas, etc., están presentes para llevar a cabo el cambio rápido ya que son Identificación con facilidad por color, grabado, acabado, etc.";
        $preguntas[24] = "Las tareas son independientes, por lo que hace posible el trabajo de manera simultánea entre operadores para agilizar el cambio.";
        $preguntas[25] = "La falta de mantenimiento en los equipos afecta al buen desempeño de los cambios rápidos.";

        return view('procesosEncuesta', compact('preguntas', 'respuestas', 'i'));
    }

    public function saveForm(Request $request){
        $r= $request->all();
        $per= User::find(Auth::id())->proceso;
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
