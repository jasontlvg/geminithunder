<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Empresa;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa= Empresa::first();
        $canAddDepartamento=true;
        if(is_null($empresa)){
            $canAddDepartamento=false;
        }
        $deps= Departamento::all();
        return view('departamentos', compact('deps', 'canAddDepartamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // No contemplar, usar Store Directamento
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nombre' => 'required|min:3|unique:departamentos',
            'clave' => 'required|min:3'
        ]);

        $dep= new Departamento;
        $dep->nombre= $request->get('nombre');
        $dep->clave= $request->get('clave');


        if($dep->save()){
            return redirect(route('departamentos.index'));

        }else{
            return 'Errororororor';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep= Departamento::where('id', $id)->first();
        return view('editarDepartamentos', compact('dep','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d= Departamento::find($id);
        $this->validate($request, [
            'nombre' => 'required|min:3|unique:departamentos,nombre,'.$d->id,
            'clave' => 'required|min:3'
        ]);
        $uD= Departamento::where('id', $id)->first();
        $uD->nombre= $request->nombre;
        $uD->clave= $request->clave;
        $uD->save();
        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep= Departamento::where('id', $id)->delete();
        $deps= Departamento::all();
        $depEliminado= true;
        return view('departamentos', compact('depEliminado', 'deps'));
    }
}
