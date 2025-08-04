<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\AddressRequest;


class AddressController extends Controller
{
    public function edit($item_id) {

        $user = Auth::user();
        $user->load('profile');
        $product = Product::findOrFail($item_id);

        $purchaseAddress = session("purchase_address.{$item_id}");

        return view('address', compact('user', 'product', 'purchaseAddress'));
        }

    public function update(AddressRequest $request, $item_id) {

        session([
            "purchase_address.{$item_id}" => [
            'postal_code' =>
            $request->postal_code,
            'address' => $request->address,
            'building_name' => $request->building_name,
            ]
        ]);

        return redirect("/purchase/{$item_id}");
    }
}
