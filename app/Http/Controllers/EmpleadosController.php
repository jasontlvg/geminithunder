<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Departamento;
use App\User;
use App\personaEncuestaRes;
use App\practicaEncuestaRes;
use App\procesoEncuestaRes;
use App\productoEncuestaRes;
use App\aCambioEncuestaRes;

class EmpleadosController extends Controller{
    public function index()
    {
        $empleados= User::all();
        $departamentosExists= true;
        $departamentos= Departamento::select('id','nombre')->get();

        if($departamentos->isEmpty()){
            $departamentosExists= false;
        }
        return view('empleados', compact('departamentos', 'empleados', 'departamentosExists'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'nombre'=>'required',
            'apaterno'=>'required',
            'amaterno'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'email'=>'required',
            'cargo'=>'required',
            'jornada'=>'required',
            'escolaridad'=>'required',
            'departamento'=>'required'
        ]);

        $e= new User;
        $e->nombre=$request->get('nombre');
        $e->apaterno=$request->get('apaterno');
        $e->amaterno=$request->get('amaterno');
        $e->edad=$request->get('edad');
        $e->sexo=$request->get('sexo');
        $e->email=$request->get('email');
        $e->cargo=$request->get('cargo');
        $e->jornada=$request->get('jornada');
        $e->escolaridad=$request->get('escolaridad');
        $e->departamento_id=$request->get('departamento');
        $d= Departamento::find($request->get('departamento'));
        $e->password=Hash::make($d->clave);
        $e->save();

        $persona= new personaEncuestaRes;
        $persona->owner_id= $e->id;
        $persona->save();

        $practica= new practicaEncuestaRes;
        $practica->owner_id= $e->id;
        $practica->save();

        $proceso= new procesoEncuestaRes;
        $proceso->owner_id= $e->id;
        $proceso->save();

        $producto= new productoEncuestaRes;
        $producto->owner_id= $e->id;
        $producto->save();

        $acambio= new aCambioEncuestaRes;
        $acambio->owner_id= $e->id;
        $acambio->save();

        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado= User::find($id);
        $departamentos= Departamento::select('id','nombre')->get();
        return view('verEmpleados', compact('empleado', 'departamentos'));
    }

    public function edit($id)
    {
        $empleado= User::find($id);
        $departamentos= Departamento::select('id','nombre')->get();
        return view('editarEmpleados',compact('empleado', 'departamentos'));
    }

    public function update(Request $request, $id)
    {
        $e= User::find($id);

        $this->validate($request, [
            'nombre'=>'required',
            'apaterno'=>'required',
            'amaterno'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'email'=>'required|email|unique:users,email,'.$e->id,
            'cargo'=>'required',
            'jornada'=>'required',
            'escolaridad'=>'required',
            'departamento'=>'required'
        ]);

        $e= User::find($id);
        $e->nombre=$request->get('nombre');
        $e->apaterno=$request->get('apaterno');
        $e->amaterno=$request->get('amaterno');
        $e->edad=$request->get('edad');
        $e->sexo=$request->get('sexo');
        $e->email=$request->get('email');
        $e->cargo=$request->get('cargo');
        $e->jornada=$request->get('jornada');
        $e->escolaridad=$request->get('escolaridad');
        $e->departamento_id=$request->get('departamento');
        $d= Departamento::find($request->get('departamento'));
        $e->password=Hash::make($d->clave);
        $e->save();
        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('empleados.index'));
    }
}
