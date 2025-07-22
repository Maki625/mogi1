<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{

    public function show(Request $request) {
        $userId = Auth::id();

        // 出品した商品
        $soldProducts = Product::where('user_id', $userId)->get();

        // 購入した商品（purchaseテーブルがあると仮定）
        $boughtProducts = Product::whereHas('purchases', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('mypage', [
            'soldProducts' => $soldProducts,
            'boughtProducts' => $boughtProducts,
        ]);
    }

    public function edit() {

        $user = Auth::user();
        return view('edit', compact('user'));
    }

    //更新処理
    public function update(ProfileRequest $request)
{
    $user = auth()->user();

    // プロフィール画像がアップロードされた場合
    if ($request->hasFile('profile_image')) {
        // 古い画像があれば削除（任意）
        if ($user->profile_image) {
            Storage::delete('public/profile_images/' . $user->profile_image);
        }

        // 新しい画像の保存
        $image = $request->file('profile_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/profile_images', $filename);

        // ユーザーに画像ファイル名を保存
        $user->profile_image = $filename;
    }

    // 他のプロフィール情報も更新（必要に応じて）
    $user->name = $request->input('name');
    $user->save();

    return redirect('/mypage')->with('success', 'プロフィールを更新しました');
}

}
