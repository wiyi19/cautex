<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Bannerempresa;

class BannerempresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bannerempresa::get();
        return view('adm.bannerempresa.index', [
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
        return view('adm.bannerempresa.create', [
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
            $item = Bannerempresa::find($id);
        } else {
            $item = new Bannerempresa;
        }
        $item->texto1 = $request->texto1;
        $item->texto2 = $request->texto2;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/empresa/banner');
        }
        $item->save();
        return redirect()->route('adm.bannerempresa')->with('success', 'Se añadio un <strong>Banner</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.bannerempresa.edit', [
            'element' => Bannerempresa::find($id),
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
        Bannerempresa::find($id)->delete();
        return redirect()->route('adm.bannerempresa')->with('success', 'Se ha eliminado un <strong>Banner</strong> con exitó.');
    }
    public function trash()
    {
        $data = Bannerempresa::onlyTrashed()->get();
        return view('adm.bannerempresa.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Bannerempresa::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.bannerempresa.trash')->with('success', 'Se ha restaurado un <strong>Banner</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Bannerempresa::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.bannerempresa.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Banner</strong> con exitó.');
    }
}