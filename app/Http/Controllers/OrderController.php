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

    public function tambahorderview()
    {
        return view('order/tambahorder',[
            "activeOrder" => "active"
        ]);
    }
}
