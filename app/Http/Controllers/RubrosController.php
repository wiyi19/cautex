<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Rubros;
use App\Rubrost;

class RubrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Rubros::firstOrNew([]);
        $data  = Rubrost::get();
        return view('adm.rubros.index', [
            'textos' => $textos,
            'data'  => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.rubros.create', [
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
            $item = rubrost::find($id);
        } else {
            $item = new rubrost;
        }
        $item->texto1 = $request->texto1;
        $item->orden = $request->orden;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/home/rubros');
        }
        $item->save();
        return redirect()->route('adm.rubros')->with('success', 'Se añadio una <strong>Imagen y Texto</strong> con exitó.');
    }
    public function storeTextos(Request $request)
    {
        $item = Rubros::firstOrNew([]);
        $item->texto1 = $request->texto1;
        $item->save();
        return redirect()->route('adm.rubros')->with('success', 'Se actualizo el <strong>Texto</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.rubros.edit', [
            'element' => rubrost::find($id),
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
        rubros::find($id)->delete();
        return redirect()->route('adm.rubros')->with('success', 'Se ha eliminado un <strong>Imagen y Texto</strong> con exitó.');
    }

    public function trash()
    {
        $data = rubros::onlyTrashed()->get();
        return view('adm.rubros.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }


    public function restore($id)
    {
        $item = rubros::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.rubros.trash')->with('success', 'Se ha restaurado una <strong>Imagen y Texto</strong> con exitó.');
    }

    public function copy($id)
    {
        $new = rubros::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.rubros.edit', $new->id)->with('success', 'Se ha duplicado una <strong>Imagen y Texto</strong> con exitó.');
    }
}