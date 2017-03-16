<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\rolPago;
use DB;
use Auth;
class RolpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {    
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.Rol_pagos.rolPago',compact('tipoUsuario'));
    }

    public function search_empleado($cedula){
        $empleado = DB::select("select personas.nombre,personas.apellidoPaterno, empleados.salario, empleados.cargo ,empleados.foto from personas,empleados where personas.cedula=empleados.cedula and empleados.cedula=$cedula");

        if($empleado==[]){
            return response()->json(array('sql_vacio'=>'vacio'));
        }else{
           foreach ($empleado as $emple) {
            return response()->json(array(
                                 'nombre'=>$emple->nombre,
                                 'apellidoPaterno'=>$emple->apellidoPaterno,
                                 'salario'        =>$emple->salario,
                                 'cargo'          =>$emple->cargo,
                                 'foto'           =>$emple->foto));
            }
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
            rolPago::create([
            'cedula'=>$request->input('cedula2'),
            'mes'=>$request->input('meses'),
            'sueldo'=>$request->input('sueldo2'),
            'horasExtras'=>$request->input('horaEx'),
            'comisiones'=>$request->input('comisiones'),
            'aportesIees'=>$request->input('aportaciones'),
            'totalDescuento'=>$request->input('Descuento'),
            'totalSueldo'=>$request->input('sueldo3')
            ]);

            return response()->json(array('registro'=>'ok'));
            

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
