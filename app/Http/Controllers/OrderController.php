<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderview()
    {
        $order = Order::all();

        return view('order/order',[
            "activeProduk"=>"active",
            "order"=>$order
        ]);
    }

    public function listorderview(){
        $user = User::where('id',Auth::user()->id)->first();
        $order = $user->orders()->get();

        return view('order/order',[
            "activeProduk"=>"active",
            "order"=>$order
        ]);
    }

    public function tambahorderview()
    {
        return view('order/tambahorder',[
            "activeOrder" => "active"
        ]);
    }
}
