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
    public function presupuestoStore() {
        return true;
    }
    public function contacto() {
        return view('website.contacto', [
            'active' => 'website.contacto',
        ]);
    }
    public function contactoStore() {
        return true;
    }

}
