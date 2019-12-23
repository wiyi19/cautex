<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Soluciones;
use App\Solucionest;

class SolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = soluciones::get();
        $data2 = Solucionest::get();
        return view('adm.soluciones.index', [
            'data'     => $data,
            'data2'    => $data2,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.soluciones.create', [
            'category_id' => request()->category_id
        ]);
    }

    public function create2()
    {
        return view('adm.soluciones.create2', [
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
            $item = soluciones::find($id);
        } else {
            $item = new soluciones;
        }
        $item->texto1 = $request->texto1;
        if($request->imagen != null){
             $item->imagen = $request->imagen->store('public/imagenes/home/soluciones');
        }
        $item->save();
        return redirect()->route('adm.soluciones')->with('success', 'Se añadio una <strong>Texto</strong> con exitó.');
    }

     public function store2(Request $request, $id = false)
    {
        if($id){
            $item = solucionest::find($id);
        } else {
            $item = new solucionest;
        }
        $item->texto1 = $request->texto1;
        $item->save();
        return redirect()->route('adm.soluciones')->with('success', 'Se añadio una <strong>Texto</strong> con exitó.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.soluciones.edit', [
            'element' => soluciones::find($id),
        ]);
    }

    public function edit2($id)
    {
        return view('adm.soluciones.edit2', [
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
        soluciones::find($id)->delete();
        return redirect()->route('adm.soluciones')->with('success', 'Se ha eliminado un <strong>Articulo</strong> con exitó.');
    }

    public function destroy2($id)
    {
        solucionest::find($id)->delete();
        return redirect()->route('adm.soluciones')->with('success', 'Se ha eliminado un <strong>Articulo</strong> con exitó.');
    }

    public function trash()
    {
        $data = soluciones::onlyTrashed()->get();
        return view('adm.soluciones.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }


    public function trash2()
    {
        $data2 = solucionest::onlyTrashed()->get();
        return view('adm.soluciones.index', [
            'data' => $data2,
            'trash'=> true,
        ]);
    }

    public function restore($id)
    {
        $item = soluciones::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.soluciones.trash')->with('success', 'Se ha restaurado un <strong>Articulo</strong> con exitó.');
    }

    public function restore2($id)
    {
        $item = solucionest::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.soluciones.trash2')->with('success', 'Se ha restaurado un <strong>Articulo</strong> con exitó.');
    }

    public function copy($id)
    {
        $new = soluciones::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.soluciones.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Articulo</strong> con exitó.');
    }
}