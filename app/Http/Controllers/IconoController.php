<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Icono;

class IconoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Icono::get();
        return view('adm.icono.index', [
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
        return view('adm.icono.create', [
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
            $item = Icono::find($id);
        } else {
            $item = new Icono;
        }
        $item->texto1 = $request->texto1;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/matriceria/icono');
        }
        $item->save();
        return redirect()->route('adm.icono')->with('success', 'Se añadio un <strong>Icono</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.icono.edit', [
            'element' => Icono::find($id),
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
        Icono::find($id)->delete();
        return redirect()->route('adm.icono')->with('success', 'Se ha eliminado un <strong>Icono</strong> con exitó.');
    }
    public function trash()
    {
        $data = Icono::onlyTrashed()->get();
        return view('adm.icono.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Icono::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.icono.trash')->with('success', 'Se ha restaurado un <strong>Icono</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Icono::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.icono.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Icono</strong> con exitó.');
    }
}