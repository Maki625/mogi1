<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;


class ItemController extends Controller
{
    public function index(Request $request)
    {

        $tab = $request->query('tab');

        if ($tab === 'mylist') {
            if (auth()->check()) {
            $products = auth()->user()->favorites;
            $tab = 'mylist';
        } else {
            $products = collect();
        }
        } else {
            $products = Product::with('categories', 'user')->get();
            $tab = 'recommend';
        }

        $conditions = [
            1 => '良好',
            2 => '目立った傷や汚れなし',
            3 => 'やや傷や汚れあり',
            4 => '状態が悪い',
        ];

        foreach ($products as $product) {
            $product->condition_label = $conditions[$product->product_condition] ?? '不明';
        }

        return view('index', compact('products', 'tab'));

    }

    public function show($item_id) {

        $product = Product::with('categories', 'user')->withCount('favorites')
               ->findOrFail($item_id);

        $conditions = [
            1 => '良好',
            2 => '目立った傷や汚れなし',
            3 => 'やや傷や汚れあり',
            4 => '状態が悪い',
        ];

        $product->condition_label = $conditions[$product->product_condition] ?? '不明';

        // ログイン中ユーザーがこの商品をいいね済みかどうか
        $is_favorited = auth()->check() && auth()->user()->favorites->contains($product->id);

        return view('show', [
            'product' => $product,
            'is_favorited' => $is_favorited,
        ]);
    }
}
