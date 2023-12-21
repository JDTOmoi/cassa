<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Prodreq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderview()
    {
        $order = Order::all();

        return view('order/order',[
            "activeOrder"=>"active",
            "order"=>$order
        ]);
    }

    public function listorderview(){
        $user = User::where('id',Auth::user()->id)->first();
        $order = $user->orders()->get();

        return view('order/order',[
            "activeOrder"=>"active",
            "order"=>$order
        ]);
    }

    public function tambahorderview()
    {
        $produks = Produk::all();

        return view('order/tambahorder',[
            "activeOrder" => "active"
        ], compact('produks'));
    }

    public function tambahorder(Request $request)
    {
        $validate=$request->validate([
            'user_id' => '',
            'ord_message' => 'required',
            'phone_number'=>'required', //TODO: validate phone number, product, quantity, notes
            'produk_id' => 'required',
            'quantity' => 'required',
            'notes' => 'required'
        ]);

        $order = Order::create([
            'user_id' => $validate['user_id'],
            'amount_paid' => $validate['amount_paid'],
            'tips'=> $validate['tips'],
            'status'=> '0'
        ]);

        for ($i = 0; $i < $validate['produk_id']->count(); $i++) {
            Prodreq::create([
                'produk_id' => $validate['produk_id'][$i],
                'order_id' => $order->id,
                'quantity' => $validate['quantity'][$i],
                'notes' => $validate['notes'][$i]
            ]);
        }
        

        return redirect()->route('kirimtransaksi');
    }
}
