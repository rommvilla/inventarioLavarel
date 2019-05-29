<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Productos::paginate(10);

        return view('inventario.index',$datos);
        //return view('inventario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosProductos=request()->all();
$camp=[

     'Nombre'    =>'required|string|max:100',
    'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'

];
$msj=["required"=>'El campo :attribute es requerido'];
$this->validate($request,$camp,$msj);

        $datosProductos=request()->except('_token');
        if ($request->hasFile('Foto')) {
            # code...
            $datosProductos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        productos::insert($datosProductos);

        //return response()->json($datosProductos);
        return redirect('inventario')->with('mensaje','Agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
    
        $produc=Productos::findOrFail($id);
        return view('inventario.edit',compact('produc'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $datosProductos=request()->except(['_token','_method']);


           if ($request->hasFile('Foto')) {
            # code...
             $produc=Productos::findOrFail($id);

             Storage::delete('public/'.$produc->Foto);

            $datosProductos['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Productos::where('id','=',$id)->update($datosProductos);

        //$produc=Productos::findOrFail($id);
        //return view('inventario.edit',compact('produc'));
        return redirect('inventario')->with('mensaje','Editado con exito');    

    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produc=Productos::findOrFail($id);

        if (Storage::delete('public/'.$produc->Foto)) {
            Productos::destroy($id);
        }
        return redirect('inventario')->with('mensaje','Eliminado con exito');  
    }
}
