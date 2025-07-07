<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ItemController extends Controller
{
    public function index() {

        $products = Product::all();

        $conditions = [
            1 => '良好',
            2 => '目立った傷や汚れなし',
            3 => 'やや傷や汚れあり',
            4 => '状態が悪い',
        ];

        foreach ($products as $product) {
            $product->condition_label = $conditions[$product->product_condition] ?? '不明';
        }

        return view('index', ['products' => $products]);
    }

    public function show($item_id) {

        $product = Product::findOrFail($item_id);

        $conditions = [
            1 => '良好',
            2 => '目立った傷や汚れなし',
            3 => 'やや傷や汚れあり',
            4 => '状態が悪い',
        ];

        $product->condition_label = $conditions[$product->product_condition] ?? '不明';


        return view('show', [
            'product' => $product,
            'like_count' => 5,
            'comment_count' => 2,
            ]);
    }
}
