<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Familia;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Familia::get();
        return view('adm.familia.index', [
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
        return view('adm.familia.create', [
            'category_id' => request()->category_id
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
            $item = Familia::find($id);
        } else {
            $item = new Familia;
        }
        $item->texto1 = $request->texto1;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/productos/familia');
        }
        $item->save();
        return redirect()->route('adm.familia')->with('success', 'Se añadio una <strong>Familia</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.familia.edit', [
            'element' => Familia::find($id),
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
        Familia::find($id)->delete();
        return redirect()->route('adm.familia')->with('success', 'Se ha eliminado un <strong>Articulo</strong> con exitó.');
    }
    public function trash()
    {
        $data = Familia::onlyTrashed()->get();
        return view('adm.familia.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Familia::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.familia.trash')->with('success', 'Se ha restaurado un <strong>Articulo</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Familia::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.familia.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Articulo</strong> con exitó.');
    }
}