<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Producto;
use App\Familia;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Producto::get();
        return view('adm.producto.index', [
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
        return view('adm.producto.create', [
            'category_id' => request()->category_id,
            'familias' => Familia::get(),
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
            $item = Producto::find($id);
        } else {
            $item = new Producto;
        }
        if($request->imagenes != null){
            $imagenes = [];
            foreach ($request->imagenes as $key => $value) {
                if(is_string($value)) {
                    $imagenes[$key] = $value;
                } else {
                    $path = $value->store('public/productos/imagenes/');
                    $imagenes[$key] = $path;
                }
            }
            $item->imagenes = $imagenes;
        }
        if($request->imagen != null){
            if(is_string($request->imagen)) {
                if ($request->imagen == '--remove--') {
                    $item->imagen = null;
                }
            } else {
                $path = $request->imagen->store('public/productos/imagen/');
                $item->imagen = $path;
            }
        }
        if($request->medidas != null){
            $medidas = [];
            foreach ($request->medidas as $pindex => $presentacion) {
                $medidas[$pindex]['titulo'] = $presentacion['titulo'];
                if($presentacion['elementos'] != null){
                    foreach ($presentacion['elementos'] as $mindex => $medida) {
                        $medidas[$pindex]['elementos'][$mindex]['texto'] = $medida['texto'];
                        if(is_string($medida['imagen'])) {
                            $medidas[$pindex]['elementos'][$mindex]['imagen'] = $medida['imagen'];
                        } else {
                            $path = $medida['imagen']->store('public/productos/medidas/');
                            $medidas[$pindex]['elementos'][$mindex]['imagen'] = $path;
                        }
                    }
                }
            }
            $item->medidas = $medidas;
        }
        $item->orden      = $request->orden;
        $item->texto1     = $request->texto1;
        $item->texto2     = $request->texto2;
        $item->familia_id = $request->familia_id;
        $item->save();
        return response()->json(['message' => 'guardado']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adm.producto.edit', [
            'element' => Producto::find($id),
            'familias' => Familia::get()
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
        Producto::find($id)->delete();
        return redirect()->route('adm.producto')->with('success', 'Se ha eliminado un <strong>Articulo</strong> con exitó.');
    }
    public function trash()
    {
        $data = Producto::onlyTrashed()->get();
        return view('adm.producto.index', [
            'data' => $data,
            'trash'=> true,
        ]);
    }
    public function restore($id)
    {
        $item = Producto::withTrashed()->find($id);
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('adm.producto.trash')->with('success', 'Se ha restaurado un <strong>Articulo</strong> con exitó.');
    }
    public function copy($id)
    {
        $new = Producto::find($id)->replicate();
        $new->save();
        return redirect()->route('adm.producto.edit', $new->id)->with('success', 'Se ha duplicado un <strong>Articulo</strong> con exitó.');
    }
    public function data($id = false)
    {
        $languages = [];
        $content = null;
        if($id) {
            $content = [];
            foreach (Producto::find($id)->getAttributes() as $key => $value) {
                if ($key == 'imagenes') {
                    if($value != null){
                        foreach (json_decode($value) as $lang => $image) {
                            $content[$key][] = [
                                'url'  => asset(Storage::url($image)),
                                'path' => $image,
                                'type' => Storage::mimeType($image)
                            ];
                        }
                    } else {
                        $content[$key] = [];
                    }
                } elseif($key == 'imagen') {
                    if($value != null && $value != '') {
                        $content[$key] = [
                            'url'  => asset(Storage::url($value)),
                            'path' => $value,
                            'type' => Storage::mimeType($value)
                        ];
                    }
                } else {
                    $content[$key] = $value;
                }
            }
        }
        foreach (LaravelLocalization::getLocalesOrder() as $key => $value) {
            $languages[$key] = $value['name'];
        }
        return response()->json([
            'languages' => $languages,
            'config' => [],
            'familias'=> Familia::get(['id', 'texto1 as text'])->toArray(),
            'content' => $content,
        ]);
    }
}