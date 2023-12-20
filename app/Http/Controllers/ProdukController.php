<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            'image'=>'image',
            'name'=>'required|max:255',
            'sku'=>'required|max:255',
            'brand'=>'required',
            'tags'=>'required|max:255',
            'description'=>'',

        ]);

        if($request->file('image')){
            if($produkedit->image){
                Storage::disk('public')->delete($produkedit->image);
            }

            $validate['image'] = $request->file('image')->store('images',['disk'=>'public']);

        $produkedit->update([
            'image'=>$validate['image'],
            'name'=>$validate['name'],
            'sku'=>$validate['sku'],
            'brand'=>$validate['brand'],
            'tags'=>$validate['tags'],
            'description'=>$validate['description'],
        ]);
        }else{
        $news2->update([
            'name'=>$validate['name'],
            'sku'=>$validate['sku'],
            'brand'=>$validate['brand'],
            'tags'=>$validate['tags'],
            'description'=>$validate['description'],
        ]);
    }

        return redirect()->route('daftarproduk');
    }


    public function tambahproduk(Request $request)
    {
        $validate=$request->validate([
            'image'=>'image',
            'name'=>'required|max:255',
            'sku'=>'required|max:255',
            'brand'=>'required',
            'tags'=>'required|max:255',
            'description'=>'',

        ]);

        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('images',['disk'=>'public']);

        produk::create([
            'image'=>$validate['image'],
            'name'=>$validate['name'],
            'sku'=>$validate['sku'],
            'brand'=>$validate['brand'],
            'tags'=>$validate['tags'],
            'description'=>$validate['description'],
        ]);
        }else{
        produk::create([
            'name'=>$validate['name'],
            'sku'=>$validate['sku'],
            'brand'=>$validate['brand'],
            'tags'=>$validate['tags'],
            'description'=>$validate['description'],
        ]);
    }

        return redirect()->route('daftarproduk');

    }

    public function hapusproduk(Produk $p){
        if($p->image){
            if(Storage::disk('public')->exists($p->image)){
                Storage::disk('public')->delete($p->image);
            }
        }
        
        $p->delete();

        return redirect()->route('daftarproduk');
    }

}
