<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Familia;
use App\Materiales;
use App\Empresa;
use App\Imagenempresa;

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
        $banner = Banner::get();
        $familias = Familia::get();
        $materiales = Materiales::get();
        return view('website.home', ['banner' => $banner, 'familias' => $familias, 'materiales' => $materiales]);
    }


    public function empresa()
    {
        $banner = Banner::get();
        $empresa = Empresa::firstOrNew([]);
        $imagenempresa = Imagenempresa::firstOrNew([]);
        return view('website.empresa', ['banner' => $banner,'empresa' => $empresa,'imagenempresa' => $imagenempresa, ]);
    }
}
