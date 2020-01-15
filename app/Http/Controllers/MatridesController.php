<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Matrides;

class MatridesController extends Controller
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
        $textos = Matrides::firstOrNew([]);
        return view('adm.matrides.index', [
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
        return view('adm.matrides.create', [
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
        $item = Matrides::firstOrNew([]);
        $item->texto1 = $request->texto1;
        $item->texto2 = $request->texto2;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/home/matriceria');
        }
        $item->save();
        return redirect()->route('adm.matrides')->with('success', 'Se actualizaron los <strong>Textos</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.matrides.edit', [
            'element' => Matrides::find($id),
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
        Matrides::find($id)->delete();
        return redirect()->route('adm.matrides')->with('success', 'Se han eliminado la <strong>Información</strong> con exitó.');
    }
    public function trash()
    {
        $data = Matrides::onlyTrashed()->get();
        return view('adm.matrides.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Matrides::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.matrides.trash')->with('success', 'Se ha restaurado la <strong>Información</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Matrides::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.matrides.edit', $new->id)->with('success', 'Se ha duplicado la <strong>Información</strong> con exitó.');
    }
}