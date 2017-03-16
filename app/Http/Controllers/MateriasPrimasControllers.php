<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\materiaPrima;
use App\categoriaProducto;
use App\producto;
use App\Http\Requests;
use DB;
use Auth;

class MateriasPrimasControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Proveedor = \App\proveedore::All();
        $MateriasPrimas = \App\materiaPrima::All();
        $Productos = \App\producto::All();
         $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.MateriasPrimas.AdministrarMateriaPrima', compact('MateriasPrimas','Productos','Proveedor','tipoUsuario'));

        }
      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $MateriasPrimas = materiaPrima::All();
        $Productos = \App\producto::All();
        $Proveedor = \App\proveedore::All();
        $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                        and users.id=".Auth::user()->id."");
        return view('AdminTaller.MateriasPrimas.CrearMateriasPrimas',compact('MateriasPrimas','Productos','Proveedor','tipoUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        materiaPrima::create([
            'material'=>$request->input('material'),      
            'precio'=>$request->input('precio'),
            'stock'=>$request->input('stock'),
            'cantidad'=>$request->input('cantidad'),
            'cantidad_medida'=>$request->input('cantidad_medida'),
            'unidadMedida'=>$request->input('unidadMedida'),
            'descripcion'=>$request->input('descripcion'),
            ]);
       return response()->json(array('registro'=>'true'));
    }

     public function Devuluciones(){
     $MateriasPrimas = materiaPrima::All();
     $Productos = \App\producto::All();
     $Proveedor = \App\proveedore::All();
     $tipoUsuario =DB::select("select tipoUser from categoria_users,users where categoria_users.id=users.idCategoria
                                       and users.id=".Auth::user()->id."");
     return view('AdminTaller.MateriasPrimas.devoluciones',compact('MateriasPrimas','Productos','Proveedor','tipoUsuario'));
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
         $MateriasPrimas = \App\materiaPrima::find($id);
         return response()->json($MateriasPrimas->toArray());
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
        $MateriasPrimas = materiaPrima::find($id);
        $MateriasPrimas->fill($request->all());
        $MateriasPrimas->save();
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
        $MateriasPrimas = materiaPrima::find($id);
        $MateriasPrimas = $MateriasPrimas->delete();
        return response()->json([
            "sms"=>"ok" 
            ]);
    }
}
