<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user;
use App\Pais;
use APP\proforma;
use App\maquinaria;
use App\proveedore;
use App\producto;
use App\materiaPrima;
use DB;



class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pdf.listado_reportes");
    }


      public function crearPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }

    public function crearPDF2($datosFactura,$datosDetalle,$vistaurl,$tipo)
    {

        $factura = $datosFactura;
        $detallefactura = $datosDetalle;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('factura','detallefactura', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    public function crear_reporte_producto($tipo){

     $vistaurl="AdminTaller.Pdf.reporte_por_productos";
     $Productos=producto::all();
     
     return $this->crearPDF($Productos, $vistaurl,$tipo);
    }

     public function crear_reporte_facturas_ventas($tipo){
     
     $vistaurl="AdminTaller.Pdf.reporte_por_factura_venta";
    $idfactu="";
    $idFactura = DB::select("select max(id) as idfac from factura_ventas");
        foreach ($idFactura as $idfa ) {
            $idfactu=$idfa->idfac;
        }
     $factura = DB::select("select concat(p.nombre,' ',p.apellidoPaterno)as cliente,f.fecha,f.subtotal,f.iva12,f.descuento,f.iva0,f.totalPagar FROM factura_ventas f,clientes c , personas p where f.id=$idfactu and f.idCliente = c.id and c.cedula = p.cedula");
     $detalle = DB::select("select d.cantidad, p.producto, d.precioUnitario , d.subtotal FROM detalle_facturas_productos d, productos p where d.idFactura=$idfactu and d.idProducto=p.id "); 
     
      return $this->crearPDF2($factura,$detalle, $vistaurl,$tipo);
    }

    public function crear_reporte_Proforma($tipo){
     
     $vistaurl="AdminTaller.Pdf.reporte_por_Proforma";
    $idfactu="";
    $idFactura = DB::select("select max(id) as idfac from proformas");
        foreach ($idFactura as $idfa ) {
            $idfactu=$idfa->idfac;
        }
     $factura = DB::select("select concat(p.nombre,' ',p.apellidoPaterno)as cliente,f.fecha,f.subtotal,f.iva12,f.descuento,f.iva0,f.totalPagar FROM proformas f,clientes c , personas p where f.id=$idfactu and f.idCliente = c.id and c.cedula = p.cedula");
     $detalle = DB::select("select d.cantidad, p.producto, d.precioUnitario , d.subtotal FROM detalle_proformas d, productos p where d.idFactura=$idfactu and d.idProducto=p.id "); 
     
      return $this->crearPDF2($factura,$detalle, $vistaurl,$tipo);
    }


     public function crear_reporte_Estado_Proforma($tipo){

    $vistaurl="AdminTaller.Pdf.reporte_por_Proforma";
    $idfactu="";
    $idFactura = DB::select("select max(id) as idfac from proformas");
        foreach ($idFactura as $idfa ) {
            $idfactu=$idfa->idfac;

    $proformas=proforma::All();
        }
     $factura = DB::select("select concat(p.nombre,' ',p.apellidoPaterno)as cliente,f.fecha,f.subtotal,f.iva12,f.descuento,f.iva0,f.totalPagar FROM proformas f,clientes c , personas p where f.id=$idfactu and f.idCliente = c.id and c.cedula = p.cedula");
           return $this->crearPDF2($factura,$detalle, $vistaurl,$tipo);
    }


    public function crear_reporte_maquinarias($tipo){

     $vistaurl="AdminTaller.Pdf.reporte_por_maquinaria";
     $maquinarias=maquinaria::all();
     
     return $this->crearPDF($maquinarias, $vistaurl,$tipo);
    }

    public function crear_reporte_proveedor($tipo){

     $vistaurl="AdminTaller.Pdf.reporte_por_proveedores";
     $proveedores=proveedore::all();
     
     return $this->crearPDF($proveedores, $vistaurl,$tipo);
    }

    public function crear_reporte_materiaPrimas($tipo){

     $vistaurl="AdminTaller.Pdf.reporte_por_materia";
     $materiaPrima=materiaPrima::all();
     
     return $this->crearPDF($materiaPrima, $vistaurl,$tipo);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
