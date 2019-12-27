<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Producto;
use App\Familia;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Producto::get();
        return view('adm.producto.index', [
            'data'     => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.producto.create', [
            'category_id' => request()->category_id,
            'familias' => Familia::get(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request, $id = false)
    {
        if($id){
            $item = Producto::find($id);
        } else {
            $item = new Producto;
        }
        $item->texto1 = $request->texto1;
        $item->idfamilia = $request->idfamilia;
        $item->texto2 = $request->texto2;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/productos/producto');
        }
        $item->save();
        return redirect()->route('adm.producto')->with('success', 'Se añadio una <strong>Producto</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.producto.edit', [
            'element' => Producto::find($id),
            'familias' => Familia::get()
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
        Producto::find($id)->delete();
        return redirect()->route('adm.producto')->with('success', 'Se ha eliminado un <strong>Articulo</strong> con exitó.');
    }
    public function trash()
    {
        $data = Producto::onlyTrashed()->get();
        return view('adm.producto.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Producto::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.producto.trash')->with('success', 'Se ha restaurado un <strong>Articulo</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Producto::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.producto.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Articulo</strong> con exitó.');
    }
}