<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;
use App\persona;
use App\User;
use Storage;
use DB;
use Hash;
use Auth;
use App\Http\Requests;


class ClientesControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         $Clientes = DB::select("select c.cedula,concat(p.apellidoPaterno,' ', p.apellidoMaterno,' ', p.nombre) as cliente ,p.sexo,p.estadoCivil,p.direccion,p.correo,p.telefono from personas p, clientes c where p.cedula=c.cedula;");
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
         return view('AdminTaller.Clientes.AdministrarCliente',compact('Clientes','tipoUsuario'));   
    }
    public function cedulaCliente($cedula)
    {
        $empleado =DB::select("select cedula from empleados where cedula=$cedula");

        if($empleado==[]){
            $cliente =DB::select("SELECT cedula FROM clientes WHERE cedula=$cedula");
            if($cliente==[]){
                return response()->json(array('sql'=>'false'));
            }else{
                return response()->json(array('sql'=>'true'));
            }    
        }else{
                return response()->json(array('sql'=>'Empleado'));
        }
        
    }

    public function actualizarCliente(Request $request, $cedula){
         $persona = DB::update('update personas set apellidoPaterno = ?, apellidoMaterno = ?, nombre= ?,sexo = ?,estadoCivil=?,direccion=?, fechaNacimiento=?,correo=?,telefono=? where cedula=?',[$request->input('apellidoPaterno'),$request->input('apellidoMaterno'),$request->input('nombre'),$request->input('genero'),$request->input('estadoCivil'),$request->input('direccion'),$request->input('birthdate'),$request->input('correo'),$request->input('telefono'),$cedula]);
             if($persona==1){
                return response()->json(["sms"=>"ok" ]);
             }else{
                return response()->json(["sms"=>"error" ]);
             }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $Clientes = \App\cliente::All();
      //$CategoriaUsuarios = \App\categoriaUser::All();
       $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
      return view('AdminTaller.Clientes.CrearClientes', compact('Clientes','tipoUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
                         persona::create([
                        'cedula'=>$request->input('cedula'),
                        'apellidoPaterno'=>$request->input('apellidoPaterno'),
                        'apellidoMaterno'=>$request->input('apellidoMaterno'),
                        'nombre'=>$request->input('nombre'),
                        'sexo'=>$request->input('genero'),
                        'estadoCivil'=>$request->input('estadoCivil'),      
                        'direccion'=>$request->input('direccion'),           
                        'fechaNacimiento'=>$request->input('birthdate'), 
                        'correo'=>$request->input('correo'),           
                        'telefono'=>$request->input('telefono')           
                     ]);

                         cliente::create([
                        'cedula'=>$request->input('cedula')       
                         
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
    public function edit($cedula)
    {
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
         $cliente=DB::select("select *from personas,clientes where personas.cedula=clientes.cedula
                              and clientes.cedula=$cedula");
        return view('AdminTaller.Clientes.EditCliente',compact('cliente','tipoUsuario'));
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
