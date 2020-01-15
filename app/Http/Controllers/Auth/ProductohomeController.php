<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Productohome;

class ProductohomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Productohome::get();
        return view('adm.productohome.index', [
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
        return view('adm.productohome.create', [
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
            $item = Productohome::find($id);
        } else {
            $item = new Productohome;
        }
        $item->producto = $request->producto;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/home/banner1');
        }
        $item->save();
        return redirect()->route('adm.productohome')->with('success', 'Se añadio una <strong>Producto</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.productohome.edit', [
            'element' => Productohome::find($id),
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
        Productohome::find($id)->delete();
        return redirect()->route('adm.productohome')->with('success', 'Se ha eliminado un <strong>Producto</strong> con exitó.');
    }
    public function trash()
    {
        $data = Productohome::onlyTrashed()->get();
        return view('adm.productohome.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Productohome::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.productohome.trash')->with('success', 'Se ha restaurado un <strong>Producto</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Productohome::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.productohome.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Producto</strong> con exitó.');
    }
}