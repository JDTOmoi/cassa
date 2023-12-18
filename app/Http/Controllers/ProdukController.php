<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        $brands = Brand::all();
        return view('produk/tambahproduk',[
            "activeProduk"=>"active",
            "brands"=>$brands
        ]);
    }

    public function editprodukview(Produk $p)
    {
        $produkedit = Produk::where('id',$p->id)->first();

        $brands = Brand::all();


        return view('produk/editproduk',
        [
            "activeProduk"=>"active",
        ],
        compact('produkedit','brands'));
    }


    public function updateproduk(Request $request, Produk $produkedit){
        $validate=$request->validate([
            'image'=>'required|max:255',
            'name'=>'required|max:255',
            'sku'=>'required|max:255',
            'brand'=>'required',
            'tags'=>'required|max:255',
            'description'=>'',

        ]);

        $produkedit->update([
            'image'=>$validate['image'],
            'name'=>$validate['name'],
            'sku'=>$validate['sku'],
            'brand'=>$validate['brand'],
            'tags'=>$validate['tags'],
            'description'=>$validate['description'],
        ]);

        return redirect()->route('daftarproduk');
    }


    public function tambahproduk(Request $request)
    {
        $validate=$request->validate([
            'image'=>'required|max:255',
            'name'=>'required|max:255',
            'sku'=>'required|max:255',
            'brand'=>'required',
            'tags'=>'required|max:255',
            'description'=>'',

        ]);

        produk::create([
            'image'=>$validate['image'],
            'name'=>$validate['name'],
            'sku'=>$validate['sku'],
            'brand'=>$validate['brand'],
            'tags'=>$validate['tags'],
            'description'=>$validate['description'],
        ]);

        return redirect()->route('daftarproduk');

    }

    public function hapusproduk(Produk $p){
        $p->delete();

        return redirect()->route('daftarproduk');
    }

}
