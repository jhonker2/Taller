<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use App\facturaVenta;
use App\detalle_facturas_productos;
use App\detalleFacturaProducto;
use App\detalleServicio;
use App\Http\Requests;
use DB;
use App\proforma;
use App\Detalle_proformas;
use Auth;

class ProformaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $Clientes = DB::select("SELECT * FROM `personas`,clientes WHERE personas.cedula=clientes.cedula");
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
         $numFact =DB::select("select max(id) as id from proformas");
         $proformas=proforma::All();
         return view('AdminTaller.Facturacion.AdministracionProforma',compact('tipoUsuario','proformas','Clientes','numFact'));
    }
    public function create()
    {
        $Clientes = DB::select("SELECT * FROM `personas`,clientes WHERE personas.cedula=clientes.cedula");
        $FacturasProforma = proforma::All();
        $DetallesFacturasProformas = \App\Detalle_proformas::All();
        $Productos=producto::All();
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.Facturacion.Proforma',compact('FacturasProforma','DetallesFacturasProformas','Productos','tipoUsuario','Clientes'));
    }   


    public function Search_Producto($id){

            $Productos = DB::select("select precio,stock from productos where id=$id");
           
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

      public function AnularProforma($id){
        
        $estado= DB::update('update proformas set estado_proforma=? where id=?',[0,$id]);
        }

        public function RealizarProforma($id){
        
        $estado= DB::update('update proformas set estado_proforma=? where id=?',[1,$id]);
        }  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       proforma::create([
            'idCliente'=>$request->input('idCliente'),
            'fecha'=>date('Y-m-d'),
            'subtotal'=>$request->input('Subtotal2'),
            'iva0'=>$request->input('iva0'),
            'iva12'=>$request->input('iva12'),
            'descuento'=>$request->input('descuento'),
            'totalPagar'=>$request->input('totalPagar'),
            'estado_proforma'=>0,
            'tipoFactura'=>$request->input('tipoFactura'),
            ]);

          return response()->json(array('registro'=>'true'));
    }

    public function addDetalle(Request $request){
    $idfactu="";
    $idFactura = DB::select("select max(id) as idfac from proformas");
        foreach ($idFactura as $idfa ) {
            $idfactu=$idfa->idfac;
        }

        Detalle_proformas::create([
            'idFactura'=>$idfactu,
            'cantidad'=>$request['cantidad'],
            'idProducto'=>$request['producto'],
            'precioUnitario'=>$request['precio'],
            'subtotal'=>$request['subtotal'],
         ]);

          return response()->json(array('registro'=>'true'));
    }

    /**public function actualizarStock(Request $request,$id){
            $stock1=0;
            $stock_bd=DB::select("select stock from productos where id=$id");
            foreach ($stock_bd as $stock) {
            $stock1=$stock->stock;
            }
            $cantidad=($stock1-(int)$request['cantidad']);
            $Material=DB::update('update productos set stock =? where id=?',[$cantidad,$id]);
             

            if($Material==1){
                return response()->json(array('Actualizado'=>'true'));
            }else{
                return response()->json(array('Actualizado'=>'false'));
            }


    }*/
    

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
