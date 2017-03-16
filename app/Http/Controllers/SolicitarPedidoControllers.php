<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use App\SolicitudPedido;
use App\materiaPrima;
use App\detalleMaterialProducto;
use App\Http\Requests;
use DB;
use Auth;
class SolicitarPedidoControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Empleados =DB::select("select personas.nombre,empleados.id from empleados,personas where personas.cedula=empleados.cedula ");
         $Materiales=materiaPrima::All();
         $Productos=producto::All();
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.Pedidos.CrearPedidos',compact('Productos','Materiales','tipoUsuario','Empleados'));
    }
    
    public function search_materia($id){
        $Materiales = DB::select("select unidadMedida from materia_primas where id=$id");

        if($Materiales==[]){
            alert('vacio');
            return response()->json(array('sql_vacio'=>'vacio'));
        }else{
            foreach ($Materiales as $mate) {
            return response()->json(array(
                                 
                                 'unidadMedida' =>$mate->unidadMedida));
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
         $Materiales=materiaPrima::All();
         $Productos=producto::All();
        return view('AdminTaller.Pedidos.CrearPedidos',compact('Productos','Materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         SolicitudPedido::create([
            'fechaPedido'=>$request->input('fechaPedido'),
            'fechaEntrega'=>$request->input('fechaEntrega'),
            'elaboradoPor'=>$request->input('elaboradoPor'),
            'encargadoBodega'=>$request->input('autorizadoPor'),
            'estado'=>0,
            'idEmpleado'=>$request->input('encargadoBodega'),
            ]);

          return response()->json(array('registro'=>'true'));
    }

    public function addDetalle(Request $request){
    $idsol="";
    $idSolicitud = DB::select("select max(id) as idSolicit from solicitud_pedidos");
        foreach ($idSolicitud as $idsoli ) {
            $idsol=$idsoli->idSolicit;
        }

        detalleMaterialProducto::create([
            'idMaterial'=>$request['idmaterial'],
            'idSolicitud'=>$idsol,
            'cantidad'=>$request['cantidad'],
            'unidadMedida'=>$request['unidadMedida'],
           
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
