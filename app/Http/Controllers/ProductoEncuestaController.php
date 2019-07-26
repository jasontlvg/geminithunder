<?php

namespace App\Http\Controllers;

use App\Respuesta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoEncuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $respuestas= Respuesta::select('id','respuesta')->get();
        $i=0;

        $preguntas[0] = "Se cuenta claramente con las especificaciones del producto (planos, dibujos) lo cual facilita los cambios de modelo.";
        $preguntas[1] = "Las especificaciones de calidad del producto afectan en los tiempos de los cambios rápidos.";
        $preguntas[2] = "El volumen unitario el producto (tamaño), tiene un efecto en los cambios rápidos.";
        $preguntas[3] = "La variedad de modelos de productos tiene un efecto en los tiempos de cambios rápidos.";
        $preguntas[4] = "El tamaño del lote impacta a los tiempos de cambios rápidos.";
        $preguntas[5] = "Las características del producto (componentes, dimensiones, forma, funciones, parámetros) impactan en los tiempos de cambios rapados.";
        $preguntas[6] = "Las diferentes configuraciones de los productos tienen un efecto en los tiempos de cambios rápidos.";
        return view('productoEncuesta', compact('preguntas', 'respuestas', 'i'));
    }

    public function saveForm(Request $request){
        $r= $request->all();
        $per= User::find(Auth::id())->producto;
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
