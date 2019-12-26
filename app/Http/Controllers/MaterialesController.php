<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Materiales;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Materiales::get();
        return view('adm.materiales.index', [
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
        return view('adm.materiales.create', [
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
            $item = Materiales::find($id);
        } else {
            $item = new Materiales;
        }
        $item->texto1 = $request->texto1;
        $item->texto2 = $request->texto2;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/materiales/');
        }
        $item->texto3 = $request->texto3;
        $item->save();
        return redirect()->route('adm.materiales')->with('success', 'Se añadio un <strong>Material</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.materiales.edit', [
            'element' => Materiales::find($id),
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
        Materiales::find($id)->delete();
        return redirect()->route('adm.materiales')->with('success', 'Se ha eliminado un <strong>Material</strong> con exitó.');
    }
    public function trash()
    {
        $data = Materiales::onlyTrashed()->get();
        return view('adm.materiales.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Materiales::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.materiales.trash')->with('success', 'Se ha restaurado un <strong>Material</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Banner::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.materiales.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Material</strong> con exitó.');
    }
}