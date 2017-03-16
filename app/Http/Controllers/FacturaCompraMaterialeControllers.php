<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\materiaPrima;
use App\facturaCompra;
use App\detalle_factura_materia_primas;
use App\proveedore;
use DB;
use Auth;
use App\Http\Requests;

class FacturaCompraMaterialeControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Proveedores=proveedore::All();
       $Materiales=materiaPrima::All();
       $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
       $numFact =DB::select("select max(id) as id from factura_compras");
       return view('AdminTaller.Facturacion.FacturaCompra',compact('Materiales','Proveedores','tipoUsuario','numFact'));
    }

    public function search_materia($id){
        $Materiales = DB::select(" select precio,stock from materia_primas where id=$id");

        if($Materiales==[]){
            alert('vacio');
            return response()->json(array('sql_vacio'=>'vacio'));
        }else{
            foreach ($Materiales as $mate) {
            return response()->json(array(
                                 
                                 'precio' =>$mate->precio,
                                 'stock' =>$mate->stock,
                                 ));
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
        facturaCompra::create([
            'idProveedor'=>$request->input('idProveedor'),
            'fecha'=>$request->input('fecha'),
            'subtotal'=>$request->input('Subtotal2'),
            'iva0'=>$request->input('iva0'),
            'iva12'=>$request->input('iva12'),
            'descuento'=>$request->input('descuento'),
            'totalPagar'=>$request->input('totalPagar'),
            'repartidor'=>$request->input('repartidor'),
            'descripcionCarro'=>$request->input('descripcionCarro'),
            ]);

          return response()->json(array('registro'=>'true'));
    }

    public function addDetalle(Request $request){
    $idfactu="";
    $idFactura = DB::select("select max(id) as idfac from factura_compras");
        foreach ($idFactura as $idfa ) {
            $idfactu=$idfa->idfac;
        }

        detalle_factura_materia_primas::create([
           
            'idFactura'=>$idfactu,
            'cantidad'=>$request['cantidad'],
            'idMaterial'=>$request['material'],
            'precioUnitario'=>$request['precio'],
            'subtotal'=>$request['subtotal'],
         ]);

          return response()->json(array('registro'=>'true'));
    }


    public function actualizarStock(Request $request,$id){
            $stock1=0;
            $stock_bd=DB::select("select stock from materia_primas where id=$id");
            foreach ($stock_bd as $stock) {
            $stock1=$stock->stock;
            }
            $cantidad=($stock1+(int)$request['cantidad']);
            $Material=DB::update('update materia_primas set stock =? where id=?',[$cantidad,$id]);
             

            if($Material==1){
                return response()->json(array('Actualizado'=>'true'));
            }else{
                return response()->json(array('Actualizado'=>'false'));
            }



    }

    public function Search_Material($id){
         $Productos = DB::select("select precio,stock from materia_primas where id=$id");
           
            if($Productos==[]){
                    
                    return response()->json(array('sql_vacio'=>'vacio'));
             }else{
            foreach ($Productos as $BusqPro) {
            return response()->json(array(
                    'precio' =>$BusqPro->precio,
                    'stock' =>$BusqPro->stock));
            }
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
