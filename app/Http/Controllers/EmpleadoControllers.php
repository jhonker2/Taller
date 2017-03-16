<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleado;
use App\persona;
use App\Http\Requests;
use Storage;
use DB;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;

class EmpleadoControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $empleados = DB::select("select empleados.id,personas.nombre,personas.apellidoPaterno,personas.apellidoMaterno,empleados.foto,empleados.cedula,empleados.salario,empleados.fechaContratacion from empleados,personas where personas.cedula=empleados.cedula");
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");

        return view('AdminTaller.Empleado.AdministrarEmpleado',compact('empleados','tipoUsuario'));
    }

    public function buscarCedula($cedula){
        $empleado=DB::select("select empleados.cedula from empleados where cedula=$cedula");
        if($empleado==[]){
            return response()->json(array('sql'=>'false'));
        }else{
            return response()->json(array('sql'=>'true'));
        }
    }
 
    public function actualizarEmpleado(Request $request, $cedula){

        $persona = DB::update('update personas set apellidoPaterno = ?, apellidoMaterno = ?, nombre= ?,sexo = ?,estadoCivil=?,direccion=?, fechaNacimiento=?,correo=?,telefono=? where cedula=?',[$request->input('apellidoPaterno'),$request->input('apellidoMaterno'),$request->input('nombre'),$request->input('genero'),$request->input('estadoCivil'),$request->input('direccion_E'),$request->input('birthdate'),$request->input('correo_E'),$request->input('telefono_E'),$cedula]);
             if($persona==1){
                $empleado=DB::update('update empleados set cargo=?,fechaContratacion=?, salario=?,estatus=?,cargaFamiliar=? where cedula=?',[$request->input('cargo_E'),$request->input('fechaContratacion_E'),$request->input('salario_E'),$request->input('estatus_E'),$request->input('cargaFamiliar_E'),$cedula]);
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
       $empleados=empleado::All();
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
       return view('AdminTaller.Empleado.CrearEmpleado',compact('empleados','tipoUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //regisstro de persona
        
        persona::create([
            'cedula'=>$request->input('cedula'),
            'apellidoPaterno'=>$request->input('apellidoPaterno'),
            'apellidoMaterno'=>$request->input('apellidoMaterno'),
            'nombre'=>$request->input('nombre'),
            'sexo'=>$request->input('genero'),
            'estadoCivil'=>$request->input('estadoCivil'),
            'direccion'=>$request->input('direccion_E'),
            'fechaNacimiento'=>$request->input('birthdate'),
            'correo'=>$request->input('correo_E'),
            'telefono'=>$request->input('telefono_E'),
            ]);

            //fin registro de persona

       
                //ingreso de empleado
            $archivo = $request->file('archivo');
            $input  = array('image' => $archivo) ;
            $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif');
            $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails()){

                 empleado::create([
            'cedula'=>$request->input('cedula'),
            'cargo'=>$request->input('cargo_E'),
            'fechaContratacion'=>$request->input('fechaContratacion_E'),
            'salario'=>$request->input('salario_E'),
            'estatus'=>$request->input('estatus_E'),
            'cargaFamiliar'=>$request->input('cargaFamiliar_E'),
            'foto'=>"fotos_empleados/user.png"
            ]);
            return response()->json(array('registro'=>'true'));
        }else {
                $nombre_original=$archivo->getClientOriginalName();
                $extension=$archivo->getClientOriginalExtension();
                $nuevo_nombre="empleadoImagen-".$nombre_original;
                $r1=Storage::disk('local')->put($nuevo_nombre,  \File::get($archivo) );
                $rutadelaimagen="fotos_empleados/".$nuevo_nombre;
                if ($r1){
             empleado::create([
            'cedula'=>$request->input('cedula'),
            'cargo'=>$request->input('cargo_E'),
            'fechaContratacion'=>$request->input('fechaContratacion_E'),
            'salario'=>$request->input('salario_E'),
            'estatus'=>$request->input('estatus_E'),
            'cargaFamiliar'=>$request->input('cargaFamiliar_E'),
            'foto'=>$rutadelaimagen
            ]);
            return response()->json(array('registro'=>'true'));
                    }else
                    {   return response()->json(array('error_imagen'=>'true')); }
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
        
         $empleado=DB::select("select * from personas,empleados where personas.cedula=empleados.cedula and empleados.cedula=$id");
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria and users.id=".Auth::user()->id."");                 

        return view('AdminTaller.Empleado.EditEmpleado',compact('empleado','tipoUsuario'));
    
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

        /*$persona->fill(array('cedula'   =>$request->input('cedula'),
                    'apellidoPaterno'   =>$request->input('apellidoPaterno'),
                    'apellidoMaterno'   =>$request->input('apellidoMaterno'),
                    'nombre'            =>$request->input('nombre'),
                    'sexo'              =>$request->input('genero'),
                    'estadoCivil'       =>$request->input('estadoCivil'),
                    'direccion'         =>$request->input('direccion_E'),
                    'fechaNacimiento'   =>$request->input('birthdate'),
                    'correo'            =>$request->input('correo_E'),
                    'telefono'          =>$request->input('telefono_E'),
            ));*/
        //$persona->save(); 


        /*$Empleado = DB::select("select * from empleados where cedula=$id");;
        $Empleado->fill([
            'cedula'=>$request->input('cedula'),
            'cargo'=>$request->input('cargo_E'),
            'fechaContratacion'=>$request->input('fechaContratacion_E'),
            'salario'=>$request->input('salario_E'),
            'estatus'=>$request->input('estatus_E'),
            'cargaFamiliar'=>$request->input('cargaFamiliar_E'),
            ]);
        $Empleado->save(); */
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
        //
    }
}
