<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandview()
    {
        $brand = Brand::all();

        return view('brand/brand',[
            "activeBrand" => "active",
            "brand" => $brand
        ]);
    }
    
    
    public function tambahbrandView()
    {
        return view('brand/tambahbrand',[
            "activeBrand" => "active"
        ]);
    }

    public function editbrandview(Brand $b)
    {
        $brandedit = Brand::where('brand_id',$b->id)->first();

        return view('brand/editbrand',[
            "activeBrand" => "active"
        ],
        compact('brandedit'));
    }

    public function updatebrand(Request $request, Brand $brandedit){
        $brandedit->update([
            'brand_name' => $request->brand_name
        ]);

        return redirect()->route('daftarbrand');
    }

    public function tambahbrand(Request $request){
        Brand::create([
            'brand_name' => $request->brand_name
        ]);

        return redirect()->route('daftarbrand');
    }

    public function hapusbrand(Brand $b){
        $b->delete();

        return redirect()->route('daftarproduk');
    }

}
