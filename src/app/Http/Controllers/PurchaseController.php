<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;


class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $user = auth()->user();

        $product = Product::findOrFail($item_id);
        return view('purchase', [
            'product' => $product,
            'user' => $user,
        ]);
    }


    public function store(Request $request, $item_id) {

        $request->validate([
            'payment_method' => 'required',
        ], [
            'payment_method.required' => '支払い方法を選択してください',
        ]);
        
        $purchase = new Purchase();
        $purchase->product_id = $request->product_id;
        $purchase->user_id = auth()->id();
        $purchase->payment_method = $request->payment_method;
        $purchase->postal_code = $request->postal_code;
        $purchase->address = $request->address;
        $purchase->building_name = $request->building_name;

        $purchase->save();

        return redirect("/");

    }
}
