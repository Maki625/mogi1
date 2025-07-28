<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FavoriteController extends Controller
{
    public function store($item_id)
    {
        if (!auth()->check()) {
            return back();
        }

        $product = Product::findOrFail($item_id);
        auth()->user()->favorites()->attach($product->id);
        return back();
    }

    public function destroy($item_id)
    {
        $product = Product::findOrFail($item_id);
        auth()->user()->favorites()->detach($product->id);
        return back();
    }
}
