<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    
    
    public function tambahbrandview()
    {
        return view('brand/tambahbrand',[
            "activeBrand" => "active"
        ]);
    }

    public function editbrandview(Brand $b)
    {
        $brandedit = Brand::where('brand_id',$b->brand_id)->first();

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

        return redirect()->route('daftarbrand');
    }

}
