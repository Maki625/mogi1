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

        return view('address', compact('user', 'product'));
        }

    public function update(AddressRequest $request, $item_id) {
        $user = auth()->user();
        $profile = $user->profile ?? new \App\Models\Profile();

        $profile->user_id = $user->id;
        $profile->postal_code = $request->postal_code;
        $profile->address = $request->address;
        $profile->building_name = $request->building_name;
        $profile->save();

        return redirect("/purchase/{$item_id}");
    }
}
