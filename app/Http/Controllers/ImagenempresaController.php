<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Imagenempresa;

class ImagenempresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Imagenempresa::firstOrNew([]);
        return view('adm.imagenempresa.index', [
            'textos' => $textos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.imagenempresa.create', [
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
        $item = Imagenempresa::firstOrNew([]);
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/empresa/imagen');
        }
        $item->save();
        return redirect()->route('adm.imagenempresa')->with('success', 'Se actualizo la <strong>Imagen</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.imagenempresa.edit', [
            'element' => Imagenempresa::find($id),
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
        Imagenempresa::find($id)->delete();
        return redirect()->route('adm.imagenempresa')->with('success', 'Se han eliminado la <strong>Información</strong> con exitó.');
    }
    public function trash()
    {
        $data = Imagenempresa::onlyTrashed()->get();
        return view('adm.imagenempresa.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Imagenempresa::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.imagenempresa.trash')->with('success', 'Se ha restaurado la <strong>Información</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Imagenempresa::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.imagenempresa.edit', $new->id)->with('success', 'Se ha duplicado la <strong>Información</strong> con exitó.');
    }
}