<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Familia;
use App\Materiales;
use App\Rubros;
use App\Rubrost;
use App\Matrides;

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

        return view('website.home', [
            'banner'              => $banner,
            'familias'            => $familias,
            'materiales'          => $materiales,
            'banner_rubros'       => $banner_rubros,
            'banner_rubros_texto' => $banner_rubros_texto,
            'matrices' => $matrices,
        ]);
    }
}
