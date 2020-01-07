<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Familia;
use App\Materiales;
use App\Empresa;
use App\Imagenempresa;
use App\Rubros;
use App\Rubrost;
use App\Matrides;
use App\Soluciones;
use App\Solucionest;
use App\Infoempresa;
use App\Icono;
use App\Solicitudpre;
use App\Infomatriceria;
use App\Bannerempresa;
use App\Bannermatriceria;
use App\Producto;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailContacto;
use App\Mail\SendMailPresupuesto;

class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $banner               = Banner::get();
        $familias             = Familia::get();
        $materiales           = Materiales::get();
        $banner_rubros        = Rubrost::get();
        $banner_rubros_texto  = Rubros::firstOrNew([]);
        $matrices             = Matrides::firstOrNew([]);
        $soluciones_textos    = Soluciones::firstOrNew([]);
        $soluciones_iconos    = Solucionest::get();

        return view('website.home', [
            'banner'              => $banner,
            'familias'            => $familias,
            'materiales'          => $materiales,
            'banner_rubros'       => $banner_rubros,
            'banner_rubros_texto' => $banner_rubros_texto,
            'matrices'            => $matrices,
            'soluciones_textos'   => $soluciones_textos,
            'soluciones_iconos'   => $soluciones_iconos,
            'active'              => 'website.home',
        ]);
    }


    public function empresa() {
        $banner = Bannerempresa::get();
        $empresa = Empresa::firstOrNew([]);
        $imagenempresa = Imagenempresa::firstOrNew([]);

        return view('website.empresa', [
            'banner'        => $banner,
            'empresa'       => $empresa,
            'imagenempresa' => $imagenempresa,
            'active'        => 'website.empresa',
        ]);
    }
    public function familias()
    {
        $familias = Familia::get();
        return view('website.familias', [
            'familias' => $familias,
            'active'   => 'website.familias',
        ]);
    }
    public function familia($familia_id)
    {
        $familias = Familia::with('productos')->get();
        // No repito busqueda en la base de datos, si no que se hace un filter a la coleccion obtenida arriba
        $familia = $familias->filter(function($item) use ($familia_id) {
            return $item->id == $familia_id;
        })->first();
        return view('website.familia', [
            'producto_id' => '$producto_id',
            'familia_id'  => $familia_id,
            'familias'    => $familias,
            'familia'     => $familia,
            'active'      => 'website.familias',
        ]);
    }
    public function search()
    {
        $familias = Familia::with('productos')->get();
        // No repito busqueda en la base de datos, si no que se hace un filter a la coleccion obtenida arriba
        $search = request()->has('q')?request()->q:'no';
        $productos = Producto::where(function ($query) use ($search) {
            $query->orWhere('texto1', 'like', '%'.$search.'%');
            $query->orWhere('texto2', 'like', '%'.$search.'%');
        })->get();
        return view('website.search', [
            'producto_id' => '$producto_id',
            'familia_id'  => 0,
            'familias'    => $familias,
            'productos'   => $productos,
            'search'      => $search,
            'active'      => 'website.familias',
        ]);
    }
    public function producto($producto_id)
    {
        $familias = Familia::with('productos')->get();
        $producto = Producto::find($producto_id);
        //dd($producto->medidas);
        return view('website.producto', [
            'familia_id'  => $producto->familia_id,
            'producto_id' => $producto_id,
            'familias'    => $familias,
            'producto'    => $producto,
            'active'      => 'website.familias',
        ]);
    }

    public function materiales() {
        $materiales = Materiales::get();
        return view('website.materiales', [
            'materiales' => $materiales,
            'active' => 'website.materiales',
        ]);
    }
    public function matriceria() {
        $banner = Bannermatriceria::get();
        $iconos = Icono::get();
        $textos = Infomatriceria::firstOrNew([]);
        $pie    = Solicitudpre::firstOrNew([]);
        //dd($pie);
        return view('website.matriceria', [
            'banner' => $banner,
            'iconos'   => $iconos,
            'textos' => $textos,
            'pie'    => $pie,
            'active' => 'website.matriceria',
        ]);
    }
    public function presupuesto() {
        return view('website.presupuesto', [
            'active' => 'website.presupuesto',
        ]);
    }
    public function presupuestoStore(Request $request) {
        $secret = '6LctaZkUAAAAAMujRm0fydSY4M-21cYS2Pv4Ik89';
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$request->recaptcha_token."&remoteip=".$_SERVER['REMOTE_ADDR']);
        $g_response = json_decode($response);

        if($g_response->success==true) {
            Mail::to('alfonzodiez@gmail.com')->send(new SendMailPresupuesto($request->all()));
            return ['status' => 'send'];
        }else{
            return ['status' => 'error'];
        }
    }
    public function contacto() {
        return view('website.contacto', [
            'active' => 'website.contacto',
        ]);
    }
    public function contactoStore(Request $request) {
        $secret = '6LctaZkUAAAAAMujRm0fydSY4M-21cYS2Pv4Ik89';
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$request->recaptcha_token."&remoteip=".$_SERVER['REMOTE_ADDR']);
        $g_response = json_decode($response);

        if($g_response->success==true) {
            Mail::to('alfonzodiez@gmail.com')->send(new SendMailContacto($request->all()));
            return ['status' => 'send'];
        }else{
            return ['status' => 'error'];
        }
    }

}
