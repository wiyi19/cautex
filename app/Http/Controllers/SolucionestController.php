<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Solucionest;

class SolucionestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = solucionest::get();
        return view('adm.solucionest.index', [
            'data2'     => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.solucionest.create', [
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
            $item2 = solucionest::find($id);
        } else {
            $item2 = new solucionest;
        }
        $item2->texto1 = $request->texto1;
        $item2->save();
        return redirect()->route('adm.solucionest')->with('success', 'Se añadio una <strong>Banner</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.solucionest.edit', [
            'element' => solucionest::find($id),
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
        solucionest::find($id)->delete();
        return redirect()->route('adm.solucionest')->with('success', 'Se ha eliminado un <strong>Articulo</strong> con exitó.');
    }
    public function trash()
    {
        $data = solucionest::onlyTrashed()->get();
        return view('adm.solucionest.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = solucionest::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.solucionest.trash')->with('success', 'Se ha restaurado un <strong>Articulo</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = solucionest::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.solucionest.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Articulo</strong> con exitó.');
    }
}