<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Solicitudpre;

class SolicitudpreController extends Controller
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
        $textos = Solicitudpre::firstOrNew([]);
        return view('adm.solicitudpre.index', [
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
        return view('adm.solicitudpre.create', [
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
        $item = Solicitudpre::firstOrNew([]);
        $item->texto1 = $request->texto1;
        $item->texto2 = $request->texto2;
        if($request->imagen1 != null){
             $item->imagen1 = $request->imagen1->store('public/imagenes/matriceria/presupuesto');
        }
        if($request->imagen2 != null){
             $item->imagen2 = $request->imagen2->store('public/imagenes/matriceria/presupuesto');
        }
        $item->save();
        return redirect()->route('adm.solicitudpre')->with('success', 'Se actualizaro la <strong>Información</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.solicitudpre.edit', [
            'element' => Solicitudpre::find($id),
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
        Solicitudpre::find($id)->delete();
        return redirect()->route('adm.solicitudpre')->with('success', 'Se han eliminado la <strong>Información</strong> con exitó.');
    }
    public function trash()
    {
        $data = Solicitudpre::onlyTrashed()->get();
        return view('adm.solicitudpre.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Solicitudpre::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.solicitudpre.trash')->with('success', 'Se ha restaurado la <strong>Información</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Solicitudpre::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.solicitudpre.edit', $new->id)->with('success', 'Se ha duplicado la <strong>Información</strong> con exitó.');
    }
}