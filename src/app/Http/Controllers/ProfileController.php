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
        $user = Auth::user();
        $userId = $user->id;

        // 出品した商品
        $soldProducts = Product::where('user_id', $userId)->get();

        // 購入した商品
        $boughtProducts = Product::whereHas('purchases', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('mypage', [
            'user' => $user,
            'soldProducts' => $soldProducts ?? collect(),
            'boughtProducts' => $boughtProducts ?? collect(),
        ]);
    }

    public function edit() {

        $user = Auth::user();
        $user->load('profile');
        return view('edit', compact('user'));

    }

    //更新処理
    public function update(ProfileRequest $request)
{
    $user = auth()->user();

    $profile = $user->profile ?? new \App\Models\Profile();

    // プロフィール画像がアップロードされた場合
    if ($request->hasFile('profile_image')) {
        // 古い画像があれば削除（任意）
        if ($profile->profile_image) {
            Storage::delete('public/profile_images/' . $profile->profile_image);
        }

        // 新しい画像の保存
        $image = $request->file('profile_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/profile_images', $filename);

        $profile->profile_image = $filename;
    }

    // 他のプロフィール情報も更新（必要に応じて）
    $user->name = $request->input('name');
    $user->save();

    // プロフィール情報の更新（なければ新規作成）
    $user->profile()->updateOrCreate(
        ['user_id' => $user->id],
        [
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'building_name' => $request->input('building_name'),
            'profile_image' => $filename ?? $user->profile->profile_image ?? null,
        ]
    );

    return redirect('/mypage');

    // $user = Auth::user();
    // $profile = $user->profile;

    // return view('mypage', [
    //     'user' => $user,
    //     'profile' => $profile,
    // ]);
}

}
