<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

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
        return view('website.home', ['banner' => $banner]);
    }
}
