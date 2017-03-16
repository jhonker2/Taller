<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use DB;
use App\Http\Requests;
use Auth;

class ProductosControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index()
    {
        $Productos = \App\producto::All();
        $CategoriaProductos = \App\categoriaProducto::All();
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.Productos.AdministrarProductos', compact('Productos','CategoriaProductos','tipoUsuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $Productos = \App\producto::All();
         $Proveedores = \App\proveedore::All();
         $CategoriaProductos = \App\categoriaProducto::All();
          $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
         return view('AdminTaller.Productos.CrearProductos', compact('Productos','Proveedores','CategoriaProductos','tipoUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if($request->ajax()){
    try{
            \App\producto::create([
            'idCategoria'=>$request->IdProducto,
            'producto'=>$request->Producto,
            'stock'=>$request->Stock,
            'medida'=>$request->Medida,
            'precio'=>$request->Precio,
            'descripcion'=>$request->Descripcion,
            ]);
        return response()->json(array('sms'=>'Registro Correcto'));
        }catch(Excetion $e){
        return response()->json(array('sms'=>'Error al registrar'));
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
     $Productos = producto::find($id);
      return response()->json($Productos->toArray());
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
        $Productos = producto::find($id);
        $Productos->fill($request->all());
        $Productos->save();
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
        $Productos = producto::find($id);
        $Productos = $Productos->delete();
        return response()->json([
            "sms"=>"ok" 
            ]);
    }
}
