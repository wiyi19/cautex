<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Infomatriceria;

class InfomatriceriaController extends Controller
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
        $textos = Infomatriceria::firstOrNew([]);
        return view('adm.infomatriceria.index', [
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
        return view('adm.infomatriceria.create', [
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
        $item = Infomatriceria::firstOrNew([]);
        $item->texto1 = $request->texto1;
        $item->save();
        return redirect()->route('adm.infomatriceria')->with('success', 'Se actualizo la <strong>Información</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.infomatriceria.edit', [
            'element' => Infomatriceria::find($id),
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
        Infomatriceria::find($id)->delete();
        return redirect()->route('adm.infomatriceria')->with('success', 'Se han eliminado la <strong>Información</strong> con exitó.');
    }
    public function trash()
    {
        $data = Infomatriceria::onlyTrashed()->get();
        return view('adm.infomatriceria.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Infomatriceria::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.infomatriceria.trash')->with('success', 'Se ha restaurado la <strong>Información</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Infomatriceria::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.infomatriceria.edit', $new->id)->with('success', 'Se ha duplicado la <strong>Información</strong> con exitó.');
    }
}