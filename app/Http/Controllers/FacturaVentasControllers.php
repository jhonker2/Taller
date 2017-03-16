<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use App\facturaVenta;
use App\detalle_facturas_productos;

use App\Http\Requests;
use DB;
use Auth;

class FacturaVentasControllers extends Controller
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
         $numFact =DB::select("select max(id) as id from factura_compras");
         $Productos=producto::All();
         $FacturasVentas = facturaVenta::All();
         return view('AdminTaller.Facturacion.AdministracionVenta',compact('tipoUsuario','Productos','Clientes','numFact','FacturasVentas'));
    }   

    public function crearCombo(){
        $Clientes = DB::select("SELECT * FROM `personas`,clientes WHERE personas.cedula=clientes.cedula");
        return view("AdminTaller.utils.combocliente",compact('Clientes'));
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

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Clientes = DB::select("SELECT * FROM `personas`,clientes WHERE personas.cedula=clientes.cedula");
        $FacturasVentas = facturaVenta::All();
        $DetallesServicios = \App\detalleServicio::All();
        $DetallesFacturasProducto = \App\detalle_facturas_productos::All();
        $Productos=producto::All();
        $numFact =DB::select("select max(id) as id from factura_compras");
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.Facturacion.FacturaVenta',compact('FacturasVentas','DetallesServicios','numFact','DetallesFacturasProductos','tipoUsuario','Clientes','Productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       facturaVenta::create([
            'idCliente'=>$request->input('idCliente'),
            'fecha'=>date('Y-m-d'),
            'subtotal'=>$request->input('Subtotal2'),
            'iva0'=>$request->input('iva0'),
            'iva12'=>$request->input('iva12'),
            'descuento'=>$request->input('descuento'),
            'totalPagar'=>$request->input('totalPagar'),
            'tipoFactura'=>$request->input('tipoFactura'),
            'estado_venta'=>0,
            ]);

          return response()->json(array('registro'=>'true'));
    }

    public function addDetalle(Request $request){
    $idfactu="";
    $idFactura = DB::select("select max(id) as idfac from factura_ventas");
        foreach ($idFactura as $idfa ) {
            $idfactu=$idfa->idfac;
        }

        detalle_facturas_productos::create([
            'idFactura'=>$idfactu,
            'cantidad'=>$request['cantidad'],
            'idProducto'=>$request['producto'],
            'precioUnitario'=>$request['precio'],
            'subtotal'=>$request['subtotal'],
         ]);

          return response()->json(array('registro'=>'true'));
    }

    public function actualizarStock(Request $request,$id){
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



    }

    public function AnularFactura($id){
        $idFact= DB::select('select estado_venta from factura_ventas where id='.$id);
        $estado= DB::update('update factura_ventas set estado_venta=? where id=?',[0,$id]);
        }

        public function RealizarFactura($id){
        $idFact= DB::select('select estado_venta from factura_ventas where id='.$id);
        $estado= DB::update('update factura_ventas set estado_venta=? where id=?',[1,$id]);
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
