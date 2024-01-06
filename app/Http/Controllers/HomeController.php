<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $produk = Produk::where('name','like','%'.$request->search.'%')->get();
        }else{
            $produk = Produk::paginate(10);
        }
        return view('home',["produk"=>$produk]);
    }
}
