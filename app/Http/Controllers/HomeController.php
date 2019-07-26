<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\aCambioEncuestaRes;
use App\personaEncuestaRes;
use App\practicaEncuestaRes;
use App\procesoEncuestaRes;
use App\productoEncuestaRes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aCambio   = aCambioEncuestaRes::where('owner_id', Auth::id())->select('answered')->get(); //-
        $persona   = personaEncuestaRes::where('owner_id', Auth::id())->select('answered')->get(); //-
        $practica  = practicaEncuestaRes::where('owner_id', Auth::id())->select('answered')->get();
        $proceso   = procesoEncuestaRes::where('owner_id', Auth::id())->select('answered')->get();
        $producto  = productoEncuestaRes::where('owner_id', Auth::id())->select('answered')->get();


        $disp= [];

        if($aCambio[0]->answered == 0){
            $aCambio[0]->nombre= 'Act. de Cambio';
            $aCambio[0]->ruta= 'acambio.index';
            array_push($disp, $aCambio[0]);
        }

        if($persona[0]->answered == 0){
            $persona[0]->nombre= 'Personas';
            $persona[0]->ruta= 'personas.index';
            array_push($disp, $persona[0]);
        }

        if($practica[0]->answered == 0){
            $practica[0]->nombre= 'Practica';
            $practica[0]->ruta= 'practica.index';
            array_push($disp, $practica[0]);
        }

        if($proceso[0]->answered == 0){
            $proceso[0]->nombre= 'Procesos';
            $proceso[0]->ruta= 'procesos.index';
            array_push($disp, $proceso[0]);
        }

        if($producto[0]->answered == 0){
            $producto[0]->nombre= 'Producto';
            $producto[0]->ruta= 'producto.index';
            array_push($disp, $producto[0]);
        }

        return view('empleadoIndex', compact('persona', 'disp'));
    }
}
