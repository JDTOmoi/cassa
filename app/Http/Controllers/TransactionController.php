<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactionview()
    {
        $transaction = Transaction::all();

        return view('transaction/transaction',[
            "activeBrand" => "active",
            "transaction" => $transaction
        ]);
    }

    public function listtransactionview(){
        $user = User::where('id', Auth::user()->id)->first();
        $transaction = $user->transactions()->get();

        return view('transaction/transaction',[
            "activeBrand" => "active",
            "transaction" => $transaction
        ]);
    }


    public function tambahtransactionview()
    {
        return view('brand/tambahbrand',[
            "activeBrand" => "active"
        ]);
    }

    public function edittransactionview(Brand $b)
    {
        $brandedit = Brand::where('id',$b->id)->first();

        return view('transaction/edittransaction',[
            "activeBrand" => "active"
        ],
        compact('transactionedit'));
    }

    public function updatetransaction(Request $request, Brand $brandedit){
        $validate=$request->validate([
            'brand_name'=>'required|max:255'
        ]);

        $brandedit->update([
            'brand_name' => $validate['brand_name']
        ]);

        return redirect()->route('lihattransaksi');
    }

    public function tambahtransaction(Request $request){

        $validate=$request->validate([
            'brand_name'=>'required|unique:brands|max:255'
        ]);

        Brand::create([
            'brand_name' => $validate['brand_name']
        ]);

        return redirect()->route('lihattransaksi');
    }

    public function hapustransaction(Brand $b){
        $b->delete();

        return redirect()->route('lihattransaksi');
    }
}
