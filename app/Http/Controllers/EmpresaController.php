<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos = Empresa::firstOrNew([]);
        return view('adm.empresa.index', [
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
        return view('adm.empresa.create', [
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
        $item = Empresa::firstOrNew([]);
        $item->texto1 = $request->texto1;
        $item->texto2 = $request->texto2;
        $item->save();
        return redirect()->route('adm.empresa')->with('success', 'Se actualizaron los <strong>Textos</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.empresa.edit', [
            'element' => Empresa::find($id),
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
        Empresa::find($id)->delete();
        return redirect()->route('adm.empresa')->with('success', 'Se han eliminado la <strong>Información</strong> con exitó.');
    }
    public function trash()
    {
        $data = Empresa::onlyTrashed()->get();
        return view('adm.empresa.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Empresa::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.empresa.trash')->with('success', 'Se ha restaurado la <strong>Información</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Empresa::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.empresa.edit', $new->id)->with('success', 'Se ha duplicado la <strong>Información</strong> con exitó.');
    }
}