<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoriaProducto;
use App\Http\Requests;
use DB;
use Auth;

class CategoriaProductosControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
      $categoriaProducto = \App\categoriaProducto::All();
      return view('AdminTaller.CategoriaProductos.CrearCategoriaProducto',compact('categoriaProducto','tipoUsuario')); 
    }
    public function save(Request $request){

        try{
        $CategoriaProducto = new categoriaProducto;
        $CategoriaProducto ->categoriaProducto=$request->tipoProducto;
        $CategoriaProducto ->save();
        return response()->json(array('sms'=>'true'));
        }catch(Excetion $e){
        return response()->json(array('err'=>'false'));

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriaProducto = \App\categoriaProducto::All();
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.CategoriaProductos.CrearCategoriaProducto', compact('categoriaProducto','tipoUsuario'));
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
    
            \App\categoriaProducto::create([
            'tipoProducto'=>$request->tipoProducto,
            ]);
        return response()->json(array('sms'=>'Registro Correcto'));
        
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
    $categoriaProducto = categoriaProducto::find($id);
      return response()->json($categoriaProducto->toArray());
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
        $CategoriaProductos = categoriaProducto::find($id);
        $CategoriaProductos->fill($request->all());
        $CategoriaProductos->save();
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
        $CategoriaProductos = categoriaProducto::find($id);
        $CategoriaProductos = $CategoriaProductos->delete();
        return response()->json([
            "sms"=>"ok" 
            ]);
    }
}
