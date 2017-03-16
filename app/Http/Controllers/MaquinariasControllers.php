<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\maquinaria;
use App\Http\Requests;
use DB;
use Auth;

class MaquinariasControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empleados = DB::select("select empleados.id,personas.nombre,personas.apellidoPaterno,personas.apellidoMaterno,empleados.foto,empleados.cedula,empleados.salario,empleados.fechaContratacion from empleados,personas where personas.cedula=empleados.cedula");
       $Maquinarias=maquinaria::All();
       $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
       return view('AdminTaller.Maquinaria.AdministrarMaquinaria',compact('Maquinarias','tipoUsuario','empleados'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $empleados = DB::select("select empleados.id,personas.nombre,personas.apellidoPaterno,personas.apellidoMaterno,empleados.foto,empleados.cedula,empleados.salario,empleados.fechaContratacion from empleados,personas where personas.cedula=empleados.cedula");
        $Maquinarias = maquinaria::All();
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
       return view('AdminTaller.Maquinaria.CrearMaquinaria',compact('Maquinarias','tipoUsuario','empleados'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            maquinaria::create([
            'maquina'=>$request->input('maquina'),
            'marca'=>$request->input('marca'),
            'modelo'=>$request->input('modelo'),
            'stock'=>$request->input('stock'),
            'precio'=>$request->input('precio'),  
            'fechaIngreso'=>$request->input('fechaIngreso'),
            'fechaDeterioro'=>$request->input('fechaDeteriorio'),
            'idEmpleado'=>$request->input('idEmpleado'),
            ]);
            return response()->json(array('registro'=>'true'));
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
    $Maquinarias = \App\maquinaria::find($id);
    return response()->json($Maquinarias->toArray());
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
        $Maquinarias = \App\maquinaria::find($id);
        $Maquinarias->fill($request->all());
        $Maquinarias->save();
        return response()->json([
            "sms"=>"ok" 
            ]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Maquinarias = maquinaria::find($id);
        $Maquinarias = $Maquinarias->delete();
        return response()->json([
            "sms"=>"ok" 
            ]);
    }
}
