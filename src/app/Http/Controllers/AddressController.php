<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;


class AddressController extends Controller
{
    public function edit($item_id) {

        $user = Auth::user();
        $user->load('profile');
        $product = Product::findOrFail($item_id);

        return view('address', compact('user', 'product'));
        }
}
