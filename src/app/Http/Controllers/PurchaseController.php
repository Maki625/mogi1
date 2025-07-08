<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;


class PurchaseController extends Controller
{
    public function show($item_id)
    {
        $product = Product::findOrFail($item_id);
        return view('purchase', ['product' => $product]);
    }


    public function store(Request $request) {

        $purchase = new Purchase();
        $purchase->product_id = $request->product_id;
        $purchase->user_id = auth()->id();
        $purchase->save();

        return redirect('/');

    }
}
