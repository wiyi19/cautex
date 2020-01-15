<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Bannermatriceria;

class BannermatriceriaController extends Controller
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
        $data = Bannermatriceria::get();
        return view('adm.bannermatriceria.index', [
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
        return view('adm.bannermatriceria.create', [
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
            $item = Bannermatriceria::find($id);
        } else {
            $item = new Bannermatriceria;
        }
        $item->texto1 = $request->texto1;
        $item->texto2 = $request->texto2;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/matriceria/');
        }
        $item->orden = $request->orden;
        $item->save();
        return redirect()->route('adm.bannermatriceria')->with('success', 'Se añadio un <strong>Banner</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.bannermatriceria.edit', [
            'element' => Bannermatriceria::find($id),
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
        Bannermatriceria::find($id)->delete();
        return redirect()->route('adm.bannermatriceria')->with('success', 'Se han eliminado la <strong>Información</strong> con exitó.');
    }
    public function trash()
    {
        $data = Bannermatriceria::onlyTrashed()->get();
        return view('adm.bannermatriceria.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Bannermatriceria::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.bannermatriceria.trash')->with('success', 'Se ha restaurado la <strong>Información</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Bannermatriceria::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.bannermatriceria.edit', $new->id)->with('success', 'Se ha duplicado la <strong>Información</strong> con exitó.');
    }
}