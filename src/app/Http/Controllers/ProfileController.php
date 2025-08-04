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

        $soldProducts = Product::where('user_id', $userId)->get();

        $boughtProducts = Product::whereHas('purchase', function($query) use ($userId) {
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

    public function update(ProfileRequest $request)
{
    $user = auth()->user();

    $profile = $user->profile ?? new \App\Models\Profile();

    // プロフィール画像がアップロードされた場合
    if ($request->hasFile('profile_image')) {
        if ($profile->profile_image) {
            Storage::delete('public/profile_images/' . $profile->profile_image);
        }

        $image = $request->file('profile_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/profile_images', $filename);

        $profile->profile_image = $filename;
    }

    $user->name = $request->input('name');
    $user->save();

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
}

}
