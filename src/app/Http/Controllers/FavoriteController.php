<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FavoriteController extends Controller
{
    public function store(Product $product)
    {
        if (!auth()->check()) {
            return back();
        }
        auth()->user()->favorites()->attach($product->id);
        return back();
    }

    public function destroy(Product $product)
    {
        auth()->user()->favorites()->detach($product->id);
        return back();
    }
}
