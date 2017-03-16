<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SolicitudPedido;
use DB;
use Auth;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
         $pedidos = SolicitudPedido::all();

         return view('BodegaTaller.Pedidos.ListaPedidos',compact('tipoUsuario','pedidos'));

    }

    public function numProd($id){
        $idprod= DB::select('select idMaterial,cantidad from detalle_material_productos where idSolicitud='.$id);
        $estado= DB::update('update solicitud_pedidos set estado=? where id=?',[1,$id]);
        foreach ($idprod as $idp) {
            $restar_p= DB::update('update materia_primas set stock=stock-? where id=?',[$idp->cantidad,$idp->idMaterial]);
            if($restar_p==1){
            }else{
            }
        }
    }   

    public function listaEntregado(){
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
         $pedidos = DB::select("select * from solicitud_pedidos where estado = 1");

         return view('BodegaTaller.Pedidos.ListaEntregados',compact('tipoUsuario','pedidos'));
    }

    public function RestarProducto($id){
        
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
        //
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
