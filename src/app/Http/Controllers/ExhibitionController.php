<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ExhibitionRequest;

class ExhibitionController extends Controller
{
    public function create() {

        $categories = Category::all();

        return view('exhibition', ['categories' => $categories]);
    }

    public function store(ExhibitionRequest $request)
    {
        $validated = $request->validated();

        $product = new Product();
        $product->product_name = $validated['product_name'];
        $product->brand_name = $request->input('brand_name');
        $product->product_description = $validated['product_description'];
        $product->price = $validated['price'];
        $product->product_condition = $validated['product_condition'];
        $product->user_id = Auth::id();

        $path = $request->file('product_image')->store('public/images');
        $product->product_image = str_replace('public/', 'storage/', $path);

        $product->save();

        $product->categories()->sync($validated['categories']);

        return redirect('/mypage');

    }
}
