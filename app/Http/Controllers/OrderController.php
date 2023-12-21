<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
