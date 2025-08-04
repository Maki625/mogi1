<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;


class PurchaseController extends Controller
{
    public function show(Request $request, $item_id)
    {
        $user = auth()->user();
        $purchaseAddress = session("purchase_address.{$item_id}");
        $product = Product::findOrFail($item_id);

        $selected_payment_method = session('selected_payment_method', '');

        return view('purchase', [
            'product' => $product,
            'user' => $user,
            'purchaseAddress' => $purchaseAddress,
            'selected_payment_method' => session('selected_payment_method', ''),
        ]);
    }


    public function store(Request $request, $item_id) {
        $request->validate([
            'payment_method' => 'required',
        ], [
            'payment_method.required' => '支払い方法を選択してください',
        ]);

        session(['selected_payment_method' => $request->payment_method]);

        $address = session('purchase_address');

        $purchase = new Purchase();
        $purchase->product_id = $request->product_id;
        $purchase->user_id = auth()->id();
        $purchase->payment_method = $request->payment_method;
        $purchase->postal_code = $request->postal_code;
        $purchase->address = $request->address;
        $purchase->building_name = $request->building_name;

        $purchase->save();

        session()->forget('purchase_address');
        session()->forget('selected_payment_method');

        return redirect("/");

    }

    public function setPaymentMethod(Request $request)
    {
    session(['selected_payment_method' => $request->payment_method]);
    return response()->json(['message' => '保存成功']);
    }

}
