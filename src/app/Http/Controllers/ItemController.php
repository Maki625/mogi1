<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Purchase;



class ItemController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $tab = $request->query('tab');

        if ($tab === 'mylist') {
            if (auth()->check()) {
            $query = auth()->user()->favorites()->with('categories', 'user', 'purchase');

            if($keyword) {
                $query->where('product_name', 'like', '%' . $keyword . '%');
            }

            $products = $query->get();

        } else {
            $products = collect();
        }
        } else {

            $query = Product::with('categories', 'user', 'purchase');
            if ($keyword) {
                $query->where('product_name', 'like', '%' . $keyword . '%');
            }

            $products = $query->get();
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

        $product = Product::with('categories', 'comments.user')->withCount('favorites', 'comments')
        ->findOrFail($item_id);

        // 購入済みなら売り切れページへリダイレクト
        if ($product->purchase()->exists()) {
        return redirect()->route('item.soldout', ['item_id' => $item_id]);
        }

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
