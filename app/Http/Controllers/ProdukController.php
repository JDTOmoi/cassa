<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //
    public function produkview()
    {
        $produk = Produk::all();

        return view('produk/produk',[
            "activeProduk"=>"active",
            "produk"=>$produk
        ]);
    }

    public function tambahprodukview()
    {

        return view('produk/tambahproduk',[
            "activeProduk"=>"active",
        ]);
    }


    public function tambahproduk(Request $request)
    {
        produk::create([
            'image'=>$request->image,
            'name'=>$request->name,
            'sku'=>$request->sku,
            'brand'=>$request->brand,
            'tags'=>$request->tags,
            'description'=>$request->description,
        ]);

        return redirect()->route('daftarproduk');

    }

}
