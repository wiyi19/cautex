<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Infoempresa;

class InfoempresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Infoempresa::firstOrNew([]);
        //print_r($textos);
        return view('adm.infoempresa.index', [
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
        return view('adm.infoempresa.create', [
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
        $item = Infoempresa::firstOrNew([]);
        $item->texto1 = $request->texto1;
        if($request->imagen1 != null){
             $item->imagen1 = $request->imagen1->store('public/imagenes/empresa');
        }
        $item->texto2 = $request->texto2;
        $item->texto3 = $request->texto3;
        $item->texto4 = $request->texto4;
        $item->texto5 = $request->texto5;
        $item->texto6 = $request->texto6;
        $item->texto7 = $request->texto7;
        if($request->imagen2 != null){
             $item->imagen2 = $request->imagen2->store('public/imagenes/empresa');
        }
        $item->save();
        return redirect()->route('adm.infoempresa')->with('success', 'Se actualizo la<strong>Información</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.infoempresa.edit', [
            'element' => Infoempresa::find($id),
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
        Infoempresa::find($id)->delete();
        return redirect()->route('adm.infoempresa')->with('success', 'Se ha eliminado la <strong>Información</strong> con exitó.');
    }
    public function trash()
    {
        $data = Infoempresa::onlyTrashed()->get();
        return view('adm.infoempresa.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Infoempresa::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.infoempresa.trash')->with('success', 'Se ha restaurado la <strong>Información</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Infoempresa::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.infoempresa.edit', $new->id)->with('success', 'Se ha duplicado la <strong>Información</strong> con exitó.');
    }
}